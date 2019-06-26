<?php

namespace App\Services;
use Auth;
use App\Models\CartItem;
class CartService {
    public function get(){
        return Auth::user()->cartItems()->with(['ProductSku.product'])->get();
    }
    public function add($skuId,$amount){
        $user = Auth::user();
        if ($item = $user->cartItems()->where('product_sku_id',$skuId)->first()) {
            $item->update([
                'amount' => $item->amount + $amount,
            ]);
        }else{
            //没有记录，则重新创建一个购物车
            $item = new CartItem(['amount'=>$amount]);
            $item->user()->associate($user);
            $item->productSku()->associate($skuId);
            $item->save();
        }
        return $item;
    }
    public function remove($skuIds){
        //单个id或者id数组
        if (!is_array($skuIds)) {
            $skuIds = [$skuIds];
        }
        Auth::user()->cartItems()->whereIn('product_sku_id',$skuIds)->delete();
    }
}