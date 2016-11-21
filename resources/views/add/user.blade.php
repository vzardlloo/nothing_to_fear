@extends('layouts.add')

@section('title','测试-添加用户')
@section('panel-heading-1','从数据库读取 ......')
@section('panel-body-1')
<div class="panel">
	@foreach($users as $one)
	<li>
		{{ $one->user_name }}
	</li>
	@endforeach
</div>
@endsection
@section('panel-heading-2','请在下方填写信息')
@section('panel-body-2')
	<form action="user" method="post">
		{{ csrf_field() }}
		<div class="form-group">
		<input class="form-control" type="text" name="user_name" placeholder="用户名">
		</div>
		<div class="form-group">
		<input class="form-control" type="password" name="password" placeholder="密码">
		</div>
		<div class="form-group">
		<input class="form-control" type="text" name="phone_num" placeholder="手机号">
		</div>
		<div class="form-group">
		<select class="form-control" name="role">
			<option value="1" selected="selected">观察员</option>
			<option value="2">飞控手</option>
			<option value="3">其他</option>
		</select>
		</div>
		<Button type="submit" class="btn btn-primary">确定</Button>
	</form>

@endsection