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
		<th>取消</th>
		<th>完成</th>
	</thead>
	<tbody>
		@foreach($task_info_0 as $one)
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
					<form action="{{ url('task-item') }}" method="get">
						<input type="hidden" name="task_id" value="{{ $one->task_id }}">
						<button type="submit" class="btn btn-default">
							详情
						</button>
					</form>
				</td>
				<td>
					<!-- <button type="button" onclick="delay({{ $one->task_id }})" class="btn btn-default">推迟</button> -->
					<button type="button" data-toggle="modal" data-target=".bs-example-modal-sm" class="btn btn-default">推迟</button>
				</td>
				<td>
					<!-- <button type="button" onclick="cancel({{ $one->task_id }})" class="btn btn-default">取消</button> -->
					<button type="button" onclick="cancel({{ $one->task_id }})" data-toggle="modal" data-target=".task-cancel" class="btn btn-default">取消</button>
				</td>
				<td>
					<button class="btn btn-default">完成</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection
@section('panel-heading-2','已完成作业任务')
@section('panel-body-2')
<table class="table">
	<thead>
		<th>作业时间</th>
		<th>农户名</th>
		<th>亩数</th>
		<th>签字</th>
		<th>状态</th>
		<th>评价</th>
	</thead>
	<tbody>
		@foreach($task_info_3 as $one)
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
					<button class="btn btn-default">签字</button>
				</td>
				<td>
					<button class="btn btn-default">OK</button>
				</td>
				<td>
					<form action="{{ url('add/mark') }}" method="get">
						<input type="hidden" name="task_id" value="{{ $one->task_id }}" />
						<button type="submit" class="btn btn-default">请评价</button>	
					</form>	
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
     		<input type="text" class="form-control" id="delay_date" name="task_work_time"/>
     	</div>
     	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        	<button type="button" class="btn btn-primary">确定</button>
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
        	<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        	<button type="button" class="btn btn-primary" id="cancel_btn"></button>
      </div>
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
            display: 'modal', //显示方式
            mode: 'scroller', //日期选择模式
            dateFormat: 'yyyy-mm-dd',
            lang: 'zh',
            showNow: true,
            nowText: "今天",
            startYear: currYear, //开始年份
            endYear: currYear + 10 //结束年份
        };

        $("#delay_date").mobiscroll($.extend(opt['date'], opt['default']));
    });

	//var delay = function delay(task_id){}; 
	var cancel = function cancel(task_id){
		$("#cancel_btn").text("测试中，取消的任务标号是"+task_id);
	};
@endsection


