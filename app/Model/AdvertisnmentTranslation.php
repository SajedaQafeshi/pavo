<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdvertisnmentTranslation extends Model
{
    protected $fillable = ['title', 'visible', 'image', 'is_archived', 'advertisement_id', 'locale', 
        'description', 'type'];
   
    public $timestamps = false;

}
