<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $table = 'instructors';
    protected $fillable = ['name','image','designation','description'];
}
