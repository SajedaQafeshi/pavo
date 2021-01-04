<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $guard = 'customer';

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'birth_date', 'total_point'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
