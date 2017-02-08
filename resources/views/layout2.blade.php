<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="tech team of PloverUAV">
	<title>@yield('title')</title>

	<!-- load bootstrap -->
	    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/bootstrap-switch.css" rel="stylesheet">
	<link href="/css/my.css" rel="stylesheet">

	<!--在bootcss.com中文网上找的，编程还是有国界的 -->
	@yield('css')
    <script>
	    window.Laravel = <?php echo json_encode([
	        'csrfToken' => csrf_token(),
	    ]); ?>
    </script>
</head>
<body>
<div id="app">
<!-- navbar-fixed-top没法用 -->
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
			    <!-- Branding Image -->
                <a href="/"><img src="/img/logo-header.png" width="100px;" height="53px;" /></a>

			</div>

			<div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav">
                    <span style="font-size: 200%; margin-left:280px;"><b>啄木鸟农业</b>•植保信息平台</span>
                </ul>
			    <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">登录</a></li>
                        <li><a href="{{ url('/register') }}">注册</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                欢迎:&nbsp;{{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                            	<li><a href="{{ url('home') }}">主页</li>
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        退出
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
			</div>
		</div>
	</nav>
	<div class="container container-bg">
		@yield('content')
	</div>
</div>
<hr>
<footer class="main">
    <p><a href="http://www.ploveruav.com">安徽啄木鸟无人机科技有限公司</a></p>
    <p>0555-2827298 | 2827986</p>
    <p>皖ICP备15026235号-1</p>
</footer>
    <!-- Scripts -->
    <script src="/js/app.js"></script>
    
    @yield('js')

</body>
</html>