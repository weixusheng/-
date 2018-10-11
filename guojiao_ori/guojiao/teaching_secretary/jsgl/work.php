<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" rel="stylesheet" href="calendar/src/css/jscal2.css" />
    <link type="text/css" rel="stylesheet" href="calendar/src/css/border-radius.css" />
    <link id="skin-steel" title="Steel" type="text/css" rel="alternate stylesheet" href="calendar/src/css/steel/steel.css" />
    <link id="skinhelper-compact" type="text/css" rel="alternate stylesheet" href="calendar/src/css/reduce-spacing.css" />
    <script src="calendar/src/js/jscal2.js"></script>
    <script src="calendar/src/js/unicode-letter.js"></script>
    <script src="calendar/src/js/lang/cn.js"></script>
    <link type="text/css" rel="stylesheet" href="calendar/demopage.css" />
  </head>
  <body style="background-color:#BCCCDD;padding-left:25px; padding-top:45px;">
  <?php
  include("../../function/conn.php");
  if(isset($_POST["date_select"])==false&&!isset($_POST["ID"])){
	  mysql_query("truncate table tb_work");
  ?>
  <form action="#" method="post" onsubmit="return check()" name="form1" target="_self">
    <table>
      <tr>
        <td valign="top" style="width: 15em;">       
        <h1>请选择你要计算的日期</h1>
         <div id="cont"></div>
         <script type="text/javascript">
            var LEFT_CAL = Calendar.setup({
                    cont: "cont",
                    weekNumbers: false,
                    selectionType: Calendar.SEL_MULTIPLE,
                    showTime: 0
                    // titleFormat: "%B %Y"
            })

		    var links = document.getElementsByTagName("link");
                  var skins = {};
                  for (var i = 0; i < links.length; i++) {
                          if (/^skin-(.*)/.test(links[i].id)) {
                                  var id = RegExp.$1;
                                  skins[id] = links[i];
                          }
				  }
				  var skin ="steel";
				  for (var i in skins) {
						  if (skins.hasOwnProperty(i))
								  skins[i].disabled = true;
				  }
				  if (skins[skin])
						  skins[skin].disabled = false;
          </script>
        </td>
        <td style="padding-top:25px;"><img src="calendar.png" /></td>
        <td valign="top" style="padding-left:0; width:23em;">
          <table class="properties" border="0" bordercolor="444444" style="margin-top:0px;">
            <tr align="left">
              <td class="label" align="left" style="text-align:left">
                <label for="f_selection"><h1 style="text-align:left; font-size:16px;">你选择的日期有:</h1></label>
              </td>
            </tr>
            <tr>
              <td>
                <textarea id="f_selection" style="width: 230px; height: 12em" name="date_select"></textarea>
                <script type="text/javascript">//<![CDATA[

                  LEFT_CAL.addEventListener("onSelect", function(){
                          var ta = document.getElementById("f_selection");
                          ta.value = this.selection.countDays() + " 天被选择：\n\n" + this.selection.getDates("%Y-%m-%d").join("；\n")+"；";
                  });

                //]]></script>
              </td>
            </tr>
          </table>
        </td>
        <td>
        <input name="" type="submit"  value="确定"/><br /><br />
        <input name="" type="reset"  value="重置"/>
        </td>
      </tr>
    </table>
    </form>
    <?php
  }
 if(isset($_POST["date_select"])){
$data_all=$_POST["date_select"];
$data_all=substr($data_all,0,strlen($data_all)-1);
$data_1=explode("：",$data_all);
$data_2=explode("；",$data_1[1]);
$data=array();
for($i=0;$i<count($data_2);$i++){
		array_push($data,trim($data_2[$i]));
}
$first_date=$data[0];
$last_date=$data[count($data)-1];
$t_sql=mysql_query("select ID,c_id,c_teacher from tb_course1_term where ('$first_date' between begin_date and end_date or '$last_date' between begin_date and end_date) and substr(c_id,1,2)=16;");
$tea=array();
$tea_id=array();
$work_amount=array();
$course_name=array();
while($t_info=mysql_fetch_array($t_sql)){
	 array_push($tea,$t_info["c_teacher"]);
	 array_push($tea_id,$t_info["ID"]);
	 array_push($work_amount,0);
	 $c_id=$t_info["c_id"];
	 $asql=mysql_query("select c_longname from tb_course_base where c_id='$c_id'");
	 $ainfo=mysql_fetch_array($asql);
	 array_push($course_name,$ainfo["c_longname"]);
};
for($i=0;$i<count($data);$i++){
	$date=$data[$i];
	$date;
	for($j=0;$j<count($tea_id);$j++){
	$id=$tea_id[$j];
	$tea_name=$tea[$j];
	$hour=0;
	$work_sql=mysql_query("select mon_hour,tue_hour,wed_hour,thu_hour,fri_hour,sat_hour,sun_hour,repeat_time,stu_amount from tb_course1_term where ID='$id' and '$date' between begin_date and end_date;");
	if($work_sql==true){
		$work_info=mysql_fetch_array($work_sql);
		$year=substr(trim($date),0,4);
		$mon=substr($date,5,2);
		$day=substr($date,8,2);
		$time=mktime(0,0,0,intval($mon),intval($day),intval($year));
		$week=date("w",$time);
		switch($week){
			case 1:$hour=$work_info["mon_hour"];break;
			case 2:$hour=$work_info["tue_hour"];break;
			case 3:$hour=$work_info["wed_hour"];break;
			case 4:$hour=$work_info["thu_hour"];break;
			case 5:$hour=$work_info["fri_hour"];break;
			case 6:$hour=$work_info["sat_hour"];break;
			case 7:$hour=$work_info["sun_hour"];break;
			default:$hour=0;break;
			}
		if($work_info["stu_amount"]<=70&&$work_info["stu_amount"]!='') $kechouxishu=1;
		elseif($work_info["stu_amount"]>70) $kechouxishu=1+floor(($work_info["stu_amount"]-50)/20)*0.1;
//	    $work_hour=$hour*$kechouxishu*$work_info["repeat_time"];
		$work_hour=$hour*$work_info["repeat_time"];
		$work_amount[$j]+=$work_hour;
		if($work_info["stu_amount"]!=''){
		$coef[$j]=$kechouxishu;
		}
		}
	}
}
if(count($tea_id)!=0){
for($j=0;$j<count($tea_id);$j++){
	mysql_query("insert tb_work(course1_id,course_name,c_tea,work,coef) values('$tea_id[$j]','$course_name[$j]','$tea[$j]','$work_amount[$j]','$coef[$j]')");
	}
}
?>

<table border="0" cellspacing="0" cellpadding="0" width="600" style="text-align:center; margin-left:28px;">
<form name="form2" method="post" action="#">
<caption style="font-size:20px; font-weight:bolder;">教师工作量调整</caption>
  <tr>
  	<td style="border: #000 solid 1px;">序号</td>
    <td style="border: #000 solid 1px; border-left:none;">教师姓名</td>
    <td style="border: #000 solid 1px; border-left:none;">课程名称</td>
    <td style="border: #000 solid 1px; border-left:none;">工作量</td>
    <td style="border: #000 solid 1px; border-left:none;">缺课学时</td>
    <td style="border: #000 solid 1px; border-left:none;">代课学时</td>
  </tr>
<?php
$sql=mysql_query("select * from tb_work");
if($sql==true){
	$sql_info=mysql_fetch_array($sql);
	do{
		$id=$sql_info["ID"];
		$t_name=$sql_info["c_tea"];
		$course_name0=$sql_info["course_name"];
		$all_hour=$sql_info["work"]*$sql_info["coef"];
?>
  <tr>
    <td style="border: #000 solid 1px; border-top:none;">&nbsp;<?php echo $id; ?><input type="hidden" name="ID[]" value="<?php echo $id?>" /></td>
    <td style="border: #000 solid 1px; border-left:none; border-top:none;">&nbsp;<?php echo $t_name; ?></td>
    <td style="border: #000 solid 1px; border-left:none; border-top:none;">&nbsp;<?php echo $course_name0; ?></td>
    <td style="border: #000 solid 1px; border-left:none; border-top:none;">&nbsp;<?php echo number_format($all_hour,2); ?></td>
    <td style="border: #000 solid 1px; border-left:none; border-top:none;">&nbsp;<input type="text" name="queke[]" style="width:80px;" /></td>
    <td style="border: #000 solid 1px; border-left:none; border-top:none;">&nbsp;<input type="text" name="daike[]" style="width:80px;"/></td>
  </tr><?php
	}while($sql_info=mysql_fetch_array($sql));
} ?>
</table>
<p>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="提交" /></p>
<?php
}//if结束
?>
<?php
if(isset($_POST["ID"])){
	$arr0=$_POST["ID"];
	$arr1=$_POST["queke"];
	$arr2=$_POST["daike"];
	$ID=implode(',',$arr0);
	$length=count($arr0);
	for($i=0;$i<$length;$i++){
	$arr=$arr2[$i]-$arr1[$i];
	$sql=mysql_query("update tb_work set work=work+$arr where ID=$arr0[$i]");
	}
?>
<table border="0" cellspacing="0" cellpadding="0" width="600" style="text-align:center; margin-left:28px;">
<caption style="font-size:20px; font-weight:bolder;">教师工作量计算表</caption>
  <tr>
    <td style="border: #000 solid 1px;">教师编号</td>
    <td style="border: #000 solid 1px; border-left:none;">教师姓名</td>
    <td style="border: #000 solid 1px; border-left:none;">工作量</td>
    <td style="border: #000 solid 1px; border-left:none;">课酬标准</td>
    <td style="border: #000 solid 1px; border-left:none;">授课薪金</td>
  </tr>
<?php
$sql=mysql_query("select sum(work*coef) as all_work,c_tea from tb_work group by c_tea");
if($sql==true){
	$sql_info=mysql_fetch_array($sql);
	do{
	$t_name=$sql_info["c_tea"];
	$all_hour=$sql_info["all_work"];
	$tinf_sql=mysql_query("select t_no,pro_leval from tb_teacher_base where t_name='$t_name';");
	$tinf_info=mysql_fetch_array($tinf_sql);
	$t_no=$tinf_info["t_no"];
	$leval=$tinf_info["pro_leval"];
	switch($leval){
			case 0:$leval=70;break;
			case 1:$leval=65;break;
			case 2:$leval=60;break;
			default:$leval=0;break;
			}
?>
  <tr>
    <td style="border: #000 solid 1px; border-top:none;">&nbsp;<?php echo $t_no; ?></td>
    <td style="border: #000 solid 1px; border-left:none; border-top:none;">&nbsp;<?php echo $t_name; ?></td>
    <td style="border: #000 solid 1px; border-left:none; border-top:none;">&nbsp;<?php echo number_format($all_hour,2); ?></td>
    <td style="border: #000 solid 1px; border-left:none; border-top:none;">&nbsp;<?php echo $leval."元/学时"; ?></td>
    <td style="border: #000 solid 1px; border-left:none; border-top:none;">&nbsp;<?php echo number_format($leval*$all_hour,2); ?></td>
  </tr><?php
	}while($sql_info=mysql_fetch_array($sql));
}else{ ?>
	<tr>
    <td colspan="5" style="border: #000 solid 1px; border-top:none; text-align:center">&nbsp;你所选时间内无教师工作量</td>
  </tr>
	<?php }
  ?>
</table>
<p>&nbsp;<a href="work.php"><font style="font-family:'黑体'; font-size:20px; font-weight:bolder; padding-left:24px; color:#333">返回</font></a></p>
<?php
}
	?>
</body>
</html>
