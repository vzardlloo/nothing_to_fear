@extends('layout')
@section('title','task_index')
@section('content')
	<div style="margin-bottom:20px;">
		<select>
			<option>task 1</option>
			<option>task 2</option>
		</select>
	</div>
	<div>
		<form action="{{ url('/task') }}" method="post">
			{!! csrf_field() !!}
			<h3>队伍编号：</h3>
			@foreach($users as $one)
				<input type="checkbox" class="form-control" id="task_team_id" value="{{ $one->inner_user_id }}">{{ $one->user_name }}
			@endforeach
			<h3>农户编号：</h3>
			<select class="form-control">
				@foreach($farmers as $one)
					<option>
						{{ $one->farmer_name }}
					</option>
				@endforeach
			</select>

			<div class="form-horizontal">
				<h3>作业地点:</h3>
				<select class="form-horizontal">
					@foreach($provinces as $one)
						<option>
							{{ $one->province_name }}
						</option>
					@endforeach
				</select>
				<select class="form-horizontal">
					@foreach($cities as $one)
						<option>
							{!! $one->city_name !!}
						</option>
					@endforeach
				</select>
				<select class="form-horizontal">
					@foreach($areaes as $one)
						<option>
							{!! $one->area_name !!}
						</option>
					@endforeach
				</select>	
				<select class="form-horizontal">
					@foreach($towns as $one)
						<option>
							{!! $one->town_name !!}
						</option>
					@endforeach
				</select>	
				<select class="form-horizontal">
					@foreach($countries as $one)
						<option>
							{!! $one->country_name !!}
						</option>
					@endforeach
				</select>	
			</div>			
			<h3>飞机编号：</h3>
			@foreach($uaves as $one)
			<label class="checkbox-inline">
				<input type="checkbox" id="task_uav_id" value="{{ $one->uav_id }}">{{ $one->uav_name }}
			</label>
			@endforeach
			<input type="text" name="task_area" class="form-control" placeholder="作业面积">
			<h3>任务时间：</h3>
			<input type="datetime" name="task_during" class="form-control">
			<h3>任务天气：</h3>
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
			<textarea rows="4" cols="80" name="task_common" class="form-control" placeholder="任务评价："></textarea>
			<button type="submit" class="btn btn-primary">提交</button>
		</form>
	</div>
	
@endsection