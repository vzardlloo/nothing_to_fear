@extends('layouts.add')

@section('title','测试-添加无人机')
@section('panel-heading-1','从数据库读取 ......')
@section('panel-body-1')
<ul class="list-group">
	@foreach($uavs as $one)
		<li class="list-group-item">{{ $one->uav_name }}</li>
	@endforeach
</ul>
@endsection
@section('panel-heading-2','请在下方填写信息')
@section('panel-body-2')
<form action="uav" method="post">
	{{ csrf_field() }}
	<input type="text" name="uav_name" placeholder="无人机代号">
	<input type="text" name="uav_type" placeholder="无人机型号">
	<input type="date" name="uav_buy_time" placeholder="购买时间">
	<button type="submit" class="btn btn-primary">添加</button>
</form>
@endsection