<?php

namespace Modules\Bank\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Bank\Database\factories\PricingFactory;

/**
 * @class Pricing
 * @note Topup and account activation pricing
 * @property int top_up_id
 * @property string country_code
 * @property string amount
 * @property string currency_code
 */
class Pricing extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected static function newFactory(): PricingFactory
    {
        //return PricingFactory::new();
    }
}
