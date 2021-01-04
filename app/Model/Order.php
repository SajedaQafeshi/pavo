<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // protected  $table = "orders";
    protected $fillable = ['is_archived', 'total_price', 'region_id', 'is_delivery', 'cutomer_points', 'cutomer_id', 'cutomer_check', 'code_discount', 'total_point'];


    // protected $appends  = ['checked'];
}
