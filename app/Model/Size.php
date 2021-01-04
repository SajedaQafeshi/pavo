<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    
    protected $fillable = ['name', 'product_id'];
   
    protected $appends  = ['checked'];
   
    public function getCheckedAttribute()
    {
        return false;
    }

}
