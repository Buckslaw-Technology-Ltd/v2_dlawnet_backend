<?php

namespace Modules\Bank\App\Services;

use Modules\Bank\App\Interfaces\TopUpRepositoryInterface;
use Modules\Bank\App\Interfaces\WalletRepositoryInterface;

class TopUpService
{
    protected TopUpRepositoryInterface $topUpRepo;
    protected WalletRepositoryInterface $walletRepo;

    public function __construct(TopUpRepositoryInterface $repository,WalletRepositoryInterface $walletRepo)
    {
        $this->topUpRepo = $repository;
        $this->walletRepo = $walletRepo;
    }

    // select toptups

    // fetch single topup

    // activate topup

    // deactivate topup


}
