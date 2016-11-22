@extends('layouts.add')

@section('title','测试-创建植保任务')
@section('bar','创建植保任务')
@section('panel-heading-1','从数据库读取 ......')
@section('panel-body-1')
<table class="table">
	<thead>
		<th>作业时间</th>
		<th>农户名</th>
		<th>作业亩数</th>
		<th>是否作业</th>
	</thead>
	<tbody>
		@foreach($task_info as $one)
			<tr>
				<td>
					{{ $one->task_work_time }}
				</td>
				<td>
					{{ $one->task_farmer_id}}
				</td>
				<td>
					{{ $one->task_area }}
				</td>
				<td>
					否
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection
@section('panel-heading-2','请在下方填写信息')
@section('panel-body-2')
	<div>
		<form action="{{ url('/task') }}" method="post">
			{{ csrf_field() }}
			<label class="control-label">本次作业参与人员：</label>
			<div class="form-group">				
			@foreach($users as $one)
				<input type="checkbox" class="form-control-item"  name="{{ 'task_team_id+'.$one->inner_user_id}}" value="{{ $one->inner_user_id }}">{{ $one->user_name }}
			@endforeach
			</div>
			<label class="control-label">本次作业农户：</label>			
			<select class="form-control" name="task_farmer_id">
				@foreach($farmers as $one)
					<option value="{{ $one->farmer_id }}">
						{{ $one->farmer_name }}
					</option>
				@endforeach
			</select>
			<label class="control-label">作业地点:</label>			
			<div class="form-group">
				<select class="form-control" name="place_province">
					@foreach($provinces as $one)
						<option value="{{ $one->province_id }}">
							{{ $one->province_name }}
						</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<select class="form-control" name="place_city">
					@foreach($cities as $one)
						<option value="{{ $one->city_id }}">
							{{ $one->city_name }}
						</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<select class="form-control" name="place_area">
					@foreach($areaes as $one)
						<option value="{{ $one->area_id }}">
							{{ $one->area_name }}
						</option>
					@endforeach
				</select>	
			</div>
			<div class="form-group">
				<select class="form-control" name="place_town">
					@foreach($towns as $one)
						<option value="{{ $one->town_id }}">
							{{ $one->town_name }}
						</option>
					@endforeach
				</select>	
			</div>
			<div class="form-group">
				<select class="form-control" name="place_country">
					@foreach($countries as $one)
						<option value="{{ $one->country_id }}">
							{{ $one->country_name }}
						</option>
					@endforeach
				</select>	
			</div>		
			<label for="task_work_time" class="control-label">作业日期:</label>
			<div class="form-group">				
			<input type="date" class="form-control" name="task_work_time">
			</div>
			<label class="control-label">飞机编号:</label>
			<div class="form-group">
			@foreach($uaves as $one)
				<input type="checkbox" class="form-control-item" name="{{ 'task_uav_id+'.$one->uav_id }}" value="{{ $one->uav_id }}">{{ $one->uav_name }}
			@endforeach
			</div>
			<label class="control-label">作业面积:</label>
			<div class="form-group">
			<input type="text" name="task_area" class="form-control" placeholder="作业面积">
			</div>
			<!-- <h4>任务时间：</h4>
			<input type="datetime" name="task_during" class="form-control">
			<h4>任务天气：</h4>
			<input type="text" name="level" class="form-control" placeholder="">
			<select>
				@foreach($weather as $one)
					<option>
						{{ $one->weather_name }}
					</option>
				@endforeach
			</select>			
			<input type="text" name="task_chamical" class="form-control" placeholder="喷洒农药">
			<input type="text" name="task_mark" class="form-control" placeholder="任务星级：">
			<input type="text" name="task_spray_mark" class="form-control" placeholder="喷雾星级：">
			<textarea rows="4" cols="80" name="task_common" class="form-control" placeholder="任务评价："></textarea> -->
			<button type="submit" class="btn btn-primary">提交</button>
		</form>
	</div>
	
@endsection