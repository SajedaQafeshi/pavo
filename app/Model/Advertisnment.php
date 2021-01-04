<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Advertisnment extends Model implements TranslatableContract
{
    
    use Translatable;

    // To define which attributes needs to be translated
    public $translatedAttributes = ['title', 'description'];

}
