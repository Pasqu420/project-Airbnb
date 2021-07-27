<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use App\Apartment;
use Faker\Generator as Faker;

$nextIndex = nextImage();
$factory->define(Image::class, function (Faker $faker) use ($nextIndex) {
    $i = $nextIndex->current();

    $images = [];
    $apartments = Apartment::all();
    $tot = count($apartments);
    foreach ($apartments as $apartment) {

        $idApartment = $apartment->id;
        for ($j=0; $j < 5 ; $j++) { 

            switch ($j) {
                case 0:
                    // $folder = 'external';
                    $url = asset('storage/app/public/apartment_img/'.$idApartment.'.jpg');
                    break;
                    
                case 1:
                    // $folder = 'living-room';
                    $url = asset('storage/app/public/apartment_img/'.($idApartment + $tot).'.jpg');
                    break;

                case 2:
                    // $folder = 'kitchen';
                    $url = asset('storage/app/public/apartment_img/'.($idApartment + ($tot * 2)).'.jpg');
                    break;
        
                case 3:
                    // $folder = 'bedroom';
                    $url = asset('storage/app/public/apartment_img/'.($idApartment + ($tot * 3)).'.jpg');
                    break;
           
                case 4:
                    // $folder = 'bathroom';
                    $url = asset('storage/app/public/apartment_img/'.($idApartment + ($tot * 4)).'.jpg');
                    break;
            }
            $imageNameArr = explode('/',$url);
            $imageName = $imageNameArr[count($imageNameArr)-1];
            $photo = [
                'image' => $imageName,
                'apartment_id' => $idApartment,
                // 'folder' => $folder
            ];
            $images []= $photo; 
        } 
    }

    $image = $images[$i];
    $nextIndex->next();
    return [
        'image' => $image['image'],
        'apartment_id' => $image['apartment_id'],
        // 'folder' => $image['folder']
    ];
});

function nextImage()
{
    for($i=0; $i<380; $i++) {
        yield $i;
    }
}
