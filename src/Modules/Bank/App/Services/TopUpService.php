<?php

namespace Modules\Bank\App\Services;

use Modules\Bank\App\Interfaces\TopUpRepositoryInterface;

class TopUpService
{
    protected $topUpRepo;

    public function __construct(TopUpRepositoryInterface $repository)
    {
        $this->topUpRepo = $repository;
    }

}
