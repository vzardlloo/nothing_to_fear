<div class="form-group">
    <label for="tag" class="col-md-3 control-label">植保作业时间</label>
    <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
        <input class="form-control" size="14" type="text" name="task_work_date" id="tag" value="{{ $task_work_date }}" readonly/>
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">农户编号</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="task_farmer_id" id="tag" value="{{ $task_farmer_id }}" autofocus>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">作业小队编号</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="task_staff_id" id="tag" value="{{ $task_staff_id }}" autofocus>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">农作物种类编号</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="task_crop_type" id="tag" value="{{ $task_crop_type }}" autofocus>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">实际喷洒作业亩数</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="task_area" id="tag" value="{{ $task_area }}" autofocus>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">是否签字</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="task_is_sign" id="tag" value="{{ $task_is_sign }}" autofocus>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">是否作业</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="task_is_work" id="tag" value="{{ $task_is_work }}" autofocus>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">是否评价</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="task_is_common" id="tag" value="{{ $task_is_common }}" autofocus>
    </div>
</div>