<?php

namespace Modules\Bank\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Bank\Database\factories\TopUpFactory;

class TopUp extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): TopUpFactory
    {
        //return TopUpFactory::new();
    }
}
