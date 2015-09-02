<?php

use Illuminate\Database\Seeder;

class FacilityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facilities = [
            "Household"=>[
                "Microwave",
                "Television",
                "Wash Machine",
                "Air Conditioner",
            ],
             "Connectivity"=>[
                 "Wifi",
                 "Boardband",
                 "Telephone",
             ]
        ];

        // Delete all record first
        DB::table('facilities')->truncate();

        foreach($facilities as $type =>$items){
            $dataInsert=[];
            $dataInsert["type"] = $type;
            foreach( $items as $item ){
                $dataInsert["item"] = $item;
                DB::table('facilities')->insert($dataInsert);
            }
        }
    }
}
