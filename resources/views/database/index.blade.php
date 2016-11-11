@extends('layout')

@section('title','Laravel Database Testing Unit')


@section('content')
	@foreach($user_log_info as $data)
		<li class="form">{{ $data->user_log_id }}</li>
	@endforeach

	<hr>

	@foreach($inner_user as $user)
		<li>{{ $user->password }}</li>
	@endforeach

	<hr>

	<a href="/login">Login in</a>

	<hr>

	<form method="get" action="/user_log_2_inner_user">
		<input class="form-control" type="text" name="user_id" placeholder="user_id">
		<input class="form-control" type="password" name="password" placeholder="password">
		<input class="form-control" type="text" name="user_name" placeholder="user_name">
		<input class="form-control" type="text" name="phone_num" placeholder="phone_num">
		<input type="submit" value="submit">
	</form>
@endsection
