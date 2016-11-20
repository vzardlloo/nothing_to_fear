@extends('layout')
@section('title','farmer_index')
@section('content')
	
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

	<form action="/add/farmer" method="post">
		{{ csrf_field() }}
		<input type="text" name="farmer_name" placeholder="farmer_name">
		<input type="text" name="phone_num" placeholder="phone_number">
		<h3>farmer_address</h3>
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

			<a href="/add/address">没有想要的地址?</a>
		<h3>farmer_level</h3>	
		<select name="farmer_level">
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
		</select>
	</form>
@endsection