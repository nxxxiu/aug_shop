<?php

namespace App\Http\Controllers;

use App\Goods;
use App\MerchantModel;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    //商品列表
    public function goodslist()
    {
        $merchantInfo=MerchantModel::find(1)->merchantInfo->toArray();
//        dd($merchantInfo);
        $data=Goods::get();
        return view('goods.goodslist',compact('data'));
    }
    //商品详情
    public function goodsdetail($goods_id)
    {
        $goods_id=intval($goods_id);
        if (!$goods_id){
            exit('参数错误');
        }
        $data=Goods::where(['goods_id'=>$goods_id])->first();
        return view('goods.goodsdetail',compact('data'));
    }
}
