@extends('layouts.add')
@section('panel-heading-1')
	评价编号为<strong id="task-id">{{ $task_id }}</strong>的任务
@endsection
@section('panel-body-1')
<form method="post" action="{{ url('task-mark') }}">
	{{ csrf_field() }}
	<input type="hidden" name="id" value="{{ $task_id }}">
	<div class="modal-header">
    	<h4 class="modal-title">请如实评价</h4>
 	</div>
 	<div class="modal-body">
	 	<input type="hidden" name="common_task_id" value="{{ $task_id }}"/>
		<div class="form-group label-floating">
			<label class="control-label" style="font-size: 20px;"><i class="material-icons">wb_sunny</i> 作业天气</label>
			<input type="text" class="form-control" name="common_weather">
		</div>

		<div class="form-group label-floating">
			<label class="control-label"><i class="material-icons">access_time</i> 作业时间段</label>
			<input type="text" class="form-control" name="task_during">
		</div>

		<div class="form-group label-floating">
			<label class="control-label"><i class="material-icons">battery_full</i> 使用农药</label>
			<input type="text" class="form-control" name="task_chamical">
		</div>

		<div class="form-group">
			<label class="control-label">作业星级</label>
			<br/>
			<div id="stars">
　　　　		<span id="0" class="span_star">☆</span>
				<span id="1" class="span_star">☆</span>
				<span id="2" class="span_star">☆</span>
				<span id="3" class="span_star">☆</span>
				<span id="4" class="span_star">☆</span>
			</div>
			<input type="hidden" id="star" name="common_star" value="5" />
		</div>

		<div class="form-group">
			<label class="control-label"><i class="material-icons">speaker_notes</i></label>
			<textarea class="form-control" placeholder="作业评语" rows="3" name="common_mark"></textarea>
		</div>
 	</div>
 	<br>
 	<br>
 	<div class="text-center" >
    <input type="submit" style="margin-right: 28px;" class="btn btn-primary" value="确定"></input>
    <button type="button" class="btn btn-primary" onclick="history.back();">返 回</button>
    </div>
</form>
@endsection

@section('js')
<script type="text/javascript">
        $().read(function(){
            //由于不好获取点击的span的是何坐标，所以声明一个变量来记录点击的span标签的id
            var mark;
            $(".span_star")
                .css({ fontSize: "20px", color: "yellow" })
                .mouseover(function () {
                    $(this).text("★")
                        .prevAll().text("★").end()
                        .nextAll().text("☆").end()
                        .click(function () {
                            mark = $(this).attr("id");
                        })
                });
            $("#stars")
                 .css({ width: "100px", height: "20px", border: "1px solid black" })
                 .mouseout(function () {
                    //如果mark内有内容，则在鼠标离开div后，让星星数量变回你最近一次点击的位置
                     if (mark) {
                         $("#" + mark)
                            .text("★")
                            .prevAll().text("★").end()
                            .nextAll().text("☆");
                     }
                     //mark中没有值，意味着你没有点击任何星星，这时，让所有的星星都黯淡吧
                     else {
                         $(".span_star").text("☆");
                     }
                 });
        });
</script>
@endsection

