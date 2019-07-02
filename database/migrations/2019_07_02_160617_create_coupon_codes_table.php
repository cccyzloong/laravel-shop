<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_codes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');//优惠券名称
            $table->string('code')->unique();//优惠码，用户下单时输入
            $table->string('type');//优惠券类型，支持百分比折扣
            $table->decimal('value');//折扣价，根据不同类型含义不同
            $table->unsignedInteger('total');//数量
            $table->unsignedInteger('used')->default(0);//已使用
            $table->decimal('min_amount', 10, 2);//使用优惠券时最低价
            $table->datetime('not_before')->nullable();//优惠券开始时间
            $table->datetime('not_after')->nullable();//优惠券截至时间
            $table->boolean('enabled');//优惠券是否生效
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupon_codes');
    }
}
