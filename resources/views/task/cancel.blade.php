@extends('layouts.add')
@section('panel-heading-1')
	取消编号为<strong>{{ $task_id }}</strong>的任务
@endsection
@section('panel-body-1')
<form method="post" action="{{ url('task-delay') }}">
	{{ csrf_field() }}
	<div class="modal-header">
    	<h4 class="modal-title" id="myModalLabel">取消原因</h4>
 	</div>
 	<div class="modal-body">
		<textarea class="form-control" placeholder="请输入原因" rows="3"></textarea>
 	</div>
 	<div class="modal-footer">
    	<input type="button" class="btn btn-primary" value="返回"></input>
    	<input type="submit" class="btn btn-primary" value="确定"></input>
  	</div>
</form>
@endsection

