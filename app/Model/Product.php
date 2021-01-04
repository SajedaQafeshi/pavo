<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Product extends Model 
{
    protected $fillable = ['category_id'];

   use Translatable;

   public $translatedAttributes = ['name', 'description'];

}
