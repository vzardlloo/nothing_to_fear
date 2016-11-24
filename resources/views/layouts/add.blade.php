@extends('layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<ol class="breadcrumb">
			  <li><a href="#">首页</a></li>
			  <li class="active">@yield('bar')</li>
			</ol>			
			<div class="panel panel-default">
				<div class="panel-heading">@yield('panel-heading-1')</div>
	            <div class="panel-body">
	                @yield('panel-body-1')
	            </div>
	            <div class="panel-heading">@yield('panel-heading-2')</div>
	            <div class="panel-body">
	                @yield('panel-body-2')
	            </div>
            </div>
		</div>
	</div>
</div>
@endsection