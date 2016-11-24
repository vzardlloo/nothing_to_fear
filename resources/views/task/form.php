<div style="padding:10px width:100%;height:70rem;background-color: #0033ff">
<div class="info">
<form action="{{ url('/task') }}" method="post">
<p style="margin:0 auto 0 auto; font-size:50px">信息表</p>
<fieldset>
<legend>farmer</legend>
农户姓名：<input type="text" name="farmer_name" size="35">&nbsp;&nbsp;
农户电话：<input type="text" name="phone_num" size="35"><br><br>
农户地址：<input type="text" name="farmer_address" size="35">&nbsp;&nbsp;
农户等级：<input type="text" name="farmer_level"  size="35"><br><br>

</fieldset>
<br>
<fieldset>
<legend>farmer_info</legend>
farm_mark：<input type="text" name="farm_mark" size="35">&nbsp;&nbsp;
农户地址：<input type="text" name="farm_location" size="35">
</fieldset>
<br>
<fieldset>
<legend>位置部分</legend>
省份名称：<input type="text" name="province_name" size="35">&nbsp;&nbsp;
城市名称：<input type="text" name="city_name" size="35"><br><br>
区名称：<input type="text" name="area_name" size="20">&nbsp;&nbsp;
镇名称：<input type="text" name="town_name" size="20">&nbsp;&nbsp;
村名称：<input type="text" name="country_name" size="20"><br><br>
</fieldset>
<br>
<fieldset>
<legend>内部员工部分</legend>
员工姓名：<input type="text" name="user_name" size="35">&nbsp;&nbsp;
员工密码：<input type="text" name="password" size="35"><br><br>
员工电话：<input type="text" name="phone_num" size="20">&nbsp;&nbsp;
员工职称：<input type="text" name="role" size="20">&nbsp;&nbsp;
员工等级：<input type="text" name="level" size="20"><br><br>
</fieldset>
<br>
<fieldset>
<legend>任务记录部分</legend>
队伍编号：<input type="text" name="task_team_id" size="35">&nbsp;&nbsp;
农户编号：<input type="text" name="task_farmer_id" size="35"><br><br>
地点编号：<input type="text" name="task_place_id" size="35">&nbsp;&nbsp;
飞机编号：<input type="text" name="task_uav_id" size="35"><br><br>
任务地点：<input type="text" name="task_area" size="35">&nbsp;&nbsp;
任务时间：<input type="text" name="task_during" size="35"><br><br>
任务天气：<input type="text" name="level" size="35">&nbsp;&nbsp;
任务农药：<input type="text" name="level" size="35"><br><br>
任务星级：<input type="text" name="task_mark" size="35">&nbsp;&nbsp;
喷雾星级：<input type="text" name="task_spray_mark" size="35"><br><br>
任务评价：<textarea rows="4" cols="80" name="task_common"></textarea>
</fieldset>
<br>
	
	
	
	
	
	
	
</form>
</div>
</div>