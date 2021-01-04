<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    
    protected $fillable = ['code', 'product_id'];
   
    protected $appends  = ['checked'];
   
    public function getCheckedAttribute()
    {
        return false;
    }

}
