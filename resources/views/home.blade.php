@extends('layouts.add')

@section('title','欢迎')
@section('panel-heading-1','欢迎')
@section('panel-body-1')
    {{ Auth::user()->name }}
@endsection
@section('panel-heading-2','上次登录时间')
@section('panel-body-2')
	{{ Auth::user()->updated_at}}
@endsection

