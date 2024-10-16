<?php

namespace Modules\User\App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Bank\App\Models\Wallet;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = ['id'];
    protected $with = ['bio'];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed'
    ];

    public function Bio()
    {
        return $this->hasOne(Bio::class, 'user_id');
    }

    public function last_login(): void
    {
        $this->last_login = Carbon::now();
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'user_id');
    }
}
