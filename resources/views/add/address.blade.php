@extends('layout')
@section('title','address_index')
@section('content')	
<h3>address</h3>
	<select class="form-horizontal" name="province">
		@foreach($provinces as $one)
			<option>
				{{ $one->province_name }}
			</option>
		@endforeach
	</select>
	<select class="form-horizontal" name="city">
		@foreach($cities as $one)
			<option>
				{!! $one->city_name !!}
			</option>
		@endforeach
	</select>
	<select class="form-horizontal" name="area">
		@foreach($areaes as $one)
			<option>
				{!! $one->area_name !!}
			</option>
		@endforeach
	</select>	
	<select class="form-horizontal" name="town">
		@foreach($towns as $one)
			<option>
				{!! $one->town_name !!}
			</option>
		@endforeach
	</select>	
	<select class="form-horizontal" name="country">
		@foreach($countries as $one)
			<option>
				{!! $one->country_name !!}
			</option>
		@endforeach
	</select>

<h3>添加地址</h3>
	<form action="/add/address" method="post">
		{{ csrf_field() }}
		<input type="text" name="province" placeholder="省">
		<input type="text" name="city" placeholder="市">
		<input type="text" name="area" placeholder="区/县">
		<input type="text" name="town" placeholder="镇/乡">
		<input type="text" name="country" placeholder="村/队">
		<button type="submit" class="btn btn-primary">添加</button>
	</form>
@endsection