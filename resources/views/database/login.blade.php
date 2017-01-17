@extends('layout')

@section('title','Laravel Login Testing Unit')	
<!--section在标签中时,单行使用-->
@section('content')

<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		
		<div class="page-header">
			<h1><span class="glyphicon glyphicon-flash"></span> 登录</h1>
		</div>

		<!-- 带at标志的不能注释 -->
		@if ($errors->has('user_name'))
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }}<br>		
			@endforeach
		</div>
		@endif

		<form method="post" action="login">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<div class="form-group @if ($errors->has('user_name')) has-error @endif">
				<input class="form-control" type="text" name="user_name" placeholder="user_name or phone_num" value="{{ Request::old('user_name') }}">
				@if ($errors->has('user_name')) <p class="help-block">{{ $errors->first('user_name') }}</p> @endif
			</div>
			<div class="form-group @if ($errors->has('password')) has-error @endif">
				<input class="form-control" type="password" name="password" placeholder="password">
				@if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
			</div>
			
			<button type="submit" class="btn btn-success"> 登录</button>
		</form>
	</div>
</div>

@endsection