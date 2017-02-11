@extends('layouts.add')

@section('title','测试-任务预览')
@section('bar','植保任务概览')
@section('panel-heading-1','当前作业任务')
@section('panel-body-1')
<table class="table">
	<thead>
		<th class="text-center">编号</th>
		<th class="text-center">作业日期</th>
		<th class="text-center">农户名</th>
		<th class="text-center">作业亩数</th>
		<th class="text-center">完成</th>
<!-- 		<th class="text-center">取消</th> -->
	</thead>
	<tbody>
		@foreach($task as $one)
			@if($one->task_is_work == 0)
			<tr>
				<td class="text-center">
					{{ $one->id }}
				</td>
				<td class="text-center">
					<a href="{{ url('task-delay') }}/?id={{ $one->id }}">{{ $one->task_work_date }}</a>
				</td>
				<td class="text-center">
					<a href="{{ url('farmer-info') }}/?id={{ $one->task_farmer_id }}">{{ $one->farmer_name }}</a>
				</td>
				<td class="text-center">
					<a href="{{ url('task-map') }}/?id={{ $one->id }}">{{ $one->task_area }}</a>
				</td>
				<td class="text-center">
					<a href="{{ url('task-complete') }}/?id={{ $one->id }}" class="btn btn-primary btn-round btn-xs">完成</a>
				</td>
<!-- 				<td class="text-center">
					<a href="{{ url('task-cancel') }}/?id={{ $one->id }}" class="btn btn-primary btn-xs">取消</a>
				</td> -->
			</tr>
			@endif
		@endforeach
	</tbody>
</table>

@endsection
@section('panel-heading-2','所有作业任务')
@section('panel-body-2')
<table class="table">
	<thead>
		<th>编号</th>
		<th>作业日期</th>
		<th>农户名</th>
		<th>完成亩数</th>
		<th>评价</th>
	</thead>
	<tbody>
		@foreach($task as $one)
			<tr>
				<td>
					{{ $one->id }}
				</td>
				<td>
					<a href="{{ url('task-delay') }}/?id={{ $one->id }}">{{ $one->task_work_date }}</a>
				</td>
				<td>
					<a href="{{ url('farmer-info') }}/?id={{ $one->task_farmer_id }}">{{ $one->farmer_name }}</a>
				</td>
				<td>
					<a href="{{ url('task-map') }}/?id={{ $one->id }}">{{ $one->task_area }}</a>
				</td>
				<td>
					<a href="{{ url('mark') }}/?id={{ $one->id }}" class="btn btn-primary btn-round btn-xs">评价</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection

@section('js')
<!-- <script src="/js/jquery-2.1.1.js"></script> -->
@endsection

