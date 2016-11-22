@extends('layouts.add')

@section('title','测试-添加农户')
@section('bar','添加农户')
@section('panel-heading-1','从数据库读取 ......')
@section('panel-body-1')
	<ul class="list-group">
	    @foreach($farmers as $one)
	    	<li class="list-group-item">
	    			<tr>
	    				<td>{{ $one->farmer_name }}</td>
	    				<td>{{ $one->phone_num}}</td>
	    			</tr>
	    	</li>
	    @endforeach
	</ul>
	{{ $farmers->links() }}
@endsection
@section('panel-heading-2','请在下方填写信息')
@section('panel-body-2')
	<form action="{{ url('add/farmer') }}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<input class="form-control" type="text" name="farmer_name" placeholder="农户姓名">
		</div>
		<div class="form-group">
			<input class="form-control" type="text" name="phone_num" placeholder="农户手机号">
		</div>
		<label class="control-label">住址</label>
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
			<div class="pull-right">
				<a href="{{ url('add/address') }}">没有想要的地址?</a>
			</div>
			
			<p>|</p>
			<label class="control-label">农户等级:</label>
			<div class="form-group">
				<select name="farmer_level" class="form-control">
					<option value="1">1级--100亩以下</option>
					<option value="2">2级--100亩到200亩</option>
					<option value="3">3级--200亩到350亩</option>
					<option value="4">4级--350亩到500亩</option>
					<option value="5">5级--大于500亩</option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary"> 添加农户信息	</button>
	</form>
@endsection