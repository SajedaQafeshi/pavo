<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    // protected  $table = "order_items";


    protected $fillable = ['is_archived', 'size_id', 'color_id', 'amount', 'order_id', 'product_id'];
    public function Product()
    {
        return $this->belongsTo(ProductTranslation::class, 'product_id', 'id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }
}
