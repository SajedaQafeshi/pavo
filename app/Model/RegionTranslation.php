<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RegionTranslation extends Model
{
    
    protected $fillable = ['name', 'visible', 'price', 'is_archived', 'region_id', 'locale'];
   
    public $timestamps = false;
}
