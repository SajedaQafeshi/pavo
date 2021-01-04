<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    protected $fillable = ['name', 'visible', 'image', 'is_archived', 'category_id', 'locale'];
   
    public $timestamps = false;

}
