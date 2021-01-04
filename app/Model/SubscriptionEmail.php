<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubscriptionEmail extends Model
{
    
    protected $fillable = ['email'];
   
    protected $appends  = ['checked'];
   
    public function getCheckedAttribute()
    {
        return false;
    }

}
