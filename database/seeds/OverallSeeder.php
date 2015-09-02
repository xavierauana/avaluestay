<?php

    use avaluestay\bankinfo;
    use avaluestay\media;
    use avaluestay\property;
    use avaluestay\User;
    use Carbon\Carbon;
    use Illuminate\Database\Seeder;
    use Faker\Factory as Faker;
    use Illuminate\Support\Facades\DB;

    class OverallSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            Eloquent::unguard();

            $faker = Faker::create();
            for($round=0; $round<10000; $round++){
                // only 1 in 100 users will create a property
                $rand = rand(1,100);

                //this is the one who will lists a property
                if($rand == 1 ){

                    $newuser = $this->createUser($faker);

                    $newproperty = $this->createProperty($newuser, $faker);

                    $this->createBankInfo($newproperty);

                    $this->createFacilities($newproperty);

                    $this->createMedia($newproperty, $faker);

                }else{

                    $user = [
                        "name"=>$faker->firstName." ".$faker->lastName,
                        "email"=>$faker->unique()->email,
                        "password"=> bcrypt("123456"),
                        "verifiedEmail"=>1,
                        'type'=> "user"
                    ];

                    DB::table('users')->insert($user);

                }
            }
        }

        /**
         * @param $faker
         *
         * @return array
         */
        private function createUser($faker)
        {
            $user = [
                "name"          => $faker->firstName . " " . $faker->lastName,
                "email"         => $faker->unique()->email,
                "password"      => bcrypt("123456"),
                "verifiedEmail" => 1
            ];
            // if this user has list a property they are may be a paid user
            // only 1 in 5 who list the property will paid certain kind of
            // over 80% of paid user choose buy credit
            $index = rand(1, 5);
            if ($index == 1) {
                if (rand(1, 4) == 1) {
                    $user['type']        = 'suser';
                    $user['expiry_date'] = Carbon::now()->addYear();
                } else {
                    $user['type']   = 'cuser';
                    $user['credit'] = rand(10, 100);
                }
            } else {
                $user['type'] = "user";
            }
            $newuser = User::create($user);

            return $newuser;
        }

        /**
         * @param $newuser
         * @param $faker
         *
         * @return static
         */
        private function createProperty($newuser, $faker)
        {
            // Here create the property
            $property = [
                'user_id'             => $newuser->id,
                "propertyType_id"     => rand(1, 5),
                'bedType_id'          => 1,
                'roomType_id'         => rand(1, 3),
                'currency_id'         => 344,
                'commission_id'       => 1,
                'accommodates'        => rand(1, 5),
                'name'                => $faker->sentence(rand(3, 6)),
                'summary'             => $faker->paragraph(rand(1, 3)),
                'city'                => $faker->city,
                'price'               => rand(300, 3000),
                'approvalStatus'      => rand(0, 1) == 1 ? 'approved' : 'pending',
                'locationDescription' => $faker->paragraph(rand(1, 3))
            ];
            if ($property['approvalStatus']) {
                $property['listingStatus'] = rand(0, 1) == 1 ? 'unlisted' : 'listing';
            } else {
                $property['listingStatus'] = 'unlisted';

            }
            $newproperty = property::create($property);

            return $newproperty;
        }

        /**
         * @param $newproperty
         */
        private function createBankInfo($newproperty)
        {
            bankinfo::create(['property_id' => $newproperty->id]);
        }

        /**
         * @param $newproperty
         *
         * @return int
         */
        private function createFacilities($newproperty)
        {
            // Here create the facilities
            $facilityIds = [];
            for ($i = 0; $i < rand(2, 7); $i++) {
                $facilityIds[] = rand(1, 7);
            }
            if (count($facilityIds) > 0) {
                $newproperty->facilities()->sync($facilityIds);
            }
        }

        /**
         * @param $newproperty
         * @param $faker
         */
        private function createMedia($newproperty, $faker)
        {
// here create the images for the property
            for ($i = 0; $i < rand(3, 8); $i++) {
                $media = [
                    "property_id" => $newproperty->id,
                    'link'        => $faker->imageUrl(),
                    'tag'         => rand(0, 1) == 1 ? "property" : "neighbourhood",
                ];
                media::create($media);
            }
        }

    }
