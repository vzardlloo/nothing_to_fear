@extends('layout')
@section('title','task_index')
@section('content')
	<div style="margin-bottom:20px;">
		<select>
			<option>task 1</option>
			<option>task 2</option>
		</select>
	</div>
	<div style="margin-bottom:20px;">
		<select>
			@foreach($farmers as $one)
				<option>
					{!! $one->farmer_name !!}
				</option>
			@endforeach
		</select>
	</div>

	<div style="margin-bottom:20px;">
		<select>
			@foreach($provinces as $one)
				<option>
					{!! $one->province_name !!}
				</option>
			@endforeach
		</select>
	</div>

	<div style="margin-bottom:20px;">
		<select>
			@foreach($cities as $one)
				<option>
					{!! $one->city_name !!}
				</option>
			@endforeach
		</select>
	</div>

	<div style="margin-bottom:20px;">
		<select>
			@foreach($areaes as $one)
				<option>
					{!! $one->area_name !!}
				</option>
			@endforeach
		</select>
	</div>

	<div style="margin-bottom:20px;">
		<select>
			@foreach($towns as $one)
				<option>
					{!! $one->town_name !!}
				</option>
			@endforeach
		</select>
	</div>

	<div style="margin-bottom:20px;">
		<select>
			@foreach($countries as $one)
				<option>
					{!! $one->country_name !!}
				</option>
			@endforeach
		</select>
	</div>
	<div>
		<form action="{{ url('/task') }}" method="post">
			{!! csrf_field() !!}
		</form>
	</div>
	
@endsection