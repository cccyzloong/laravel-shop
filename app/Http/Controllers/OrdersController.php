<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\UserAddress;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Exceptions\InvalidRequestException;

class OrdersController extends Controller
{
    //订单列表
    public function index(Request $request){
        $orders = Order::query()
        ->with(['items.product','items.productSku'])
        ->where('user_id',$request->user()->id)
        ->orderBy('created_at','desc')
        ->paginate();
        return view('orders.index',['orders' => $orders]);
    }
    //订单详情
    public function show(Order $order,Request $request){
        $this->authorize('own', $order);
        return view('orders.show',['order' => $order->load(['items.product','items.productSku'])]);
    }
    //提交订单
    public function store(OrderRequest $request,OrderService $orderService)
    {
        $user    = $request->user();
        $address = UserAddress::find($request->input('address_id'));
        return $orderService->store($user, $address, $request->input('remark'), $request->input('items'));
    }
    //确认收货
    public function received(Order $order,Request $request){
        // 校验权限
        $this->authorize('own',$order);
        // 判断订单的发货状态是否为已发货
        if ($order->ship_status !== Order::SHIP_STATUS_DELIVERED) {
            throw new InvalidRequestException('发货状态不正确');
        }
        // 更新发货状态为已收到
        $order->update(['ship_status' => Order::SHIP_STATUS_RECEIVED]);

        // 返回原页面
        return $order;
    }
}
