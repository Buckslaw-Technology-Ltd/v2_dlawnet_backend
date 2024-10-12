<?php

namespace Modules\Bank\App\Services;

use Modules\Bank\App\Interfaces\TransactionRepositoryInterface;
use Modules\Bank\Database\Enums\TransactionStatusEnum;

class TransactionService
{
    protected TransactionRepositoryInterface $transaction;

    public function __construct(TransactionRepositoryInterface $transaction)
    {
        $this->transaction = $transaction;
    }

    public function getAllTransactions()
    {
        return $this->transaction->allWithRelation(['user']);
    }

    public function getAllPendingTransactions()
    {
        return $this->transaction->queryWithACondition('status', TransactionStatusEnum::PENDING, ['user']);
    }

    public function getAllCompletedTransactions()
    {
        return $this->transaction->queryWithACondition('status', TransactionStatusEnum::COMPLETED, ['user']);
    }

    public function verifyTransaction($id)
    {
        $transaction = $this->transaction->findById($id, ['status']);
        if ($transaction && $transaction->status === TransactionStatusEnum::PENDING) {
            $this->transaction->update($id, [
                'status' => TransactionStatusEnum::COMPLETED
            ]);
            return true;
        }
        return false;
    }

    public function createTransaction($amount, $service_type, $user_id)
    {
        return $this->transaction->create([
            'reference_number' => 'DLAW' . mt_rand(20000, 1000000),
            'service_type' => $service_type,
            'amount' => $amount,
            'user_id' => $user_id
        ]);
    }

    public function getTransactionReciept($reference_number)
    {
        $transaction = $this->transaction->findTheFirstOne('reference_number', $reference_number, ['user']);
        if ($transaction && $transaction->status === TransactionStatusEnum::COMPLETED) {
            return $transaction;
        }
        return false;
    }

    public function updateTransaction($data)
    {
        $transaction = $this->transaction->findTheFirstOne('reference_number', $data->reference_number);
        if ($transaction && $transaction->status === TransactionStatusEnum::PENDING) {
            // Handle file upload
            if ($data->hasFile('proof_of_payment')) {
                // Get the uploaded file
                $file = $data->file('proof_of_payment');

                // Define a custom file name
                $filename = $data->reference_number . '_proof_of_payment_' . time() . '.' . $file->getClientOriginalExtension();

                // Store the file in the 'uploads' directory
                $file->storeAs('public/uploads', $filename);

                // Update the transaction with the proof of payment path
                $this->transaction->update($transaction->id, [
                    'proof_of_payment' => $filename, // Store the filename in the DB
                ]);
            }
            return true;
        }
        return false;
    }
}
