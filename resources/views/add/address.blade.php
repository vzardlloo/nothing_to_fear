@extends('layouts.add')

@section('title','测试-添加地址')
@section('bar','添加地址')
@section('panel-heading-1','从数据库读取 ......')
@section('panel-body-1')
<div class="form-group">
	<select class="form-control" name="province">
		@foreach($provinces as $one)
			<option>
				{{ $one->province_name }}
			</option>
		@endforeach
	</select>
</div>

<div class="form-group">
	<select class="form-control" name="city">
		@foreach($cities as $one)
			<option>
				{!! $one->city_name !!}
			</option>
		@endforeach
	</select>
</div>

<div class="form-group">
	<select class="form-control" name="area">
		@foreach($areaes as $one)
			<option>
				{!! $one->area_name !!}
			</option>
		@endforeach
	</select>	

</div>
<div class="form-group">
	<select class="form-control" name="town">
		@foreach($towns as $one)
			<option>
				{!! $one->town_name !!}
			</option>
		@endforeach
	</select>
</div>
	
<div class="form-group">
	<select class="form-control" name="country">
		@foreach($countries as $one)
			<option>
				{!! $one->country_name !!}
			</option>
		@endforeach
	</select>
</div>

@endsection
@section('panel-heading-2','请在下方填写信息')
@section('panel-body-2')
	<form action="{{ url('add/address') }}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<input class="form-control" type="text" name="province" placeholder="省">
		</div>
		<div class="form-group">
			<input class="form-control" type="text" name="city" placeholder="市">
		</div>
		<div class="form-group">
			<input class="form-control" type="text" name="area" placeholder="区/县">
		</div>
		<div class="form-group">
			<input class="form-control" type="text" name="town" placeholder="镇/乡">
		</div>
		<div class="form-group">
			<input class="form-control" type="text" name="country" placeholder="村/队">
		</div>
		<button type="submit" class="btn btn-primary">添加</button>
	</form>
@endsection
