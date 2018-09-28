<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link type="text/css" rel="stylesheet" href="../../css/style.css">
</head>

<body class="ziye_style">
<?php
 include("../../function/conn.php");
  date_default_timezone_set("PRC");
				$year=date("Y");
				$mon=date("m");
				if($mon<11){
					$grade=$year-1;
				}
				else {
					$grade=$year;
				}
  $warn_term=$grade."1";
?>
<table width="470" border="1" cellspacing="0" cellpadding="0">
<caption>东北电力大学经济管理学院学业警告名单</caption>
<!--<input name="input" type="submit" value="导出到Excel" onclick="location.href='export_stwarning_names.php?warn_term=<?php echo $warn_term?>'" />-->
  <tr>
    <td width="60" align="center">学期</td>
    <td width="70" align="center">学号</td>
    <td width="100" align="center">班级</td>
    <td width="100" align="center">姓名</td>
    <td width="80" align="center">未修满学分</td>
  </tr>
  <?php
  $sql=mysql_query("select jiangji.s_class,jiangji.s_no,jiangji.s_name,sum(jiangji.upload_credit-jiangji.tm_credit) as cha from jiangji,tb_class where tb_class.class_name=jiangji.s_class and tb_class.graduate_flag='0' group by jiangji.s_no having cha>0 order by jiangji.grade_code,s_no;");
  if($sql==true){
  $info=mysql_fetch_array($sql);
  if($info["s_no"]!=""){
	  do{
  ?>
  <tr>   
	<td align="center"><?php echo $warn_term; ?>&nbsp;</td>
    <td align="center"><?php echo $info["s_no"]; ?>&nbsp;</td>
    <td align="center"><?php echo $info["s_class"]; ?>&nbsp;</td>
    <td align="center"><?php echo $info["s_name"]; ?>&nbsp;</td>
    <td align="center"><?php echo $info["cha"]; ?>&nbsp;</td>
  </tr>
	   <?php }while($info=mysql_fetch_array($sql));
	 
  }else {?>
  <tr><td colspan="5" align="center">无学业警告名单</td></tr>
  <?php }
  }?>
  </table>
</body>
</html>