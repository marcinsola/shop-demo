<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'is_closed'];

    public function products() {
        return $this->belongsToMany(Product::class, 'cart_product');
    }
}
