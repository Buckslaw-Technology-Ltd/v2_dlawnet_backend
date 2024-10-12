<?php

namespace Modules\Bank\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Bank\Database\factories\WalletFactory;
use Modules\User\App\Models\User;

class Wallet extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = ['id'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
