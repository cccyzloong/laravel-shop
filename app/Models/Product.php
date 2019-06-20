<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'title','description','image','on_sale', 
        'rating', 'sold_count', 'review_count', 'price'
    ];
    protected $cats = [
        'on_sale' => 'boolean',
    ];
    public function sku()
    {
        return $this->hasMany('App\Models\ProductSku');
    }
}
