<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\DB;

    class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();


        //disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

         $this->call(UserTableSeeder::class);
         $this->call(BedTypeTableSeeder::class);
         $this->call(PropertyTypeTableSeeder::class);
         $this->call(RoomTypeTableSeeder::class);
         $this->call(FacilityTableSeeder::class);
         $this->call(CurrencyTableSeeder::class);
         $this->call(MessageTableSeeder::class);
         $this->call(CommissionTiersTableSeeder::class);


        // supposed to only apply to a single connection and reset it's self
        // but I like to explicitly undo what I've done for clarity
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Model::reguard();
    }
}
