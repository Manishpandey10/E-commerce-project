<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'id';

    public function products(){
        return $this->belongsTo(Products::class, 'product_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
