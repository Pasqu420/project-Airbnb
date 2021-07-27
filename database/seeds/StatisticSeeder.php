<?php

use Illuminate\Database\Seeder;
use App\Statistic;
use App\Apartment;

class StatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Statistic::class, 2000)->make()->each(function ($statistic) {

            $apartment=Apartment::inRandomOrder()->first();
            $statistic->apartment()->associate($apartment);
            $statistic->save();
        });
    }
}
