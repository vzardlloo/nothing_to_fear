<div class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">点击 打开导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{ route('log-viewer::dashboard') }}" class="navbar-brand">
                <i class="fa fa-fw fa-book"></i> 栏目来自
            </a>
        </div>
        <ul class="nav navbar-nav">
            <li class="{{ Route::is('log-viewer::dashboard') ? 'active' : '' }}">
                <a href="{{ route('log-viewer::dashboard') }}">
                    <i class="fa fa-dashboard"></i> log_viewer/_template
                </a>
            </li>
            <li class="{{ Route::is('log-viewer::logs.list') ? 'active' : '' }}">
                <a href="{{ route('log-viewer::logs.list') }}">
                    <i class="fa fa-archive"></i> navigation.blade.php
                </a>
            </li>
        </ul>
    </div>
</div>
