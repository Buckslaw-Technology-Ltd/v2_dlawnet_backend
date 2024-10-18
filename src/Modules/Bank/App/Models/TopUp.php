<?php

namespace Modules\Bank\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Modules\Bank\Database\factories\TopUpFactory;

/**
 *
 * @class TopUp
 * @property string title
 * @property string slug
 * @property float amount
 * @property string description
 * @property string status //'active', 'paused' default is active
 * @property string account_type //'all', 'university','law_school' default is all
 */
class TopUp extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    protected $appends = [
      'topup_pricings'
    ];

    public function getTopupPricingsAttribute($location='*'){

        $code = $this->pricings()
            ->where('country_code',$location);

        if($location !== '*'){
            if($code->count()>0){
              return $code;
            }
            return $this->pricings()
                ->where('country_code','*');
        }
        return $code;
    }


    public function pricings(){
        return $this->hasMany(Pricing::class);
    }

    protected static function boot()
    {
        parent::boot();
        parent::creating(static function($model){
            $model->slug = Str::slug($model->title);
        });
    }

}
