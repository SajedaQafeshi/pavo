<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    
    protected $fillable = ['body', 'title', 'image', 'discount'];
   
    protected $appends  = ['checked'];
   
    public function getCheckedAttribute()
    {
        return false;
    }

}
