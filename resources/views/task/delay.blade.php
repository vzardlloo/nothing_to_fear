@extends('layouts.add')
@section('panel-heading-1')
	推迟编号为<strong id="task-id">{{ $task_id }}</strong>的任务
@endsection
@section('panel-body-1')
<form method="post" action="{{ url('task-delay') }}">
	{{ csrf_field() }}
	<div class="modal-header">
    	<h4 class="modal-title" id="myModalLabel">推迟到哪一天？</h4>
 	</div>
 	<div class="modal-body">
		<input class="datepicker form-control" type="text" value="03/13/2017"/>
 	</div>
 	<div class="modal-footer">
    	<input type="button" class="btn btn-primary" value="返回"></input>
    	<input type="submit" class="btn btn-primary" value="确定"></input>
  	</div>
</form>
@endsection

@section('js')
<script type="text/javascript">
	$(function() {
		$('.datepicker').datepicker({
			weekStart:1
		});
	});
</script>
@endsection

