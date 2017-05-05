<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class JobTableSeeder extends Seeder
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
        DB::table('job')->truncate();

        for ($i = 0; $i < $limit; $i++) {
            DB::table('job')->insert([
                'job_reference' => $faker->ean8,
                'place_of_employment' => $faker->city,
                'wage_group' => "A9",
                'career' => "gehobener Verwaltungsdienst gVD",
                'remit' => "Sachbearbeiter_In, CERT/BPOL",
                'requirements' => $faker->realText(500),
                'comments' => $faker->realText(500),
                'time_limit' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
