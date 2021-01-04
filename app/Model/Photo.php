<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    
    protected $fillable = ['slug','product_id ','is_archived','visible'];
   
    protected $appends  = ['checked'];
   
    public function getCheckedAttribute()
    {
        return false;
    }

}
