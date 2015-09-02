<?php

    use Carbon\Carbon;
    use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "name"=>"Manager",
                "email"=>"admin@avaluestay.com",
                "password"=> bcrypt("123456"),
                "verifiedEmail"=>1,
                "credit"=>0,
                "type" => "manager"
            ],
            [
                "name"=>"Subscription User",
                "email"=>"suser@test.com",
                "password"=> bcrypt("123456"),
                "verifiedEmail"=>1,
                "credit"=>0,
                "type" => "suser",
                "expiry_date" => Carbon::now()->addYear(1)
            ],
            [
                "name"=>"Credit User",
                "email"=>"cuser@test.com",
                "password"=> bcrypt("123456"),
                "verifiedEmail"=>1,
                "credit"=>10,
                "type" => "cuser"
            ],
            [
                "name"=>"Normal User",
                "email"=>"user@test.com",
                "password"=> bcrypt("123456"),
                "verifiedEmail"=>1,
                "credit"=>0,
                "type" => "user"
            ],
            [
                "name"=>"Xavier Au",
                "email"=>"xavier.au@gmail.com",
                "password"=> bcrypt("aukaiyuen"),
                "verifiedEmail"=>1,
                "credit"=>0,
                "type" => "user"
            ]
        ];

        // Delete all record first
        DB::table('users')->truncate();

        foreach($users as $user){
            DB::table('users')->insert($user);
        }

    }
}
