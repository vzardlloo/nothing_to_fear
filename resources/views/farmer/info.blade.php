@extends('layouts.add')
@section('panel-heading-1')
	<strong id="famer-id">{{ $info->farmer_name }}</strong>的农户信息
@endsection
@section('panel-body-1')
<div class="row">
	<div class="tim-typo">
		<h3>
			<span class="tim-note">手机号</span>
			{{ $info->farmer_phone }}
		</h3>
	</div>
	<div class="tim-typo">
		<h3>
			<span class="tim-note">住址</span>
			{{ $info->farmer_place }}
		</h3>
	</div>
	<div class="tim-typo">
		<h3>
			<span class="tim-note">农田总亩数</span>
			{{ $info->farmer_area }}亩
		</h3>
	</div>
</div>
<div class="text-center">
	<button type="button" class="btn btn-primary" onclick="history.back();">返 回</button>
</div>

@endsection

@section('js')
<script type="text/javascript">
</script>
@endsection

