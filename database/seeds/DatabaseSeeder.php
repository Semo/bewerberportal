<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Turns off constraint checks
        Eloquent::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        $this->call(UserTableSeeder::class);
        $this->call(JobTableSeeder::class);
        $this->call(ApplicantTableSeeder::class);
        $this->call(AddressTableSeeder::class);


        //Turns on constraint checks
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
