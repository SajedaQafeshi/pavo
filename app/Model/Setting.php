<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Setting extends Model implements TranslatableContract
{
    
    use Translatable;
   
    public $translatedAttributes = ['about_us', 'delivery', 'about_products', 'support'];

}
