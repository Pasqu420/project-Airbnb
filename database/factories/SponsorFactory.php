<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sponsor;
use Faker\Generator as Faker;

$nextIndex = nextIndex();
// nextIndex() è un generatore
// permette di far avanzare l'index di uno
// usando yield invece di return, non interrompe il funzionamento del codice
// in questo modo, definendo gli sponsor in modo statico
// possiamo generarli nella tabella

$factory->define(Sponsor::class, function (Faker $faker) use ($nextIndex) {

    $sponsors = [
        [
            'sponsor_duration'=>24,
            'price'=>299,
        ],
        [
            'sponsor_duration'=>72,
            'price'=>599,
        ],
        [
            'sponsor_duration'=>144,
            'price'=>999,
        ]
    ];
    
    // prende l'elemento corrente nella funzione nextIndex()
    $i = $nextIndex->current();
    $sponsor = $sponsors[$i];
    // avanza di uno l'index nella funzione nextIndex()
    $nextIndex->next();
    
    return [

        'sponsor_duration' => $sponsor['sponsor_duration'],
        'price' => $sponsor['price']
    ];
});

function nextIndex()
{   
    for($i=0; $i<3; $i++) {

        yield $i;
    }
}