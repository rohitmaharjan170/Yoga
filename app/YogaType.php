<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YogaType extends Model
{
    protected $table = 'yogatypes';
    protected $fillable = ['name','image','description'];
}
