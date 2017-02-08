@extends('layouts.add')
@section('panel-heading-1')
	评价编号为<strong id="task-id">{{ $task_id }}</strong>的任务
@endsection
@section('panel-body-1')
<form method="post" action="{{ url('task-mark') }}">
	{{ csrf_field() }}
	<div class="modal-header">
    	<h4 class="modal-title" id="myModalLabel">请如实评价</h4>
 	</div>
 	<div class="modal-body">
 	<input type="hidden" name="id" value="{{ $task_id }}"/>
	<div class="form-group label-floating">
		<label class="control-label">作业天气</label>
		<input type="email" class="form-control" name="task_weather">
	</div>
	<div class="form-group label-floating">
		<label class="control-label">作业时间段</label>
		<input type="email" class="form-control" name="task_during">
	</div>
	<div class="form-group label-floating">
		<label class="control-label">使用农药</label>
		<input type="email" class="form-control" name="task_chamical">
	</div>
	<div class="form-group">
		<label class="control-label">作业星级</label>
		<br/>
		<span class="glyphicon glyphicon-star-empty" id="star-1"></span>
		<span class="glyphicon glyphicon-star-empty" id="star-2"></span>
		<span class="glyphicon glyphicon-star-empty" id="star-3"></span>
		<span class="glyphicon glyphicon-star-empty" id="star-4"></span>
		<span class="glyphicon glyphicon-star-empty" id="star-5"></span>
		<input type="hidden" id="star" name="task_mark"/>
	</div>		
	<div class="form-group">
		<label class="control-label">作业评语</label>
		<textarea class="form-control" placeholder="作业评语" rows="3" name="task_common"></textarea>
	</div>
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
		$('#star-1').click(function(){
	    $(this).removeClass().addClass('glyphicon glyphicon-star');
	    $('#star-2').removeClass().addClass('glyphicon glyphicon-star-empty');
	    $('#star-3').removeClass().addClass('glyphicon glyphicon-star-empty');
	    $('#star-4').removeClass().addClass('glyphicon glyphicon-star-empty');
	    $('#star-5').removeClass().addClass('glyphicon glyphicon-star-empty');
	    $('#star').val(1);
	});
	$('#star-2').click(function(){
		$('#star-1').removeClass().addClass('glyphicon glyphicon-star');
	    $(this).removeClass().addClass('glyphicon glyphicon-star');
	    $('#star-3').removeClass().addClass('glyphicon glyphicon-star-empty');
	    $('#star-4').removeClass().addClass('glyphicon glyphicon-star-empty');
	    $('#star-5').removeClass().addClass('glyphicon glyphicon-star-empty');
	    $('#star').val(2);
	});
	$('#star-3').click(function(){
		$('#star-1').removeClass().addClass('glyphicon glyphicon-star');
		$('#star-2').removeClass().addClass('glyphicon glyphicon-star');
	    $(this).removeClass().addClass('glyphicon glyphicon-star');
	    $('#star-4').removeClass().addClass('glyphicon glyphicon-star-empty');
	    $('#star-5').removeClass().addClass('glyphicon glyphicon-star-empty');
	    $('#star').val(3);
	});
	$('#star-4').click(function(){
		$('#star-1').removeClass().addClass('glyphicon glyphicon-star');
		$('#star-3').removeClass().addClass('glyphicon glyphicon-star');
		$('#star-2').removeClass().addClass('glyphicon glyphicon-star');
	    $(this).removeClass().addClass('glyphicon glyphicon-star');
	    $('#star-5').removeClass().addClass('glyphicon glyphicon-star-empty');
	    $('#star').val(4);

	});
	$('#star-5').click(function(){
		$('#star-1').removeClass().addClass('glyphicon glyphicon-star');
		$('#star-3').removeClass().addClass('glyphicon glyphicon-star');
		$('#star-4').removeClass().addClass('glyphicon glyphicon-star');
		$('#star-2').removeClass().addClass('glyphicon glyphicon-star');
	    $(this).removeClass().addClass('glyphicon glyphicon-star');
	    $('#star').val(5);
	});
	});
</script>
@endsection

