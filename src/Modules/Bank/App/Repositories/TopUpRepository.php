<?php

namespace Modules\Bank\App\Repositories;

use Modules\Bank\App\Interfaces\TopUpRepositoryInterface;
use Modules\Bank\App\Models\TopUp;
use Modules\Core\App\Repositories\CoreRepository;

class TopUpRepository extends CoreRepository implements TopUpRepositoryInterface
{
    public function __construct(TopUp $model)
    {
        parent::__construct($model);
    }
}
