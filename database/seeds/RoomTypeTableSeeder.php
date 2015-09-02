<?php

use Illuminate\Database\Seeder;

class RoomTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roomTypes = [
            ["type"=>"Entire home/apt"],
            ["type"=>"Private Room"],
            ["type"=>"Shared Room"],
        ];

        // Delete all record first
        DB::table('roomTypes')->truncate();

        foreach($roomTypes as $type){
            DB::table('roomTypes')->insert($type);
        }
    }
}
