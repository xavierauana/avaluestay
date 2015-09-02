<?php

use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class BedTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bedTypes = [
            ["type"=>"Real Bed"],
            ["type"=>"Airded"],
            ["type"=>"Futon"],
            ["type"=>"Pull-out Sofa"]
        ];

        // Delete all record first
        DB::table('bedTypes')->truncate();

        foreach($bedTypes as $type){
            DB::table('bedTypes')->insert($type);
        }
    }
}
