<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    
    protected $fillable = ['name', 'image', 'visible', 'amount', 'category_id',
        'is_archived', 'price', 'description', 'view_counter',
        'point_counter', 'disposal', 'wholesale', 'product_id', 'locale'];
   
    public $timestamps = false;
    protected $appends  = ['checked'];
   
    public function getCheckedAttribute()
    {
        return false;
    }

}
