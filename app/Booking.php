<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    protected $fillable = [
        'id',
        'package_id',
        'name',
        'email',
        'country',
        'mobileNo',
        'issueDate',
        'description',
    ];

    public function package()
    {
        return $this->belongsTo('App\Package');
    } 
    public function user()
    {
        return $this->belongsTo('App\User');
    } 

}
