<?php

use Illuminate\Database\Seeder;

class CommissionTiersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tiers = [
         [
             "tier"=>"Standard",
             "rate"=>0.2
         ]
        ];

        // Delete all record first
        DB::table('commission_tiers')->truncate();

        foreach($tiers as $tier){
            DB::table('commission_tiers')->insert($tier);
        }
    }
}
