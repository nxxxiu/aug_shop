<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Goods;
use App\Order;
use App\OrderDetail;
use email\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    //提交订单
    public function orderAdd()
    {
        //购物车里的商品信息
        $cartInfo=Cart::where(['uid'=>Auth::id(),'cart_status'=>1])->get()->toArray();
//        dd($cartInfo);
        $order_amount=0;
        foreach ($cartInfo as $k=>$v){
            $order_amount+=$v['goods_price'];//计算订单金额
        }
        $order_sn = time().mt_rand(11111,99999).'cute';
        $orderInfo=[
            'uid'=> Auth::id(),
            'order_sn'=>$order_sn,
            'order_amount'=> $order_amount,
            'add_time'=> time()
        ];
//        dd($orderInfo);
        //订单详情表
        foreach($cartInfo as $k=>$v){
            $detailInfo=[
                'order_sn'=> $order_sn,
                'goods_id'=> $v['goods_id'],
                'goods_name'=> $v['goods_name'],
                'goods_price'=> $v['goods_price'],
                'uid'=> Auth::id()
            ];
//            dd($detailInfo);
            OrderDetail::insertGetId($detailInfo);
        }
        $res = Order::insert($orderInfo);
        if ($res){
            //清空购物车
            $emptyWhere=[
                'uid'=>Auth::id()
            ];
//            dd($emptyWhere);
            Cart::where($emptyWhere)->update(['cart_status'=>2]);
            header('Refresh:2;url=/orderlist');
            echo "生成订单成功";
        }else{
            die('提交订单失败');
        }
    }
    
    //订单列表
    public function orderlist()
    {
        $orderInfo=Order::where(['uid'=>Auth::id()])->orderBy("order_id","desc")->get()->toArray();
//        dd($orderInfo);
        if ($orderInfo){
            $data = [
                'orderInfo'=>$orderInfo
            ];
            return view('order.orderlist',$data);
        }else{
            header('Refresh:2;url=/cartlist');
            echo "还没有订单，快去下单吧！";
        }

    }
}
