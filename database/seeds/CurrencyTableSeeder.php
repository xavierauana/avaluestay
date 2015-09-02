<?php

use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            [
                "symbol"=>"HKD",
                "id"=>"344",
                "conversionRate"=>1.0
            ],
            [
                "symbol"=>"USD",
                "id"=>"840",
                "conversionRate"=>0.128968
            ],
            [
                "symbol"=>"EUR",
                "id"=>"978",
                "conversionRate"=>0.112606304
            ]

        ];

        // Delete all record first
        DB::table('currencies')->truncate();

        foreach($currencies as $currency){
            DB::table('currencies')->insert($currency);
        }
    }
}
