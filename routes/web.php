<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//主页
Route::get('/index', 'IndexController@index');

//商品
Route::get('/goodslist', 'GoodsController@goodslist');  //商品列表
Route::get('/goodsdetail/{goods_id}', 'GoodsController@goodsdetail');   //商品详情

//购物车
Route::get('/cartlist', 'CartController@cartlist');   //购物车列表
Route::get('/cartAdd/{goods_id}', 'CartController@cartAdd');    //加入购物车

//订单
Route::get('/orderAdd', 'OrderController@orderAdd');//提交订单
Route::get('/orderlist', 'OrderController@orderlist');//订单列表

//支付
Route::get('/pay/alipay','PayController@pay');//订单支付
Route::get('/pay/test','PayController@test');//测试私钥
Route::post('/notify_url','PayController@notifypay');//支付回调异步
Route::get('/return_url','PayController@aliReturn');//支付回调同步

//表关系测试
Route::get('/test/u','TestController@u');
Route::get('/test/user','TestController@user');