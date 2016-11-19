@extends('layout')
@section('content')

	<div class="panel">
		@foreach($users as $one)
		<li>
			{{ $one->user_name }}
		</li>
		@endforeach
	</div>

	<form action="/user" method="post">
		{{ csrf_field() }}
		<input class="form-control" type="text" name="user_name" placeholder="用户名">
		<input class="form-control" type="password" name="password" placeholder="密码">
		<input class="form-control" type="text" name="phone_num" placeholder="手机号">
		<select class="form-control" name="role">
			<option value="1" selected="selected">观察员</option>
			<option value="2">飞控手</option>
			<option value="3">其他</option>
		</select>
		<Button type="submit" class="btn btn-primary">确定</Button>
	</form>

@endsection