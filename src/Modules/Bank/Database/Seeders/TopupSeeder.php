<?php

namespace Modules\Bank\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Bank\App\Models\Pricing;
use Modules\Bank\App\Models\TopUp;
use Modules\Bank\Database\Enums\AccountTypeEnum;

class TopupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);
        if(Topup::count()  < 1){

            $topups = [
                [
                    'title'=>'3,000 Credit',
                    'amount' => 3000,
                    'account_type'=>AccountTypeEnum::AllAccountTypes
                ],
                [
                    'title'=>'6,000 Credit',
                    'amount' => 6000,
                    'account_type'=>AccountTypeEnum::AllAccountTypes
                ],
                [
                    'title'=>'9,000 Credit',
                    'amount' => 9000,
                    'account_type'=>AccountTypeEnum::AllAccountTypes
                ],
                [
                    'title'=>'16,000 Credit',
                    'amount' => 16000,
                    'account_type'=>AccountTypeEnum::AllAccountTypes
                ],
                [
                    'title'=>'20,000 Credit',
                    'amount' => 20000,
                    'account_type'=>AccountTypeEnum::AllAccountTypes
                ],
                [
                    'title'=>'30,000 Credit',
                    'amount' => 30000,
                    'account_type'=>AccountTypeEnum::AllAccountTypes
                ],
                [
                    'title'=>'50,000 Credit',
                    'amount' => 50000,
                    'account_type'=>AccountTypeEnum::AllAccountTypes
                ],
                [
                    'title'=>'100,000 Credit',
                    'amount' => 100000,
                    'account_type'=>AccountTypeEnum::AllAccountTypes
                ],
            ];

            foreach($topups as $list){
              $topup =  Topup::firstOrCreate($list);
              $pricing = Pricing::firstOrCreate(['top_up_id'=>$topup->id],[
                  'amount'=>$list['amount'],
                  'country_code'=>'NGA',
                  'currency_code'=>'NGN']);
              $topup->pricings()->save($pricing);
            }

        }
    }
}
