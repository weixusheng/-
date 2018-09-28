<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
</head>

<body class="ziye_style">
<table width="111%" border="1" cellspacing="1" cellpadding="0" align="center">
<tr>
  <td height="120"><table width="" border="1" cellspacing="1" cellpadding="0" align="center">
    <caption>
      重修报名结果
      </caption>
    <tr>
      <td width="600"  height="30" align="center">学生院系</td>
      <td width="150" align="center">年级</td>
      <td width="200" align="center">学号</td>
      <td width="200" align="center">姓名</td>
      <td width="200" align="center">班级</td>
      <td width="700" align="center">专业</td>
      <td width="300" align="center">课程编号</td>
      <td width="450" align="center">课程名称</td>
      <td width="250" align="center">课程类别</td>
      <td width="250" align="center">课程性质</td>
      <td width="250" align="center">总学时</td>
      <td width="100" align="center">学分</td>
      <td width="300" align="center">原学年学期</td>
      <td width="400" align="center">开课学院</td>
      <td width="450" align="center">银行账号</td>
    </tr>
    <?php
include("../../function/conn.php");
$term=$_POST["term"];
$yuanming="经济管理学院";
$sql=mysql_query("select s_id,c_id,term from tb_chongxiu where chongxiu_term='$term'");
$info=mysql_fetch_array($sql);
do {
$s_id=$info["s_id"];
$c_id=$info["c_id"];
$term=$info["term"];

$rsql=mysql_query("select s_no,s_name,bank_num, now_class from tb_s_information where ID=$s_id");
$rinfo=mysql_fetch_array($rsql);
$s_no=$rinfo["s_no"];
$bank_num=$rinfo["bank_num"];
$s_name=$rinfo["s_name"];
$s_class=$rinfo["now_class"];

//$hsql=mysql_query("select s_term,score,bk_score from tb_score where s_id='$s_id' and c_id='$c_id'");
//$hinfo=mysql_fetch_array($hsql);修改：李青燃
//$score=$hinfo["score"];
//$bk_score=$hinfo["bk_score"];
//$s_term=$hinfo["s_term"];
$gsql=mysql_query("select c_longname,c_credit,c_office,c_id,c_type from tb_course_base where ID in(select cb_id  from tb_course2_term where ID=$c_id)");
$ginfo=mysql_fetch_array($gsql);
$c_longname=$ginfo["c_longname"];
$c_credit=$ginfo["c_credit"];
$c_office=$ginfo["c_office"];
$c_type=$ginfo["c_type"];
$c_id1=$ginfo["c_id"];

$ksql=mysql_query("select c_week_hour ,c_kind,c_teacher   from tb_course2_term where ID='$c_id'");
$kinfo=mysql_fetch_array($ksql);
$c_week_hour=$kinfo["c_week_hour"];
$c_kind=$kinfo["c_kind"];
$c_teacher=$kinfo["c_teacher"];

$lsql=mysql_query("select grade_code , speciality   from tb_class where class_name='$s_class'");
$linfo=mysql_fetch_array($lsql);
$grade_code=$linfo["grade_code"];
$speciality=$linfo["speciality"];


?>

    <tr>
      <td width="600" align="center" height="21"><?php  echo $yuanming ?></td>
      <td width="150" align="center"><?php echo $grade_code?></td>
      <td width="200" align="center"><?php echo $s_no?>&nbsp;</td>
      <td width="260" align="center"><?php echo $s_name?>&nbsp;</td>
      <td width="200" align="center"><?php echo $s_class ?>
        &nbsp;</td>
      <td width="700" align="center"><?php echo $speciality ?></td>
        <td width="300" align="center"><?php echo $c_id1?></td>
        <td width="450" align="center"><?php echo $c_longname ?></td>
        <td width="250" align="center"><?php echo $c_type?></td>
        <td width="250" align="center"><?php echo $c_kind?></td>
        <td width="250" align="center"><?php echo $c_week_hour?></td>
        <td width="100" align="center"><?php echo $c_credit?></td>
        <td width="150" align="center"><?php echo $term?></td>
        <td width="400" align="center"><?php echo $c_office ?></td>
        <td width="450" align="center"><?php echo $bank_num?></td>
    </tr>
    <?php
}while($info=mysql_fetch_array($sql))
?>
  </table></td>
</tr>
</table>
<!--<form action="" method="get"><input name="submit" value="导出为exel" type="button" onclick="location.href='export_reb_registration.php'"/></form>
-->
</body>
</html>