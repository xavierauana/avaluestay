<?php

use Illuminate\Database\Seeder;

class PropertyTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $propertyTypes = [
            ["type"=>"Apartment"],
            ["type"=>"House"],
            ["type"=>"Bed & Breakfast"],
            ["type"=>"Cabin"],
            ["type"=>"Villa"],
        ];

        // Delete all record first
        DB::table('propertyTypes')->truncate();

        foreach($propertyTypes as $type){
            DB::table('propertyTypes')->insert($type);
        }
    }
}
