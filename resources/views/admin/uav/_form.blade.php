<div class="form-group">
    <label for="tag" class="col-md-3 control-label">购买时间</label>
    <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
        <input class="form-control" size="14" type="text" name="drone_buy_date" id="tag" value="{{ $drone_buy_date }}" readonly/>
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">所在组编号</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="drone_row" id="tag" value="{{ $drone_row }}" autofocus>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">最后作业时间</label>
    <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
        <input class="form-control" size="14" type="text" name="drone_last_work" id="tag" value="{{ $drone_last_work }}" readonly/>
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">电机最后上油时间</label>
    <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
        <input class="form-control" size="14" type="text" name="drone_rote_date" id="tag" value="{{ $drone_rote_date }}" readonly/>
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">最后全面检查时间</label>
    <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
        <input class="form-control" size="14" type="text" name="drone_check_date" id="tag" value="{{ $drone_check_date }}" readonly/>
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
</div>


<div class="form-group">
    <label for="tag" class="col-md-3 control-label">最后一次维修时间</label>
    <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
        <input class="form-control" size="14" type="text" name="drone_repair_date" id="tag" value="{{ $drone_repair_date }}" readonly/>
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
</div>
