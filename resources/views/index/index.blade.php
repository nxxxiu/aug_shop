<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .full-height {
            height: 100vh;
        }
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
        .title {
            text-decoration: none;
            font-size: 64px;
            color: #848484;
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

    <h2><a href="/goodslist" class="title">商品列表</a></h2>
    <h2><a href="/cartlist"  class="title">去购物车</a></h2>
    <h2><a href=""  class="title">个人中心</a></h2>
    <img src="/img/bao.jpg" alt="" style="width: 230px;height: 350px;">
    <img src="/img/xing.jpg" alt="" style="width: 230px;height: 350px;">
    <img src="/img/ge.jpg" alt="" style="width: 230px;height: 350px;">
    <img src="/img/xie.jpg" alt="" style="width: 230px;height: 350px;">
</div>
<p align="center">©2015-2019 Powered By 旺仔集团   旺旺</p>
</body>
</html>