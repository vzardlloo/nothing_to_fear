<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>啄木鸟农业 - 植保信息平台</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<!-- 因为index.PHP也在public下,所以url直接省去public -->
	<link rel="stylesheet" href="assets/icon.css"/>
    <link rel="stylesheet" type="text/css" href="http://fonts.useso.com/css?family=Roboto:300,400,500,700"/>
	<link rel="stylesheet" href="http://libs.useso.com/js/font-awesome/4.2.0/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css" rel="stylesheet"/>

</head>

<body class="signup-page">
	<nav class="navbar navbar-transparent navbar-absolute">
    	<div class="container">
        	<!-- Brand and toggle get grouped for better mobile display -->
        	<div class="navbar-header">
        		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
            		<span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
        		</button>
        		<a class="navbar-brand" href="http://x.ploveruav.com">啄木鸟农业</a>
        	</div>

        	<div class="collapse navbar-collapse" id="navigation-example">
        		<ul class="nav navbar-nav navbar-right">
					<li>
    					<a href="#" target="_blank">
    						查看正在作业
    					</a>
    				</li>
    				<li>
						<a href="#" target="_blank">
							<i class="material-icons">unarchive</i> 关于啄木鸟农业
						</a>
    				</li>
        		</ul>
        	</div>
    	</div>
    </nav>

    <div class="wrapper">
		<div class="header header-filter" style="background-image: url('assets/img/bg5.jpg'); background-size: cover; background-position: top center;">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card card-signup">
							<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        		{{ csrf_field() }}
								<div class="header header-primary text-center">
									<h3>登 录</h3>
									<div class="social-line">
										<h4>啄木鸟农业</h4>
									</div>
								</div>
								<p class="text-divider">植保信息平台</p>
								<div class="content">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
										<input type="text" class="form-control" name="email" placeholder="邮箱...">
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input type="password" name="password" placeholder="密码..." class="form-control" />
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox" name="remember" checked>
											记住 我
										</label>
									</div>
								</div>
								<div class="footer text-center">
									<button type="submit" class="btn btn-simple btn-primary btn-lg">进入作业平台</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<footer class="footer">
		        <div class="container">
		            <nav class="pull-left">
						<ul>
							<li>
								<a href="http://www.ploveruav.com">
									啄木鸟官网
								</a>
							</li>
							<li>
								<a href="http://weixin.ploveruav.com/about.html">
								   关于我们
								</a>
							</li>
							<li>
								<a href="http://weixin.ploveruav.com/contact.html">
									联系我们
								</a>
							</li>
							<li>
								<a href="http://weixin.ploveruav.com/team.html">
								   啄木鸟团队
								</a>
							</li>
						</ul>
		            </nav>
		            <div class="copyright pull-right">
		                &copy; 2017, made with <i class="fa fa-heart heart"></i> by <a href="http://www.ploveruav.com" target="_blank">PloverUAV</a>
		            </div>
		        </div>
		    </footer>

		</div>

    </div>


</body>
	<!--   Core JS Files   -->
	<script src="/assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/assets/js/material.min.js"></script>
	<script src="/assets/js/material-kit.js" type="text/javascript"></script>
</html>
