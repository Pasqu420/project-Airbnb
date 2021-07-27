<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                UserSeeder::class,
                ApartmentSeeder::class,
                ImageSeeder::class,
                MessageSeeder::class,
                SponsorSeeder::class,
                ServiceSeeder::class,
                StatisticSeeder::class,
            ]
        );
    }
}
