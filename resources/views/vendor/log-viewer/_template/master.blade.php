@extends('admin.layouts.base')
@section('title','啄木鸟农业')

@section('pageHeader','啄木鸟植保作业信息平台')
@include('log-viewer::_template.style')
<style>
    body{
        padding-top: 0px;
    }
</style>
@section('content')
    <div class="container-fluid">
        @yield('content')
    </div>
@endsection

@include('log-viewer::_template.footer')
@section('js')


<script src="/plugins/logViewer/js/Chart.min.js"></script>
<script>
    Chart.defaults.global.responsive      = true;
    Chart.defaults.global.scaleFontFamily = "'Source Sans Pro'";
    Chart.defaults.global.animationEasing = "easeOutQuart";
</script>
@yield('scripts')

@endsection