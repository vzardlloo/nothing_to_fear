@extends('layouts.add')

@section('title','测试-任务预览')
@section('bar','植保任务概览')
@section('panel-heading-1','当前作业任务')
@section('panel-body-1')
<table class="table">
	<thead>
		<th>作业日期</th>
		<th>农户名</th>
		<th>亩数</th>
		<th>详情</th>
		<th>推迟</th>
		<th>完成</th>
	</thead>
	<tbody>
		@foreach($task as $one)
			<tr>
				<td>
					{{ $one->task_work_date }}
				</td>
				<td>
					{{ $one->farmer_name }}
				</td>
				<td>
					{{ $one->farmer_area }}
				</td>
				<td id="sidebar">
					<a data-trigger="collapse" class="btn-collapse">详情</a>
					<div class="collapsible" style="display:none;">
			    		<span style="font-style: bold">手机号</span>:<br>{{ $one->farmer_phone }}<br><span style="font-style: bold">住址:</span><br>{{ $one->farmer_place }}
					</div>
				</td>
				<td>
					<a href="#myModal" class="btn-delay" data-toggle="modal" data-target=".task-delay" data-id="{{ $one->id }}" >推迟</a>
				</td>
				<td>
				<div class="switch">
					<input type="checkbox" name="complete" data-id="{{ $one->id }}" data-on-text="是" data-off-text="否" data-label-text="完成" dischecked />
				</div>
				</td>
			</tr>
					
		@endforeach
					
	</tbody>
</table>
@endsection
@section('panel-heading-2','所有作业任务')
@section('panel-body-2')
<table class="table">
	<thead>
		<th>作业时间</th>
		<th>农户名</th>
		<th>亩数</th>
		<th>状态</th>
		<th>评价</th>
	</thead>
	<tbody>
		@foreach($task as $one)
			<tr>
				<td>
					{{ $one->task_work_date }}
				</td>
				<td>
					{{ $one->farmer_name }}
				</td>
				<td>
					{{ $one->farmer_area }}
				</td>
				<td>
					<button class="btn btn-primary">
						@if($one->task_status==0)
							正常
						@elseif($one->task_status==1)
							完成
						@elseif($one->task_status==10)
							推迟
						@elseif($one->task_status==11)
							推迟
						@else
							取消
						@endif
					</button>
				</td>
				<td>
					<button type="submit" class="btn btn-primary" data-toggle="modal" data-target=".task-mark" onclick="mark({{ $one->id }})">请评价</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection

<div class="modal fade task-delay" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">
        		<span aria-hidden="true">&times;</span>
        		<span class="sr-only">Close</span>
        	</button>
        	<h4 class="modal-title" id="myModalLabel">推迟到哪一天？</h4>
     	</div>
     	<div class="modal-body">
     		<div class="input-group date form_date col-md-10" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
			    <input class="form-control" size="16" type="text" id="task_delay_date" value="" readonly="">
			    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
				<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
			</div>
     	</div>
     	<div class="modal-footer">
        	<button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
        	<button type="button" class="btn btn-primary" data-dismiss="modal" id="task-delay-ok">确定</button>
      	</div>
    </div>
  </div>
</div>

<div class="modal fade task-cancel" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">
        		<span aria-hidden="true">&times;</span>
        		<span class="sr-only">Close</span>
        	</button>
        	<h4 class="modal-title">取消此次任务？</h4>
     	</div>
     	<div class="modal-body">
     		<h5>取消原因</h5>
     		<ul>
     			<li>农户主动取消</li>
     			<li>采用人工喷洒</li>
     			<li>机器损坏</li>
     			<li>其他</li>
     		</ul>
     	</div>
     	<div class="modal-footer">
        	<button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
        	<button type="button" class="btn btn-primary" id="cancel_btn"></button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade task-mark" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">
        		<span aria-hidden="true">&times;</span>
        		<span class="sr-only">Close</span>
        	</button>
        	<h4 class="modal-title" id="myModalLabel">作业名</h4>
     	</div>
     	<form action="{{ url('add/mark') }}" method="get">
	     	<div class="modal-body">
	     		<label></label>
	     		<input type="hidden" id="mark_id" name="id" />
	     			<div class="form-group">
						<label class="control-label">作业天气</label>
						<select class="form-control" name="task_weather">
						</select>
					</div>
					<div class="form-group">
						<label class="control-label">作业时间段</label>
						<input class="form-control" name="task_during"/>
						<span class="help-block">填写格式 6:00-9:00</span>
					</div>
					<div class="form-group">
						<label class="control-label">使用农药</label>
						<input class="form-control" name="task_chamical"/>
						<span class="help-block">农药为每10亩的用量,如某某农药2袋20ml</span>
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
						<textarea class="form-control" rows="3" name="task_common"></textarea>
					</div>
	     	</div>
	     	<div class="modal-footer">
	        	<button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
	        	<button type="submit" class="btn btn-primary">确定</button>
	      	</div>
      	</form>
    </div>
  </div>
