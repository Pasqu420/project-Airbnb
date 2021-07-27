<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = [
        'sponsor_duration',
        'price',
        'scadenza'
    ];

    public function apartments()
    {
        return $this -> belongsToMany(Apartment::class, 'apartment_sponsor');
    }
}
