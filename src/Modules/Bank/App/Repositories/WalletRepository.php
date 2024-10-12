<?php

namespace Modules\Bank\App\Repositories;

use Modules\Bank\App\Interfaces\WalletRepositoryInterface;
use Modules\Bank\App\Models\Wallet;
use Modules\Core\App\Repositories\CoreRepository;

class WalletRepository extends CoreRepository implements WalletRepositoryInterface
{
    public function __construct(Wallet $model)
    {
        parent::__construct($model);
    }
}
