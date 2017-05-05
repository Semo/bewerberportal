<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ApplicantTableSeeder extends Seeder
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
        DB::table('applicants')->truncate();

        for ($i = 0; $i < $limit; $i++) {
            DB::table('applicants')->insert([
                'user_id' => $i + 1,
                'salutation' => 'Frau/Herr',
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'birthdate' => $faker->dateTimeBetween('-40 years', 'now'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'address_id' => $i + 1
            ]);
        }

    }
}

