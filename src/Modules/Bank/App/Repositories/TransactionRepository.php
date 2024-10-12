<?php

namespace Modules\Bank\App\Repositories;

use Modules\Bank\App\Interfaces\TransactionRepositoryInterface;
use Modules\Bank\App\Models\Transaction;
use Modules\Core\App\Repositories\CoreRepository;

class TransactionRepository extends CoreRepository implements TransactionRepositoryInterface
{
    public function __construct(Transaction $model)
    {
        parent::__construct($model);
    }
}
