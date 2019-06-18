<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    //
    protected $fillable = [
        'province',
        'city',
        'district',
        'address',
        'zip',
        'contact_name',
        'contact_phone',
        'last_used_at'
    ];
    protected $datas = [
        'last_used_at'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * 访问器
     * 获取地址信息
     */
    public function getFullAddressAttribute(){
        return "{$this->province}{$this->city}{$this->district}{$this->address}";
    }
}
