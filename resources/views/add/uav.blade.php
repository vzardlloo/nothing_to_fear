@extends('layouts.add')

@section('title','测试-添加无人机')
@section('bar','添加无人机')
@section('panel-heading-1','从数据库读取 ......')
@section('panel-body-1')
<table class="table">
	<thead>
		<th>无人机类型</th>
		<th>无人机编号</th>
		<th>入编时间</th>
	</thead>
	<tbody>
	@foreach($uavs as $one)
		<tr>
			<td>
				{{ $one->uav_type }}
			</td>
			<td>
				{{ $one->uav_name }}
			</td>
			<td>
				{{ $one->uav_buy_time }}
			</td>
				
		</tr>
	@endforeach
	</tbody>
</table>

@endsection
@section('panel-heading-2','请在下方填写信息')
@section('panel-body-2')
<form action="uav" method="post">
	{{ csrf_field() }}
	<div class="form-group">
		<input type="text" name="uav_name" class="form-control" placeholder="无人机代号">
	</div>
	<div class="form-group">
		<input type="text" name="uav_type" class="form-control" placeholder="无人机型号">
	</div>
	<div class="form-group">
		<input type="date" name="uav_buy_time" class="form-control" placeholder="购买时间">
	</div>
	<button type="submit" class="btn btn-primary">添加</button>
</form>
@endsection