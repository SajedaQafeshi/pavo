<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SettingTranslation extends Model
{
    
    protected $fillable = ['about_us', 'delivery', 'about_products', 
        'support'];
   
    public $timestamps = false;

}
