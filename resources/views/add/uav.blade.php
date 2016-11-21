@extends('layout')
@section('title','uav_info')
@section('content')
<ul class="list-group">
	@foreach($uavs as $one)
		<li class="list-group-item">{{ $one->uav_name }}</li>
	@endforeach
</ul>

<form action="uav" method="post">
	{{ csrf_field() }}
	<input type="text" name="uav_name" placeholder="uav_name">
	<input type="text" name="uav_type" placeholder="uav_type">
	<input type="date" name="uav_buy_time">
	<button type="submit" class="btn btn-primary">提交</button>
</form>
@endsection