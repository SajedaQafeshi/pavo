<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CityTranslation extends Model
{
    
    protected $fillable = ['name', 'order', 'visible', 'city_id', 'locale'];
   
    public $timestamps = false;
}
