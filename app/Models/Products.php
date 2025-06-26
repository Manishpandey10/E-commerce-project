<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function carts(){
        return $this->hasMany(Cart::class , 'product_id');
    
    }
    public function orderItems(){
        return $this->hasMany(OrderItems::class , 'product_id');
    }
}
