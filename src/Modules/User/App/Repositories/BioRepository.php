<?php

namespace Modules\User\App\Repositories;

use Modules\Core\App\Repositories\CoreRepository;
use Modules\User\App\Interfaces\BioRepositoryInterface;
use Modules\User\App\Models\Bio;

class BioRepository extends CoreRepository implements BioRepositoryInterface
{
    public function __construct(Bio $model)
    {
        parent::__construct($model);
    }
}
