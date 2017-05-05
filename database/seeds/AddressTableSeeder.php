<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 30;

        // Truncate table before filling it.
        DB::table('adresses')->truncate();

        // Binge filling data
        for ($i = 0; $i < $limit; $i++) {
            DB::table('adresses')->insert([
                'applicant_id' => $i + 1,
                'street' => $faker->streetName,
                'state' => $faker->country,
                'zipcode' => $faker->postcode,
                'city' => $faker->city,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
