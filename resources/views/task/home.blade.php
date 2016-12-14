@extends('layouts.add')

@section('title','测试-任务预览')
@section('bar','植保任务概览')
@section('panel-heading-1','当前作业任务')
@section('panel-body-1')
<table class="table">
	<thead>
		<th>作业时间</th>
		<th>农户名</th>
		<th>亩数</th>
		<th>详情</th>
		<th>推迟</th>
		<th>完成</th>
	</thead>
	<tbody id="tbodies">
		@foreach($task_info_0 as $one)
			<tr id="task{{ $one->task_id }}">
				<td>
					{{ $one->task_work_time }}
				</td>
				<td>
					{{ $one->farmer_name }}
				</td>
				<td>
					{{ $one->task_area }}
				</td>
				<td>
					<button type="submit" class="btn btn-primary" data-toggle="modal" data-target=".task-item" onclick="item({{ $one->task_id }})">详情</button>
				</td>
				<td>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".task-delay" onclick="delay({{ $one->task_id }})">推迟</button>
				</td>
				<td>
		<button class="btn btn-primary" type="button" onclick="task_complete({{ $one->task_id }},this)">完成</button>
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
		@foreach($task_info as $one)
			<tr>
				<td>
					{{ $one->task_work_time }}
				</td>
				<td>
					{{ $one->farmer_name }}
				</td>
				<td>
					{{ $one->task_area }}
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
					<button type="submit" class="btn btn-primary" data-toggle="modal" data-target=".task-mark" onclick="mark({{ $one->task_id }})">请评价</button>
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
     		<label>格式2016-12-12</label>
     		<input type="hidden" id="delay_task_id"/>
     		<input type="text" class="form-control" name="task_delay_time" id="task_delay_time"/>
     	</div>
     	<div class="modal-footer">
        	<button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
        	<button type="button" class="btn btn-primary" onclick="a()">确定</button>
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

<div class="modal fade task-item" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">
        		<span aria-hidden="true">&times;</span>
        		<span class="sr-only">Close</span>
        	</button>
        	<h4 class="modal-title" id="myModalLabel">任务详情</h4>
     	</div>
     	<div class="modal-body">
     		<div class="form-group">
				<label class="control-label">作业时间</label>
				<div class="form-control" id="time"></div>
			</div>

			<div class="form-group">
				<label class="control-label">作业亩数</label>
				<div class="form-control" id="area"></div>
			</div>

			<div class="form-group">
				<label class="control-label">农户名</label>
				<div class="form-control" id="farm"></div>
			</div>

			<div class="form-group">
				<label class="control-label">手机号</label>
				<div class="form-control" id="phone"></div>
			</div>

			<div class="form-group">
				<label class="control-label">作业地点</label>
				<div class="form-control" id="palce"></div>
			</div>

			<div class="form-group">
				<label class="control-label">拥有总亩数</label>
				<div class="form-control" id="all-area"></div>
			</div>

			<div class="form-group">
				<label class="control-label">已作业次数</label>
				<div class="form-control" id="work-count"></div>
			</div>

			<div class="form-group">
				<label class="control-label">农田喷洒难度综合评价</label>
				<div class="form-control" id="common"></div>
			</div>

			<div class="form-group">
				<label class="control-label">地图导航（GPS点）</label>
				<div class="form-control" id="map"></div>
			</div>

     	</div>
     	<div class="modal-footer">
        	<button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
        	<button type="button" class="btn btn-primary">确定</button>
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
	     		<input type="hidden" id="mark_id" name="task_id" />
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

@section('style')
<link href="/css/mobiscroll_date.css" rel="stylesheet">
<link href="/css/mobiscroll.css" rel="stylesheet" type="text/css">
@endsection

@section('js-file')
<script src="js/jquery-2.1.1.js"></script>
<script src="/js/mobiscroll_date.js" charset="gb2312"></script>
<script src="/js/mobiscroll.js"></script>
@endsection

@section('js')
    $(function(){
        //日期控件
        var currYear = (new Date()).getFullYear();
        var opt={};
        opt.date = {preset : 'date'};
        opt.datetime = {preset : 'datetime'};
        opt.time = {preset : 'time'};
        opt.default = {
            theme: 'android-ics light', //皮肤样式
            display: 'bubble', //显示方式
            mode: 'scroller', //日期选择模式
            dateFormat: 'yyyy-mm-dd',
            lang: 'zh',
            showNow: true,
            nowText: "今天",
            startYear: currYear, //开始年份
            endYear: currYear + 3 //结束年份
        };
        $("#delay_date").mobiscroll($.extend(opt['date'], opt['default']));
    });
    function task_complete(task_id,btn){
		xmlHttps = new XMLHttpRequest();
		xmlHttps.onreadystatechange=function()
		{
		    if (xmlHttps.readyState==4 && xmlHttps.status==200)
		    {
		        var obj = xmlHttps.responseText;
		        if(obj==1){
		        	alert("任务已完成！");
		        	var tr = document.getElementById('task'+task_id);
		        	tr.style.display='none';
		        }else{
		        	alert("任务设置完成失败，请重设。");
		        }
		    }
		}		
		xmlHttps.open("GET","{{ url('task-complete') }}?task-id="+task_id,true);
		xmlHttps.send();
    };
    function mark(task_id){
		$("#mark_id").val(task_id);
    };
	function delay(task_id){
		$("#delay_task_id").val(task_id);
	};
	function a(){
		var task_delay_time = $("#task_delay_time").val();
		var delay_task_id = $("#delay_task_id").val();
		xmlHttps = new XMLHttpRequest();
		xmlHttps.onreadystatechange=function()
		{
		    if (xmlHttps.readyState==4 && xmlHttps.status==200)
		    {
		        var obj = xmlHttps.responseText;
		        if(obj==1){
		        	alert("任务推迟成功！");

		        }else{
		        	alert("任务推迟失败，请重新推送。");
		        }
		    }
		}		
		xmlHttps.open("GET","{{ url('task-delay') }}?task_id="+delay_task_id+"&task_delay_time="+task_delay_time,true);
		xmlHttps.send();
	};
	var cancel = function cancel(task_id){
		$("#cancel_btn").text("测试中，取消的任务标号是"+task_id);
	};

	var item = function item(task_id){
		xmlHttp = new XMLHttpRequest();
		xmlHttp.onreadystatechange=function()
		{
		    if (xmlHttp.readyState==4 && xmlHttp.status==200)
		    {
		        var obj = xmlHttp.responseText;
		        var task = eval ("(" + obj + ")");
		        $("#time").text(task["task_work_time"]);
        		$("#area").text(task["task_area"]);
				$("#farm").text(task["farmer_name"]);
				$("#phone").text(task["phone_num"]);
				$("#all-area").text(task["farmer_address"]);
				$("#work-count").text(task["farmer_address"]);
				$("#palce").text(task['farmer_address']);
				$("#common").text(task['farmer_address']);
				$("#map").text(task['farmer_address']);
		    }
		}		
		xmlHttp.open("GET","{{ url('task-item') }}?task_id="+task_id,true);
		xmlHttp.send();
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
@endsection


