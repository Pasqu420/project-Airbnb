<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apartment extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'number_rooms',
        'number_toiletes',
        'number_beds',
        'area',
        'address',
        'latitude',
        'longitude',
        // 'cover_image',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(Apartment::class);
    }

    public function services()
    {
        return $this -> belongsToMany(Service::class);
    }

    public function sponsors()
    {
        return $this -> belongsToMany(Sponsor::class, 'apartment_sponsor')->withPivot('start_date','expire_date');
    }

    public function statistics()
    {
        return $this -> hasMany(Statistic::class);
    }

    public function messages()
    {
        return $this -> hasMany(Message::class);
    }

    public function images()
    {
        return $this -> hasMany(Image::class);
    }
}
