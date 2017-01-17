@extends('layouts.add')

@section('title','测试-修改信息')
@section('bar','修改信息')
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
<form method="post" action="{{ url('add/modify') }}">
	{{ csrf_field() }}
	<input type="hidden" name="task_id" value="{{ $task_info[0]->task_id }}" />
	<div class="form-group">
		<label class="control-label">作业编号</label>
		<input class="form-control" placeholder="{{ $task_info[0]->task_name }}" />
	</div>
	<div class="form-group">
		<label class="control-label">作业地区</label>
		<input class="form-control" placeholder="{{ $provinces[0]->province_name.$cities[0]->city_name.$areaes[0]->area_name.$towns[0]->town_name.$countries[0]->country_name.'-' }}" />
	</div>
	<div class="form-group">
		<label class="control-label">作业亩数</label>
		<div class="input-group">
		<input class="form-control" placeholder="{{ $task_info[0]->task_area }}" />
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
	
	
	
	<button type="submit" class="btn btn-primary">确认修改</button>
</form>
@endsection
@section('style')

