<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YogaClass extends Model
{
    protected $table = 'yogaclasses';
    protected $fillable = ['time','sunday','monday','tuesday','wednesday','thursday','friday','saturday'];
}