</div>

@section('css')
<link href="/css/scojs.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/css/jquery-ui-1.10.0.custom.css">
<link rel="stylesheet" type="text/css" href="/css/bootstrap-datetimepicker.css">
<link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/grumble.min.css">
@endsection

@section('js')
<script src="/js/jquery-2.1.1.js"></script>
<script src="/js/bootstrap-switch.js"></script>
<script src="/js/sco.collapse.js"></script>
<script src="/js/bootstrap-datetimepicker.min.js"></script>
<script src="/js/bootstrap-datetimepicker.zh-CN.js"></script>
<script src="/js/jquery-ui-1.10.0.custom.min.js"></script>
<script src="/js/jquery.grumble.min.js"></script>
<script src="/js/Bubble.js"></script>
<script type="text/javascript">
	$(function(){
		var id;
		$('.btn-delay').on('click',function(e){
			id = $(this).attr('data-id');
		});
		$('#task-delay-ok').on('click', function(e){
			var date = $("#task_delay_date").val();
			var delay_ajax = $.ajax({
				url: "{{ url('task-delay') }}?id="+id+"&task_delay_date="+date,
				method: "get", 
			}).done(function (data){
				alert('任务推迟成功！'+ JSON.stringify(data));
			}).fail(function (xhr, status){
				alert('失败, 请重新操作, '+xhr.status+',原因'+status);
			}).always(function (){

			});
		});
		$('#sidebar').grumble(
			{
				text: '点击查看详情',
				angle: 120,
				distance: -60,
				showAfter: 1000,
				hideAfter: 2000,
				hasHideButton: true,
				buttonHideText: 'Pop!'
			}
		);
		$('.form_date').datetimepicker({
			language:  'zh-CN',
	        weekStart: 1,
	        todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			minView: 2,
			forceParse: 0
		});	
    	$("[name=complete]").bootstrapSwitch();
    	$('input[name="complete"]').on('switchChange.bootstrapSwitch', function(event, state) {
		  	if(state == true){
		  		var id = $(this).attr('data-id');
		  		$.ajax({
		  			type: 'get',
		  			url: "{{ url('task-complete') }}?id="+id,
		  		}).done(function (data){
		  			alert('任务已完成!' + JSON.stringify(data));
		  		}).fail(function (xhr, status){
					alert('失败, 请重新操作, '+xhr.status+',原因'+status);
				});
		  	}
		});
    });
    // js
    function task_complete(id,btn){
		xmlHttps = new XMLHttpRequest();
		xmlHttps.onreadystatechange=function()
		{
		    if (xmlHttps.readyState==4 && xmlHttps.status==200)
		    {
		        var obj = xmlHttps.responseText;
		        if(obj==1){
		        	alert("任务已完成！");
		        	var tr = document.getElementById('task'+id);
		        	tr.style.display='none';
		        }else{
		        	alert("任务设置完成失败，请重设。");
		        }
		    }
		}		
		xmlHttps.open("GET","{{ url('task-complete') }}?task-id="+id,true);
		xmlHttps.send();
    };
    function mark(id){
		$("#mark_id").val(id);
    };
	function delay(){
		var date = $("#task_delay_date").val();
		return date;
	};
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
</script>
@endsection

