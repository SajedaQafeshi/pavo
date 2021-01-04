<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Discount extends Authenticatable
{
    protected $fillable = ['code', 'value', 'date_from', 'date_to'];
   
    protected $appends  = ['checked'];
   
    public function getCheckedAttribute()
    {
        return false;
    }
}
