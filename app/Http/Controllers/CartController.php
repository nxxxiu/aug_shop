<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Goods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //购物车列表
    public function cartlist()
    {
        $cartInfo=Cart::where(['uid'=>Auth::id(),'cart_status'=>1])->get()->toArray();
//        if ($cartInfo){
//            //商品总价
//            $goods_amount=0;
//            foreach($cartInfo as $k=>$v){
//                $goods=Goods::where(['goods_id'=>$v['goods_id']])->first()->toArray();
//                $goods_amount+=$v['goods_price']*$v['buy_number'];
//                $goods_list[]=$goods;
//                $buy_number=$v['buy_number'];
//            }
//            $data=[
//                'goods_list'=>$goods_list,
//                'buy_number'=>$buy_number,
//                'goods_amount'=>$goods_amount
//            ];
////            dd($data);
//            return view('cart.cartlist',$data);
//        }else{
//            header('Refresh:2;url=/goodslist');
//            die("购物车为空");
//        }
//        dd($cartInfo);
        if ($cartInfo){
            return view('cart.cartlist',compact('cartInfo'));
        }else{
            header('Refresh:2;url=/goodslist');
            die("购物车是空的，快去加购！");
        }
    }

    //加入购物车
    public function cartAdd($goods_id)
    {
        $uid = Auth::id();
        if (!$uid){
            header('Refresh:2;url=/login');
            die("请先登录");
        }
        if (empty($goods_id)){
            header('Refresh:3;url=/cart');
            die("请选择商品");
        }
        $goodsInfo=Goods::where(['goods_id'=>$goods_id])->first();
//        dd($goodsInfo);
        if ($goodsInfo){
            //商品状态为2 已经被删除
            if ($goodsInfo->goods_status==2){
                header('Refresh:2;url=/cartlist');
                echo "商品不存在";die;
            }
            //判断购物车表是否有这条商品数据
            $cartWhere=[
                'uid'=>Auth::id(),
                'goods_id'=>$goods_id,
                'cart_status'=>1
            ];
            $cartWhereInfo=Cart::where($cartWhere)->first();
//            dd($cartWhereInfo);
            if (empty($cartWhereInfo)){ //没有数据 加入购物车
                $cartInfo=[
                    'goods_id'=>$goods_id,
                    'goods_name'=>$goodsInfo->goods_name,
                    'goods_price'=>$goodsInfo->goods_price,
                    'uid'=>Auth::id(),
                ];
//            dd($cartInfo);
                //入库
                $res=Cart::insertGetId($cartInfo);
//            dd($res);
                if ($res){
                    header('Refresh:2;url=/cartlist');
                    die("添加购物车成功");
                }else{
                    header('Refresh:2;url=/cartlist');
                    die("添加购物车失败");
                }
            }else{  //有数据 累加
                $updateInfo=[
                    'buy_number'=>$cartWhereInfo['buy_number']+1
                ];
                $res=Cart::where($cartWhere)->update($updateInfo);
                if ($res){
                    header('Refresh:2;url=/cartlist');
                    die("添加购物车成功");
                }else{
                    header('Refresh:2;url=/cartlist');
                    die("添加购物车失败");
                }
            }
        }else{
            echo "商品不存在";
        }
    }
}