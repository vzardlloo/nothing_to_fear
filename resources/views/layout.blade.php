<!doctype html>
<html>
<head>
	<title>@yield('title')</title>

	<!-- load bootstrap -->
	
	<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
	<!--在bootcss.com中文网上找的，编程还是有国界的 -->
	<style>
		body{ padding-bottom:40px; padding-top:40px; }
	</style>
	@yield('style')

</head>
<body class="container">

	@yield('content')

</body>
</html>