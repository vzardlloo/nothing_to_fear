@extends('layout')
@section('content')
<div class="section">
    <div class="container tim-container">
        <div class="title">
            <h2>@yield('panel-heading-1')</h2>
        </div>
        @yield('panel-body-1')
    </div>
</div>

<div class="section">
    <div class="container tim-container">
        <div class="title">
            <h2>@yield('panel-heading-2')</h2>
        </div>
        @yield('panel-body-2')
    </div>
</div>

@endsection