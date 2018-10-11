<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="../../css/style.css">
<title>无标题文档</title>
</head>

<body class="ziye_style">
<?php
$grade=$_GET["grade"];
$term=$_POST["term"];
?>
<table width="" border="1" cellspacing="0" cellpadding="0">
  <tr><caption><?php echo $grade."级补考名单" ?>
  <!--<input name="input" type="submit" value="导出到Excel" onclick="javascript:location.href='export_retext_names.php?grade=<?php echo $grade?>&term=<?php echo $term?>'" />-->
  </caption>
  </tr>
  <tr>
    <td align="center" width="60">序号</td>
  	<td align="center" width="100">班级</td>
    <td align="center" width="140">学号</td>
    <td align="center" width="80">姓名</td>
    <td align="center" width="120">考试科目</td>
    <td align="center" width="110">课程编号</td>
    <td align="center" width="60">类型</td>
    <td align="center" width="60">学分</td>
    <td align="center" width="60">成绩</td>
    <td align="center" width="60">学期</td>
   <!-- <td align="center" width="60">学时</td>-->
    <td align="center" width="120">考试状态</td>
    <td align="center" width="120">开课部门</td>
  </tr>
<?php
include("../../function/conn.php");
$dianqi="电气工程及其自动化";
$sql=mysql_query("select term,s_class,s_no,s_name,c_name,c_no,c_kind,credit,score,bk_type from stu_info where score<60 and term='$term' and grade='$grade' and exam_type in (0,1) and (substr(c_no,1,2)!=16 or major='$dianqi') order by c_no,s_no");
$info=mysql_fetch_array($sql);
if($info==true){
$i=0;
do{
	$i++;
	$c_no=$info["c_no"];
	$asql=mysql_query("select c_office from tb_course_base where c_id='$c_no'");
	$ainfo=mysql_fetch_array($asql);
	$c_office=$ainfo['c_office'];
?>
	<tr>
		<td align="center"><?php echo $i;?>&nbsp;</td>
    	<td align="center"><?php echo $info["s_class"]; ?>&nbsp;</td>
        <td align="center"><?php echo $info["s_no"];?>&nbsp;</td>
        <td align="center"><?php echo $info["s_name"];?>&nbsp;</td>
        <td align="center"><?php echo $info["c_name"];?>&nbsp;</td>
        <td align="center"><?php echo $info["c_no"];?>&nbsp;</td>
        <td align="center"><?php echo $info["c_kind"];?>&nbsp;</td>
        <td align="center"><?php echo $info["credit"];?>&nbsp;</td>
        <td align="center"><?php echo $info["score"];?>&nbsp;</td>
    	<td align="center"><?php echo $info["term"];?>&nbsp;</td>
        <!--<td align="center"><?php echo $c_hour?></td>-->
        <td align="center"><?php if($info["bk_type"]=="0") echo "正常";
		                           elseif($info["bk_type"]=="1") echo "缓考";
								   elseif($info["bk_type"]=="2") echo "缺考";
								   elseif($info["bk_type"]=="3") echo "禁考";
								   else  echo "其他";
			                         ?>
								</td>
        <td align="center"><?php echo $c_office;?>&nbsp;</td>
    </tr>
<?php		
}while($info=mysql_fetch_array($sql));
}else{
?>
	<tr>
    <td colspan="10" align="center">无补考学生</td>
    </tr>
    <?php }?>

</table>
</body>
</html>