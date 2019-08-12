<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');

    $router->resource('goods', GoodsController::class);
    $router->resource('cart', CartController::class);
    $router->resource('order', OrderController::class);
    $router->resource('order_detail', OrderDetailController::class);
    $router->resource('users', UsersController::class);
    $router->resource('sku', SkuController::class);
});

