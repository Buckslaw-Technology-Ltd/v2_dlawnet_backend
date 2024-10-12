<?php

namespace Modules\Bank\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Modules\Bank\App\Http\Requests\UploadTransactionProofOfPaymentRequest;
use Modules\Bank\App\Services\TransactionService;
use Modules\Bank\Database\Enums\ServiceTypeEnum;
use Modules\Core\App\Services\AuthService;
use Modules\Core\App\Traits\ResponseTrait;

class BankController extends Controller
{
    use ResponseTrait;

    protected TransactionService $transactionService;
    protected AuthService $authService;

    public function __construct(TransactionService $transactionService, AuthService $authService)
    {
        $this->transactionService = $transactionService;
        $this->authService = $authService;
    }

    public function activateAccount()
    {
        try {
            $user = $this->authService->getCurrentUser();
            if ($user === null) {
                return $this->errorResponse("No logged in user");
            }
            $amount = $user->bio->institution_type === "University" ? 6000 : ($user->bio->institution_type === "Law School" ? 12000 : 0);
            return $this->successResponse('Success', $this->transactionService->createTransaction($amount, ServiceTypeEnum::ACTIVATION_FEE, $user->id), 201);
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage(), "Something went wrong", 401);
        }
    }

    public function getAllPendingTransactions()
    {

        return $this->successResponse("Success", $this->transactionService->getAllPendingTransactions(), 201);

    }

    public function getAllTransactions()
    {
        return $this->successResponse("Success", $this->transactionService->getAllTransactions(), 201);
    }

    public function getAllCompletedTransactions()
    {
        return $this->successResponse("Success", $this->transactionService->getAllCompletedTransactions(), 201);

    }

    public function verifyTransaction($id)
    {
        try {
            $transaction = $this->transactionService->verifyTransaction($id);
            if ($transaction) {
                return $this->successResponse("Payment approved");
            }
            return $this->errorResponse("Payment not found or has been approved already");
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage(), "Something went wrong", 401);

        }
    }

    public function getReciept($reference_number)
    {
        try {
            $transaction = $this->transactionService->getTransactionReciept($reference_number);
            if ($transaction) {
                return $this->successResponse("Payment reciept");
            }
            return $this->errorResponse("Payment not found or not approved yet. Contact Administrator");
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage(), "Something went wrong", 401);

        }
    }

    public function uploadProofPayment(UploadTransactionProofOfPaymentRequest $request)
    {
        try {
            $transaction = $this->transactionService->updateTransaction($request->validated());
            if ($transaction) {
                return $this->successResponse('Upload Success');
            } else {
                return $this->errorResponse('Not Successful', "Something went wrong", 401);
            }
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage(), "Something went wrong", 401);
        }

    }
}
