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
				{{ $one->task_mark}}
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
	<input type="hidden" name="task_id" value="{{ $task_info[0]->task_id }}" />
	<div class="form-group">
		<label class="control-label">作业编号</label>
		<input class="form-control" placeholder="{{ $task_info[0]->task_name }}" disabled/>
	</div>
	<div class="form-group">
		<label class="control-label">作业地区</label>
		<input class="form-control" placeholder="{{ $provinces[0]->province_name.$cities[0]->city_name.$areaes[0]->area_name.$towns[0]->town_name.$countries[0]->country_name.'-' }}" disabled/>
	</div>
	<div class="form-group">
		<label class="control-label">作业亩数</label>
		<div class="input-group">
		<input class="form-control" placeholder="{{ $task_info[0]->task_area }}" disabled/>
		<span class="input-group-addon">亩</span>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label">作业人员</label>
		<br/>
		@foreach($user_info as $one)
		<input type="checkbox" class="form-control-item" checked="checked" disabled>{{ $one->user_name }}
		<span style="padding-left: 8px;"></span>
		@endforeach
	</div>
	<div class="form-group">
		<label class="control-label">作业天气</label>
		<select class="form-control" name="task_weather">
		@foreach($weather_info as $one)
			<option value="{{ $one->weather_list_id }}">{{ $one->weather_name }}</option>
		@endforeach
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
	
	<button type="submit" class="btn btn-primary">提交</button>
</form>
@endsection
@section('style')

@section('js')
<script type="text/javascript">
$('#star-1').click(function(){
    $(this).removeClass().addClass('glyphicon glyphicon-star');
    $('#star').val(1);
});
$('#star-2').click(function(){
	$('#star-1').removeClass().addClass('glyphicon glyphicon-star');
    $(this).removeClass().addClass('glyphicon glyphicon-star');
    $('#star').val(2);
});
$('#star-3').click(function(){
	$('#star-1').removeClass().addClass('glyphicon glyphicon-star');
	$('#star-2').removeClass().addClass('glyphicon glyphicon-star');
    $(this).removeClass().addClass('glyphicon glyphicon-star');
    $('#star').val(3);
});
$('#star-4').click(function(){
	$('#star-1').removeClass().addClass('glyphicon glyphicon-star');
	$('#star-3').removeClass().addClass('glyphicon glyphicon-star');
	$('#star-2').removeClass().addClass('glyphicon glyphicon-star');
    $(this).removeClass().addClass('glyphicon glyphicon-star');
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