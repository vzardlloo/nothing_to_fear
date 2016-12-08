@extends('layouts.add')
@section('title','作业任务详情')
@section('bar','作业任务详细信息')

@section('panel-heading-1','作业任务详细信息')
@section('panel-body-1')

<div class="form-group">
	<label class="control-label">作业时间</label>
	<div class="form-control">{{ $task->task_work_time }}</div>
</div>

<div class="form-group">
	<label class="control-label">作业亩数</label>
	<div class="form-control">{{ $task->task_area }}</div>
</div>

<div class="form-group">
	<label class="control-label">农户名</label>
	<div class="form-control">{{ $task->farmer_name }}</div>
</div>

<div class="form-group">
	<label class="control-label">手机号</label>
	<div class="form-control">{{ $task->phone_num }}</div>
</div>

<div class="form-group">
	<label class="control-label">作业地点</label>
	<div class="form-control">{{ $task->farmer_address }}</div>
</div>

<div class="form-group">
	<label class="control-label">拥有总亩数</label>
	<div class="form-control">{{ $task->task_work_time }}</div>
</div>

<div class="form-group">
	<label class="control-label">已作业次数</label>
	<div class="form-control">{{ $task->task_work_time }}</div>
</div>

<div class="form-group">
	<label class="control-label">农田喷洒难度综合评价</label>
	<div class="form-control">{{ $task->task_work_time }}</div>
</div>

<div class="form-group">
	<label class="control-label">地图导航（GPS点）</label>
	<div class="form-control">{{ $task->task_work_time }}</div>
</div>
@endsection