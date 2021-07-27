<?php

use Illuminate\Database\Seeder;
use App\Image;
class ImageSeeder extends Seeder
{
    public function run()
    {
        factory(Image::class,380)->create();
    }
}
