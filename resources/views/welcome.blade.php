<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PoverUAV公测</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
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

        .content {
            text-align: center;
        }

        .title {
            font-size: 106px;
        }
        @media (max-width: 769px){
            .title{
                font-size: 58px;
            }
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        @media (max-width: 769px){
            .links > a{
                padding: 0 6px;
            }
        }
        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/task') }}">开始测试</a>
            @else
                <a href="{{ url('/login') }}">登录</a>
                <a href="{{ url('/register') }}">注册</a>
            @endif
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            PloverUAV
        </div>
        <h4>啄木鸟无人机植保信息平台公测进行中 ......</h4>
        <div class="links">
            <a href="{{ url('add/farmer') }}">添加农户</a>
            <a href="{{ url('add/user') }}">添加用户</a>
            <a href="{{ url('task') }}">创建任务</a>
            <a href="{{ url('add/address') }}">添加地址</a>
            <a href="{{ url('add/uav') }}">添加无人机</a>
        </div>
    </div>
</div>
</body>
</html>

