<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';
    protected $fillable = ['name', 'cost','image', 'description', 'overview', 'itineraries', 'cost_details', 'practical_info'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    // public function booking(){
    //     return $this->hasMany('App\Booking');
    // }
}
