<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
  protected $table = 'order_items';
  protected $primaryKey = 'id';

  public function products()
  {
    return $this->belongsTo(Products::class, 'product_id');
  }
}
