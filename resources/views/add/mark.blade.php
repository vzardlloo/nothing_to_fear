@extends('layouts.add')

@section('title','测试-植保评价')
@section('bar','植保评价')
@section('panel-heading-1','从数据库读取 ......')
@section('panel-body-1')
<table class="table">
	<thead>
		<th>作业编号</th>
		<th>天气</th>
		<th>星级</th>
		<th>评价</th>
	</thead>
	<tbody>
		@foreach($mark_info as $one)
		<tr>
			<td>
				{{ $one->task_id }}				
			</td>
			<td>
				{{ $one->task_weather }}
			</td>
			<td>
				{{ $one->task_spray_star}}
			</td>
			<td>
				{{ $one->task_common }}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
@section('panel-heading-2','请在下方填写信息')
@section('panel-body-2')
<form method="post" action="{{ url('add/mark') }}">
	{{ csrf_field() }}
	<div class="form-group">
		<label class="control-label">作业编号</label>
		<input class="form-control" placeholder="{{ $task_info[0]->task_id }}" disabled/>
	</div>
	<div class="form-group">
		<label class="control-label">作业地区</label>
		<input class="form-control" placeholder="{{ $task_info[0]->task_place_id }}" disabled/>
	</div>
	<div class="form-group">
		<label class="control-label">作业亩数</label>
		<input class="form-control" placeholder="{{ $task_info[0]->task_area }}" disabled/>
	</div>
	<div class="form-group">
		<label class="control-label">作业人员</label>
		<input class="form-control" placeholder="{{ $task_info[0]->task_team_id }}" disabled/>
	</div>
	<div class="form-group">
		<label class="control-label">作业天气</label>
		<input class="form-control"/>
	</div>
	<div class="form-group">
		<label class="control-label">作业时间段</label>
		<input class="form-control"/>
	</div>
	<div class="form-group">
		<label class="control-label">使用农药</label>
		<input class="form-control"/>
	</div>
	<div class="form-group">
		<label class="control-label">作业星级</label>
		<input class="form-control"/>
	</div>
	<div class="form-group">
		<label class="control-label">作业评语</label>
		<input class="form-control"/>
	</div>
	
	<button type="submit" class="btn btn-primary">提交</button>
</form>
@endsection