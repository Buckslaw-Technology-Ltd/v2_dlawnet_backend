<?php

namespace Modules\Bank\App\Services;

use Illuminate\Support\Facades\DB;
use Modules\Bank\App\Interfaces\TransactionRepositoryInterface;
use Modules\Bank\App\Interfaces\WalletRepositoryInterface;
use Modules\User\App\Interfaces\UserRepositoryInterface;

class WalletService
{
protected $walletRepo;
protected $transactionRepo;
protected $userRepo;

public function __construct(WalletRepositoryInterface $walletRepo,UserRepositoryInterface $userRepo,TransactionRepositoryInterface $transactionRepo )
{
    $this->walletRepo = $walletRepo;
    $this->userRepo = $userRepo;
    $this->transactionRepo = new TransactionService($transactionRepo);
}

    // credit
    public function credit($transaction){
        try {
        // get the user, check the transaction log if it has been reflected already else credit
        DB::beginTransaction();

        $user = $this->userRepo->currentUser();
        $transaction_exists = $this->transactionRepo->transactionLogExists($transaction);


        DB::commit();
        }catch (\Throwable $e){
        Db::rollBack();

        }

    }

    // debit
    public function debit(){
        try{
        // check if the debit has been done before, if not debit
        DB::beginTransaction();


        DB::commit();
        }catch (\Throwable $e){
            Db::rollBack();
        }

    }


}
