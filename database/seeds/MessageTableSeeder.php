<?php

    use Carbon\Carbon;
    use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        // Delete all record first
        DB::table('messages')->truncate();

        $messages = [];
        for($i=0; $i<100; $i++)
        {
            $senderId = rand(1,5);
            do{
                $receiverId = rand(1,5);
            }while($senderId == $receiverId);

            $faker = Faker::create();

            $messages[] =[
                    "sender_id"=> $senderId,
                    "receiver_id"=> $receiverId,
                    "message"=> $faker->sentence,
                    "read"=> 0,
                    "created_at"=> Carbon::now()->subSeconds(rand(1, 61))->subMinutes(rand(1, 61)),
                ];
        }

        foreach($messages as $message){
            DB::table('messages')->insert($message);
        }
    }
}
