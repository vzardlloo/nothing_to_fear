@extends('layout')
@section('title','task_index')
@section('content')
	<div class="margin-bottom:100px;">
		<ul>
			<li>task 1</li>
			<li>task 2</li>
		</ul>
	</div>
	<div>
		<form action="{{ url('/task') }}" method="post">
			{!! csrf_field() !!}
		</form>
	</div>
	
@endsection