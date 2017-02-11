@extends('layouts.add')
@section('panel-heading-1')
	完成编号为<strong id="task-id">{{ $task_id }}</strong>的任务?
@endsection
@section('panel-body-1')
<form method="post" action="{{ url('task-complete') }}">
	{{ csrf_field() }}
	<div class="modal-header">
    	<h4 class="modal-title">请及时评价</h4>
 	</div>
 		<input type="hidden" name="id" value="{{ $task_id }}">
 	<br>
 	<br>
 	<div class="text-center" >
    <input type="submit" style="margin-right: 28px;" class="btn btn-primary" value="确定"></input>
    <button type="button" class="btn btn-primary" onclick="history.back();">返 回</button>
    </div>
</form>
@endsection
