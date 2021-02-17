<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homeslider extends Model
{
    protected $table = 'homesliders';
    protected $fillable = ['carousel_caption_detail','carousel_caption_title','image'];

}
