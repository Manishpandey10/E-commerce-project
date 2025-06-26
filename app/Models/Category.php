<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'id';

    public function products(){
        return $this->hasMany(Products::class , 'category_id');
    }
}
