<?php

namespace Modules\Bank\Database\Enums;

enum TransactionStatusEnum
{
    const PENDING = 'pending';
    const COMPLETED = 'completed';
    const SUBMITTED = 'updated';
    const DECLINED = 'declined';
}
