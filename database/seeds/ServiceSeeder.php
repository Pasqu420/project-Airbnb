<?php

use Illuminate\Database\Seeder;
use App\Service;
use App\Apartment;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Service::class, 12)->create()->each(function ($service) {
            $apartments=Apartment::inRandomOrder()->limit(rand(4,8))->get();
            $service->apartments()->attach($apartments);
            $service->save();
        });
    }
}
