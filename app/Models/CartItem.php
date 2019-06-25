<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//购物车
class CartItem extends Model
{
    //
    protected $fillable = ['amount'];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function productSku()
    {
        return $this->belongsTo(ProductSku::class);
    }
}
