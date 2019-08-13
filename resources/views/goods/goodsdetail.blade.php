<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        /*.full-height {*/
        /*    height: 100vh;*/
        /*}*/
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }
        .position-ref {
            position: relative;
        }
        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }
        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .img {
            margin: 50px;
        }
        .detail {
            float: right;
            list-style: none;
            margin-right: 350px;
            margin-top: 80px
        }
        #submit {
            width: 140px;
            height: 50px;
            background-color: red;
            color: #ffffff;
            border: none;
            margin-top: 50px;
        }
        .titles {
            font-size: 20px;
        }
        .contents {
            font-size: 27px;
        }
        button {
            width: 80px;
            height: 30px;
            background-color: #ffffff;
            border: grey;
            margin: 6px;
            cursor:pointer;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>
<img class="img" src="/storage/{{$data['goods_img']}}" alt="暂无图片" width="480" height="490">
<ul class="detail">
    <li><font class="titles">商品名称：</font> <font class="contents">{{$data['goods_name']}}</font></li>
    <li><font class="titles">商品价格：</font> <font class="contents">￥{{$data['goods_price']}}</font></li>
    <li><font class="titles">商品库存：</font> <font class="contents">{{$data['goods_store']}}件</font></li>
    <li><font class="titles">商品详情：</font> <font class="contents">{{$data['goods_desc']}}</font></li>
    <li><font class="titles">口味选择：</font> <button>原味</button> <button>草莓味</button></li>
    <li><font class="titles">大小选择：</font> <button>80ml</button> <button>12ml</button></li>
    <form action="/cartAdd/{{$data['goods_id']}}" method="get">
        <input type="submit" value="加入购物车" id="submit">
    </form>
</ul>

<p align="center">©2015-2019 Powered By 旺仔集团   旺旺</p>
</body>
</html>