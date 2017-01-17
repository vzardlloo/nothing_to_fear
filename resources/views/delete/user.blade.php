@extends('layouts.add')

@section('title','删除用户')
@section('bar','删除用户')
@section('panel-heading-1','从数据库读取 ......')
@section('panel-body-1')
<table class="table">
	<thead>
		<th>工作人员</th>
		<th>手机号</th>
		<th>植保职位</th>
	</thead>
	<tbody>
		@foreach($users as $one)
			<tr>
			<td>
				{{ $one->user_name }}				
			</td>
			<td>
				{{ $one->phone_num }}
			</td>
			<td>
			@if($one->role == 1)
				观察员
			@elseif($one->role == 2)
				飞控手
			@else
				其他
			@endif
			</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection
@section('panel-body-2')
   		<form action="{{del_user}}" method="post">
		<label class="control-label">选择删除人员：</label>			
			<select class="form-control" name="inner_user_id">
				@foreach($users as $one)
					<option value="{{ $one->inner_user_id }}">
						{{ $one->user_name }}
					</option>
				@endforeach
			</select>

		<BUTTON type="submit" class="btn btn-primary">确认删除</BUTTON>
   		</form>
   	
@endsection