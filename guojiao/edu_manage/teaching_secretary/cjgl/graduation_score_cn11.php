<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
<style type="text/css">
body {
	font-size:12px;
}
td {
	text-align:center;
}

</style>
<script language=javascript>  
function doPrint() {  
bdhtml=window.document.body.innerHTML;    
sprnstr="<!--startprint-->";    
eprnstr="<!--endprint-->";  
prnhtml=bdhtml.substr(bdhtml.indexOf(sprnstr)+17);    
prnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr));    
window.document.body.innerHTML=prnhtml;    
window.print(); 
}
function showInfo(target,Infos){
    document.getElementById(target).innerHTML = Infos;
}
</SCRIPT>




</head>

<body class="bgc">
<?php
//$s_no=$_POST["s_no"];
$s_no='0915010101';
require '../../function/conn.php';
require '../../function/common.php';
$sql=mysql_query("select ID,s_name,s_sex,s_class,ID from tb_s_information where s_no='$s_no'");
$info=mysql_fetch_array($sql);
$s_id=$info["ID"];
$s_name=$info["s_name"];
$s_sex=$info["s_sex"];
$s_class=$info["s_class"];
$ID=$info["ID"];
$sql1=mysql_query("select speciality,grade_code from tb_class;");
$info1=mysql_fetch_array($sql1);
$speciality=$info1["speciality"];
$grade=$info1['grade_code'];
?> 

<!--startprint-->
<table width="1600" height="800" border="0" cellspacing="0" cellpadding="0"align="center" valign="top">
  <tr>
    <td height="90"><table width="1600"height="90" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" width="60" >学号：</td>
    <td align="left" width="246"><?php echo $s_no; ?></td>
    <td width="35">姓名：</td>
    <td align="left"width="311"><?php echo $s_name; ?></td>
    <td align="center"colspan="6" rowspan="2"><strong>东北电力大学&nbsp;&nbsp;学生总成绩单</strong></td>
  </tr>
  <tr>
    <td width="60">民族：</td>
    <td></td>
    <td width="35">性别：</td>
    <td align="left"><?php echo $s_sex; ?></td>
  </tr>
  <tr>
    <td width="60">行政班级：</td>
    <td align="left"><?php echo $s_class; ?></td>
    <td width="35">专业：</td>
    <td align="left"><?php echo $speciality; ?></td>
    <td width="35">院系：</td>
    <td width="225"align="left">经济管理学院</td>
    <td width="35">学位：</td>
    <td width="129">&nbsp;</td>
    <td width="60">毕业证号：</td>
    <td width="388">&nbsp;</td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td><table width="1600"  height="670"border="1" cellpadding="1" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="400" colspan="5" id="title_1">&nbsp;  </td>
        <td width="400" colspan="5" id="title_2">&nbsp; </td>
        <td width="400" colspan="5" id="title_3">&nbsp;</td>
        <td width="400" colspan="5" id="title_4">&nbsp;</td>
      </tr>
      <tr>
        <td width="200" align="center">课&nbsp;&nbsp;程&nbsp;&nbsp;名&nbsp;&nbsp;称</td>
        <td width="50">类别</td>
        <td width="50">成绩</td>
        <td width="50">学时</td>
        <td width="50">学分</td>
        <td width="200" align="center">课&nbsp;&nbsp;程&nbsp;&nbsp;名&nbsp;&nbsp;称</td>
        <td width="50">类别</td>
        <td width="50">成绩</td>
        <td width="50">学时</td>
        <td width="50">学分</td>
        <td width="200" align="center">课&nbsp;&nbsp;程&nbsp;&nbsp;名&nbsp;&nbsp;称</td>
        <td width="50">类别</td>
        <td width="50">成绩</td>
        <td width="50">学时</td>
        <td width="50">学分</td>
        <td width="200" align="center">课&nbsp;&nbsp;程&nbsp;&nbsp;名&nbsp;&nbsp;称</td>
        <td width="50">类别</td>
        <td width="50">成绩</td>
        <td width="50">学时</td>
        <td width="50">学分</td>
        </tr>
      <tr>
        <td id="term_1_c_1">&nbsp;</td>
        <td id="term_1_k_1">&nbsp;</td>
        <td id="term_1_s_1">&nbsp;</td>
        <td id="term_1_w_1">&nbsp;</td>
        <td id="term_1_cc_1">&nbsp;</td>
        <td id="term_2_c_1">&nbsp;</td>
        <td id="term_2_k_1">&nbsp;</td>
        <td id="term_2_s_1">&nbsp;</td>
        <td id="term_2_w_1">&nbsp;</td>
        <td id="term_2_cc_1">&nbsp;</td>
        <td id="term_3_c_1">&nbsp;</td>
        <td id="term_3_k_1">&nbsp;</td>
        <td id="term_3_s_1">&nbsp;</td>
        <td id="term_3_w_1">&nbsp;</td>
        <td id="term_3_cc_1">&nbsp;</td>
        <td id="term_4_c_1">&nbsp;</td>
        <td id="term_4_k_1">&nbsp;</td>
        <td id="term_4_s_1">&nbsp;</td>
        <td id="term_4_w_1">&nbsp;</td>
        <td id="term_4_cc_1">&nbsp;</td>
      </tr>
      <tr>
        <td id="term_1_c_2">&nbsp;</td>
        <td id="term_1_k_2">&nbsp;</td>
        <td id="term_1_s_2">&nbsp;</td>
        <td id="term_1_w_2">&nbsp;</td>
        <td id="term_1_cc_2">&nbsp;</td>
        <td id="term_2_c_2">&nbsp;</td>
        <td id="term_2_k_2">&nbsp;</td>
        <td id="term_2_s_2">&nbsp;</td>
        <td id="term_2_w_2">&nbsp;</td>
        <td id="term_2_cc_2">&nbsp;</td>
        <td id="term_3_c_2">&nbsp;</td>
        <td id="term_3_k_2">&nbsp;</td>
        <td id="term_3_s_2">&nbsp;</td>
        <td id="term_3_w_2">&nbsp;</td>
        <td id="term_3_cc_2">&nbsp;</td>
        <td id="term_4_c_2">&nbsp;</td>
        <td id="term_4_k_2">&nbsp;</td>
        <td id="term_4_s_2">&nbsp;</td>
        <td id="term_4_w_2">&nbsp;</td>
        <td id="term_4_cc_2">&nbsp;</td>
      </tr>
      <tr>
        <td id="term_1_c_3">&nbsp;</td>
        <td id="term_1_k_3">&nbsp;</td>
        <td id="term_1_s_3">&nbsp;</td>
        <td id="term_1_w_3">&nbsp;</td>
        <td id="term_1_cc_3">&nbsp;</td>
        <td id="term_2_c_3">&nbsp;</td>
        <td id="term_2_k_3">&nbsp;</td>
        <td id="term_2_s_3">&nbsp;</td>
        <td id="term_2_w_3">&nbsp;</td>
        <td id="term_2_cc_3">&nbsp;</td>
        <td id="term_3_c_3">&nbsp;</td>
        <td id="term_3_k_3">&nbsp;</td>
        <td id="term_3_s_3">&nbsp;</td>
        <td id="term_3_w_3">&nbsp;</td>
        <td id="term_3_cc_3">&nbsp;</td>
        <td id="term_4_c_3">&nbsp;</td>
        <td id="term_4_k_3">&nbsp;</td>
        <td id="term_4_s_3">&nbsp;</td>
        <td id="term_4_w_3">&nbsp;</td>
        <td id="term_4_cc_3">&nbsp;</td>
      </tr>
      <tr>
        <td id="term_1_c_4">&nbsp;</td>
        <td id="term_1_k_4">&nbsp;</td>
        <td id="term_1_s_4">&nbsp;</td>
        <td id="term_1_w_4">&nbsp;</td>
        <td id="term_1_cc_4">&nbsp;</td>
        <td id="term_2_c_4">&nbsp;</td>
        <td id="term_2_k_4">&nbsp;</td>
        <td id="term_2_s_4">&nbsp;</td>
        <td id="term_2_w_4">&nbsp;</td>
        <td id="term_2_cc_4">&nbsp;</td>
        <td id="term_3_c_4">&nbsp;</td>
        <td id="term_3_k_4">&nbsp;</td>
        <td id="term_3_s_4">&nbsp;</td>
        <td id="term_3_w_4">&nbsp;</td>
        <td id="term_3_cc_4">&nbsp;</td>
        <td id="term_4_c_4">&nbsp;</td>
        <td id="term_4_k_4">&nbsp;</td>
        <td id="term_4_s_4">&nbsp;</td>
        <td id="term_4_w_4">&nbsp;</td>
        <td id="term_4_cc_4">&nbsp;</td>
      </tr>
      <tr>
        <td id="term_1_c_5">&nbsp;</td>
        <td id="term_1_k_5">&nbsp;</td>
        <td id="term_1_s_5">&nbsp;</td>
        <td id="term_1_w_5">&nbsp;</td>
        <td id="term_1_cc_5">&nbsp;</td>
        <td id="term_2_c_5">&nbsp;</td>
        <td id="term_2_k_5">&nbsp;</td>
        <td id="term_2_s_5">&nbsp;</td>
        <td id="term_2_w_5">&nbsp;</td>
        <td id="term_2_cc_5">&nbsp;</td>
        <td id="term_3_c_5">&nbsp;</td>
        <td id="term_3_k_5">&nbsp;</td>
        <td id="term_3_s_5">&nbsp;</td>
        <td id="term_3_w_5">&nbsp;</td>
        <td id="term_3_cc_5">&nbsp;</td>
        <td id="term_4_c_5">&nbsp;</td>
        <td id="term_4_k_5">&nbsp;</td>
        <td id="term_4_s_5">&nbsp;</td>
        <td id="term_4_w_5">&nbsp;</td>
        <td id="term_4_cc_5">&nbsp;</td>
      </tr>
      <tr>
        <td id="term_1_c_6">&nbsp;</td>
        <td id="term_1_k_6">&nbsp;</td>
        <td id="term_1_s_6">&nbsp;</td>
        <td id="term_1_w_6">&nbsp;</td>
        <td id="term_1_cc_6">&nbsp;</td>
        <td id="term_2_c_6">&nbsp;</td>
        <td id="term_2_k_6">&nbsp;</td>
        <td id="term_2_s_6">&nbsp;</td>
        <td id="term_2_w_6">&nbsp;</td>
        <td id="term_2_cc_6">&nbsp;</td>
        <td id="term_3_c_6">&nbsp;</td>
        <td id="term_3_k_6">&nbsp;</td>
        <td id="term_3_s_6">&nbsp;</td>
        <td id="term_3_w_6">&nbsp;</td>
        <td id="term_3_cc_6">&nbsp;</td>
        <td id="term_4_c_6">&nbsp;</td>
        <td id="term_4_k_6">&nbsp;</td>
        <td id="term_4_s_6">&nbsp;</td>
        <td id="term_4_w_6">&nbsp;</td>
        <td id="term_4_cc_6">&nbsp;</td>
      </tr>
      <tr>
        <td id="term_1_c_7">&nbsp;</td>
        <td id="term_1_k_7">&nbsp;</td>
        <td id="term_1_s_7">&nbsp;</td>
        <td id="term_1_w_7">&nbsp;</td>
        <td id="term_1_cc_7">&nbsp;</td>
        <td id="term_2_c_7">&nbsp;</td>
        <td id="term_2_k_7">&nbsp;</td>
        <td id="term_2_s_7">&nbsp;</td>
        <td id="term_2_w_7">&nbsp;</td>
        <td id="term_2_cc_7">&nbsp;</td>
        <td id="term_3_c_7">&nbsp;</td>
        <td id="term_3_k_7">&nbsp;</td>
        <td id="term_3_s_7">&nbsp;</td>
        <td id="term_3_w_7">&nbsp;</td>
        <td id="term_3_cc_7">&nbsp;</td>
        <td id="term_4_c_7">&nbsp;</td>
        <td id="term_4_k_7">&nbsp;</td>
        <td id="term_4_s_7">&nbsp;</td>
        <td id="term_4_w_7">&nbsp;</td>
        <td id="term_4_cc_7">&nbsp;</td>
      </tr>
      <tr>
        <td id="term_1_c_8">&nbsp;</td>
        <td id="term_1_k_8">&nbsp;</td>
        <td id="term_1_s_8">&nbsp;</td>
        <td id="term_1_w_8">&nbsp;</td>
        <td id="term_1_cc_8">&nbsp;</td>
        <td id="term_2_c_8">&nbsp;</td>
        <td id="term_2_k_8">&nbsp;</td>
        <td id="term_2_s_8">&nbsp;</td>
        <td id="term_2_w_8">&nbsp;</td>
        <td id="term_2_cc_8">&nbsp;</td>
        <td id="term_3_c_8">&nbsp;</td>
        <td id="term_3_k_8">&nbsp;</td>
        <td id="term_3_s_8">&nbsp;</td>
        <td id="term_3_w_8">&nbsp;</td>
        <td id="term_3_cc_8">&nbsp;</td>
        <td id="term_4_c_8">&nbsp;</td>
        <td id="term_4_k_8">&nbsp;</td>
        <td id="term_4_s_8">&nbsp;</td>
        <td id="term_4_w_8">&nbsp;</td>
        <td id="term_4_cc_8">&nbsp;</td>
      </tr>
      <tr>
        <td id="term_1_c_9">&nbsp;</td>
        <td id="term_1_k_9">&nbsp;</td>
        <td id="term_1_s_9">&nbsp;</td>
        <td id="term_1_w_9">&nbsp;</td>
        <td id="term_1_cc_9">&nbsp;</td>
        <td id="term_2_c_9">&nbsp;</td>
        <td id="term_2_k_9">&nbsp;</td>
        <td id="term_2_s_9">&nbsp;</td>
        <td id="term_2_w_9">&nbsp;</td>
        <td id="term_2_cc_9">&nbsp;</td>
        <td id="term_3_c_9">&nbsp;</td>
        <td id="term_3_k_9">&nbsp;</td>
        <td id="term_3_s_9">&nbsp;</td>
        <td id="term_3_w_9">&nbsp;</td>
        <td id="term_3_cc_9">&nbsp;</td>
        <td id="term_4_c_9">&nbsp;</td>
        <td id="term_4_k_9">&nbsp;</td>
        <td id="term_4_s_9">&nbsp;</td>
        <td id="term_4_w_9">&nbsp;</td>
        <td id="term_4_cc_9">&nbsp;</td>
      </tr>
      <tr>
        <td id="term_1_c_10">&nbsp;</td>
        <td id="term_1_k_10">&nbsp;</td>
        <td id="term_1_s_10">&nbsp;</td>
        <td id="term_1_w_10">&nbsp;</td>
        <td id="term_1_cc_10">&nbsp;</td>
        <td id="term_2_c_10">&nbsp;</td>
        <td id="term_2_k_10">&nbsp;</td>
        <td id="term_2_s_10">&nbsp;</td>
        <td id="term_2_w_10">&nbsp;</td>
        <td id="term_2_cc_10">&nbsp;</td>
        <td id="term_3_c_10">&nbsp;</td>
        <td id="term_3_k_10">&nbsp;</td>
        <td id="term_3_s_10">&nbsp;</td>
        <td id="term_3_w_10">&nbsp;</td>
        <td id="term_3_cc_10">&nbsp;</td>
        <td id="term_4_c_10">&nbsp;</td>
        <td id="term_4_k_10">&nbsp;</td>
        <td id="term_4_s_10">&nbsp;</td>
        <td id="term_4_w_10">&nbsp;</td>
        <td id="term_4_cc_10">&nbsp;</td>
      </tr>
      <tr>
        <td id="term_1_c_11">&nbsp;</td>
        <td id="term_1_k_11">&nbsp;</td>
        <td id="term_1_s_11">&nbsp;</td>
        <td id="term_1_w_11">&nbsp;</td>
        <td id="term_1_cc_11">&nbsp;</td>
        <td id="term_2_c_11">&nbsp;</td>
        <td id="term_2_k_11">&nbsp;</td>
        <td id="term_2_s_11">&nbsp;</td>
        <td id="term_2_w_11">&nbsp;</td>
        <td id="term_2_cc_11">&nbsp;</td>
        <td id="term_3_c_11">&nbsp;</td>
        <td id="term_3_k_11">&nbsp;</td>
        <td id="term_3_s_11">&nbsp;</td>
        <td id="term_3_w_11">&nbsp;</td>
        <td id="term_3_cc_11">&nbsp;</td>
        <td id="term_4_c_11">&nbsp;</td>
        <td id="term_4_k_11">&nbsp;</td>
        <td id="term_4_s_11">&nbsp;</td>
        <td id="term_4_w_11">&nbsp;</td>
        <td id="term_4_cc_11">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5"><table width="400" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="84">学期学时：</td>
            <td>&nbsp;</td>
            <td width="84">学期学分：</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td colspan="5"><table width="400" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="84">学期学时：</td>
            <td>&nbsp;</td>
            <td width="84">学期学分：</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td colspan="5"><table width="400" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="84">学期学时：</td>
            <td width="28">&nbsp;</td>
            <td width="84">学期学分：</td>
            <td width="13">&nbsp;</td>
          </tr>
        </table></td>
        <td colspan="5"><table width="400" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="84">学期学时：</td>
            <td>&nbsp;</td>
            <td width="84">学期学分：</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td width="400"colspan="5" id="title_5">&nbsp;</td>
        <td width="400"colspan="5" id="title_6">&nbsp;</td>
        <td width="400"colspan="5" id="title_7">&nbsp;</td>
        <td width="400"colspan="5" id="title_8">&nbsp; </td>
      </tr>
 
      <tr>
        <td>课&nbsp;&nbsp;程&nbsp;&nbsp;名&nbsp;&nbsp;称</td>
        <td>类别</td>
        <td>成绩</td>
        <td>学时</td>
        <td>学分</td>
        <td>课&nbsp;&nbsp;程&nbsp;&nbsp;名&nbsp;&nbsp;称</td>
        <td>类别</td>
        <td>成绩</td>
        <td>学时</td>
        <td>学分</td>
        <td>课&nbsp;&nbsp;程&nbsp;&nbsp;名&nbsp;&nbsp;称</td>
        <td>类别</td>
        <td>成绩</td>
        <td>学时</td>
        <td>学分</td>
        <td>课&nbsp;&nbsp;程&nbsp;&nbsp;名&nbsp;&nbsp;称</td>
        <td>类别</td>
        <td>成绩</td>
        <td>学时</td>
        <td>学分</td>
      </tr>
      <tr>
        <td id="term_5_c_1">&nbsp;</td>
        <td id="term_5_k_1">&nbsp;</td>
        <td id="term_5_s_1">&nbsp;</td>
        <td id="term_5_w_1">&nbsp;</td>
        <td id="term_5_cc_1">&nbsp;</td>
        <td id="term_6_c_1">&nbsp;</td>
        <td id="term_6_k_1">&nbsp;</td>
        <td id="term_6_s_1">&nbsp;</td>
        <td id="term_6_w_1">&nbsp;</td>
        <td id="term_6_cc_1">&nbsp;</td>
        <td id="term_7_c_1">&nbsp;</td>
        <td id="term_7_k_1">&nbsp;</td>
        <td id="term_7_s_1">&nbsp;</td>
        <td id="term_7_w_1">&nbsp;</td>
        <td id="term_7_cc_1">&nbsp;</td>
        <td id="term_8_c_1">&nbsp;</td>
        <td id="term_8_k_1">&nbsp;</td>
        <td id="term_8_s_1">&nbsp;</td>
        <td id="term_8_w_1">&nbsp;</td>
        <td id="term_8_cc_1">&nbsp;</td>
      </tr>
      <tr>
        <td id="term_5_c_2">&nbsp;</td>
        <td id="term_5_k_2">&nbsp;</td>
        <td id="term_5_s_2">&nbsp;</td>
        <td id="term_5_w_2">&nbsp;</td>
        <td id="term_5_cc_2">&nbsp;</td>
        <td id="term_6_c_2">&nbsp;</td>
        <td id="term_6_k_2">&nbsp;</td>
        <td id="term_6_s_2">&nbsp;</td>
        <td id="term_6_w_2">&nbsp;</td>
        <td id="term_6_cc_2">&nbsp;</td>
        <td id="term_7_c_2">&nbsp;</td>
        <td id="term_7_k_2">&nbsp;</td>
        <td id="term_7_s_2">&nbsp;</td>
        <td id="term_7_w_2">&nbsp;</td>
        <td id="term_7_cc_2">&nbsp;</td>
        <td id="term_8_c_2">&nbsp;</td>
        <td id="term_8_k_2">&nbsp;</td>
        <td id="term_8_s_2">&nbsp;</td>
        <td id="term_8_w_2">&nbsp;</td>
        <td id="term_8_cc_2">&nbsp;</td>
      </tr>
      <tr>
        <td id="term_5_c_3">&nbsp;</td>
        <td id="term_5_k_3">&nbsp;</td>
        <td id="term_5_s_3">&nbsp;</td>
        <td id="term_5_w_3">&nbsp;</td>
        <td id="term_5_cc_3">&nbsp;</td>
        <td id="term_6_c_3">&nbsp;</td>
        <td id="term_6_k_3">&nbsp;</td>
        <td id="term_6_s_3">&nbsp;</td>
        <td id="term_6_w_3">&nbsp;</td>
        <td id="term_6_cc_3">&nbsp;</td>
        <td id="term_7_c_3">&nbsp;</td>
        <td id="term_7_k_3">&nbsp;</td>
        <td id="term_7_s_3">&nbsp;</td>
        <td id="term_7_w_3">&nbsp;</td>
        <td id="term_7_cc_3">&nbsp;</td>
        <td id="term_8_c_3">&nbsp;</td>
        <td id="term_8_k_3">&nbsp;</td>
        <td id="term_8_s_3">&nbsp;</td>
        <td id="term_8_w_3">&nbsp;</td>
        <td id="term_8_cc_3">&nbsp;</td>
      </tr>
      <tr>
        <td id="term_5_c_4">&nbsp;</td>
        <td id="term_5_k_4">&nbsp;</td>
        <td id="term_5_s_4">&nbsp;</td>
        <td id="term_5_w_4">&nbsp;</td>
        <td id="term_5_cc_4">&nbsp;</td>
        <td id="term_6_c_4">&nbsp;</td>
        <td id="term_6_k_4">&nbsp;</td>
        <td id="term_6_s_4">&nbsp;</td>
        <td id="term_6_w_4">&nbsp;</td>
        <td id="term_6_cc_4">&nbsp;</td>
        <td id="term_7_c_4">&nbsp;</td>
        <td id="term_7_k_4">&nbsp;</td>
        <td id="term_7_s_4">&nbsp;</td>
        <td id="term_7_w_4">&nbsp;</td>
        <td id="term_7_cc_4">&nbsp;</td>
        <td id="term_8_c_4">&nbsp;</td>
        <td id="term_8_k_4">&nbsp;</td>
        <td id="term_8_s_4">&nbsp;</td>
        <td id="term_8_w_4">&nbsp;</td>
        <td id="term_8_cc_4">&nbsp;</td>
      </tr>
      <tr>
        <td id="term_5_c_5">&nbsp;</td>
        <td id="term_5_k_5">&nbsp;</td>
        <td id="term_5_s_5">&nbsp;</td>
        <td id="term_5_w_5">&nbsp;</td>
        <td id="term_5_cc_5">&nbsp;</td>
        <td id="term_6_c_5">&nbsp;</td>
        <td id="term_6_k_5">&nbsp;</td>
        <td id="term_6_s_5">&nbsp;</td>
        <td id="term_6_w_5">&nbsp;</td>
        <td id="term_6_cc_5">&nbsp;</td>
        <td id="term_7_c_5">&nbsp;</td>
        <td id="term_7_k_5">&nbsp;</td>
        <td id="term_7_s_5">&nbsp;</td>
        <td id="term_7_w_5">&nbsp;</td>
        <td id="term_7_cc_5">&nbsp;</td>
        <td id="term_8_c_5">&nbsp;</td>
        <td id="term_8_k_5">&nbsp;</td>
        <td id="term_8_s_5">&nbsp;</td>
        <td id="term_8_w_5">&nbsp;</td>
        <td id="term_8_cc_5">&nbsp;</td>
      </tr>
      <tr>
        <td id="term_5_c_6">&nbsp;</td>
        <td id="term_5_k_6">&nbsp;</td>
        <td id="term_5_s_6">&nbsp;</td>
        <td id="term_5_w_6">&nbsp;</td>
        <td id="term_5_cc_6">&nbsp;</td>
        <td id="term_6_c_6">&nbsp;</td>
        <td id="term_6_k_6">&nbsp;</td>
        <td id="term_6_s_6">&nbsp;</td>
        <td id="term_6_w_6">&nbsp;</td>
        <td id="term_6_cc_6">&nbsp;</td>
        <td id="term_7_c_6">&nbsp;</td>
        <td id="term_7_k_6">&nbsp;</td>
        <td id="term_7_s_6">&nbsp;</td>
        <td id="term_7_w_6">&nbsp;</td>
        <td id="term_7_cc_6">&nbsp;</td>
        <td id="term_8_c_6">&nbsp;</td>
        <td id="term_8_k_6">&nbsp;</td>
        <td id="term_8_s_6">&nbsp;</td>
        <td id="term_8_w_6">&nbsp;</td>
        <td id="term_8_cc_6">&nbsp;</td>
      </tr>
      <tr>
        <td id="term_5_c_7">&nbsp;</td>
        <td id="term_5_k_7">&nbsp;</td>
        <td id="term_5_s_7">&nbsp;</td>
        <td id="term_5_w_7">&nbsp;</td>
        <td id="term_5_cc_7">&nbsp;</td>
        <td id="term_6_c_7">&nbsp;</td>
        <td id="term_6_k_7">&nbsp;</td>
        <td id="term_6_s_7">&nbsp;</td>
        <td id="term_6_w_7">&nbsp;</td>
        <td id="term_6_cc_7">&nbsp;</td>
        <td id="term_7_c_7">&nbsp;</td>
        <td id="term_7_k_7">&nbsp;</td>
        <td id="term_7_s_7">&nbsp;</td>
        <td id="term_7_w_7">&nbsp;</td>
        <td id="term_7_cc_7">&nbsp;</td>
        <td id="term_8_c_7">&nbsp;</td>
        <td id="term_8_k_7">&nbsp;</td>
        <td id="term_8_s_7">&nbsp;</td>
        <td id="term_8_w_7">&nbsp;</td>
        <td id="term_8_cc_7">&nbsp;</td>
      </tr>
      <tr>
        <td id="term_1_c_8">&nbsp;</td>
        <td id="term_1_k_8">&nbsp;</td>
        <td id="term_1_s_8">&nbsp;</td>
        <td id="term_1_w_8">&nbsp;</td>
        <td id="term_1_cc_8">&nbsp;</td>
        <td id="term_2_c_8">&nbsp;</td>
        <td id="term_2_k_8">&nbsp;</td>
        <td id="term_2_s_8">&nbsp;</td>
        <td id="term_2_w_8">&nbsp;</td>
        <td id="term_2_cc_8">&nbsp;</td>
        <td id="term_3_c_8">&nbsp;</td>
        <td id="term_3_k_8">&nbsp;</td>
        <td id="term_3_s_8">&nbsp;</td>
        <td id="term_3_w_8">&nbsp;</td>
        <td id="term_3_cc_8">&nbsp;</td>
        <td id="term_4_c_8">&nbsp;</td>
        <td id="term_4_k_8">&nbsp;</td>
        <td id="term_4_s_8">&nbsp;</td>
        <td id="term_4_w_8">&nbsp;</td>
        <td id="term_4_cc_8">&nbsp;</td>
      </tr>
      <tr>
        <td id="term_1_c_9">&nbsp;</td>
        <td id="term_1_k_9">&nbsp;</td>
        <td id="term_1_s_9">&nbsp;</td>
        <td id="term_1_w_9">&nbsp;</td>
        <td id="term_1_cc_9">&nbsp;</td>
        <td id="term_2_c_9">&nbsp;</td>
        <td id="term_2_k_9">&nbsp;</td>
        <td id="term_2_s_9">&nbsp;</td>
        <td id="term_2_w_9">&nbsp;</td>
        <td id="term_2_cc_9">&nbsp;</td>
        <td id="term_3_c_9">&nbsp;</td>
        <td id="term_3_k_9">&nbsp;</td>
        <td id="term_3_s_9">&nbsp;</td>
        <td id="term_3_w_9">&nbsp;</td>
        <td id="term_3_cc_9">&nbsp;</td>
        <td id="term_4_c_9">&nbsp;</td>
        <td id="term_4_k_9">&nbsp;</td>
        <td id="term_4_s_9">&nbsp;</td>
        <td id="term_4_w_9">&nbsp;</td>
        <td id="term_4_cc_9">&nbsp;</td>
      </tr>
      <tr>
        <td id="term_1_c_10">&nbsp;</td>
        <td id="term_1_k_10">&nbsp;</td>
        <td id="term_1_s_10">&nbsp;</td>
        <td id="term_1_w_10">&nbsp;</td>
        <td id="term_1_cc_10">&nbsp;</td>
        <td id="term_2_c_10">&nbsp;</td>
        <td id="term_2_k_10">&nbsp;</td>
        <td id="term_2_s_10">&nbsp;</td>
        <td id="term_2_w_10">&nbsp;</td>
        <td id="term_2_cc_10">&nbsp;</td>
        <td id="term_3_c_10">&nbsp;</td>
        <td id="term_3_k_10">&nbsp;</td>
        <td id="term_3_s_10">&nbsp;</td>
        <td id="term_3_w_10">&nbsp;</td>
        <td id="term_3_cc_10">&nbsp;</td>
        <td id="term_4_c_10">&nbsp;</td>
        <td id="term_4_k_10">&nbsp;</td>
        <td id="term_4_s_10">&nbsp;</td>
        <td id="term_4_w_10">&nbsp;</td>
        <td id="term_4_cc_10">&nbsp;</td>
      </tr>
      <tr>
        <td id="term_1_c_11">&nbsp;</td>
        <td id="term_1_k_11">&nbsp;</td>
        <td id="term_1_s_11">&nbsp;</td>
        <td id="term_1_w_11">&nbsp;</td>
        <td id="term_1_cc_11">&nbsp;</td>
        <td id="term_2_c_11">&nbsp;</td>
        <td id="term_2_k_11">&nbsp;</td>
        <td id="term_2_s_11">&nbsp;</td>
        <td id="term_2_w_11">&nbsp;</td>
        <td id="term_2_cc_11">&nbsp;</td>
        <td id="term_3_c_11">&nbsp;</td>
        <td id="term_3_k_11">&nbsp;</td>
        <td id="term_3_s_11">&nbsp;</td>
        <td id="term_3_w_11">&nbsp;</td>
        <td id="term_3_cc_11">&nbsp;</td>
        <td id="term_4_c_11">&nbsp;</td>
        <td id="term_4_k_11">&nbsp;</td>
        <td id="term_4_s_11">&nbsp;</td>
        <td id="term_4_w_11">&nbsp;</td>
        <td id="term_4_cc_11">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5"><table width="400" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="84">学期学时：</td>
            <td>&nbsp;</td>
            <td width="84">学期学分：</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td colspan="5"><table width="400" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="84">学期学时：</td>
            <td>&nbsp;</td>
            <td width="84">学期学分：</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td colspan="5"><table width="400" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="84">学期学时：</td>
            <td>&nbsp;</td>
            <td width="84">学期学分：</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td colspan="5"><table width="400" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="84">学期学时：</td>
            <td>&nbsp;</td>
            <td width="84">学期学分：</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="1600" height="40"border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="10"colspan="14">&nbsp;</td>
        </tr>
      <tr>
        <td width=69>总学时：</td>
        <td width="118">&nbsp;</td>
        <td  width=63>总学分：</td>
        <td width="114">&nbsp;</td>
        <td width="100">毕业设计题目：</td>
        <td width="272">&nbsp;</td>
        <td width="108">毕业设计成绩：</td>
        <td width="106">&nbsp;</td>
        <td width="65"> 填表人：</td>
        <td width="122">&nbsp;</td>
        <td width=54> 负责人： </td>
        <td width="135">&nbsp;</td>
        <td width="90">教务处 ：</td>
        <td width="184">&nbsp;&nbsp;年&nbsp;&nbsp;月&nbsp;&nbsp;日</td>
      </tr>
    </table></td>
  </tr>
</table>
<?php
for($i=1;$i<=8;$i++){
	if($i%2==0){$str="第二学期";}
	else {$str="第一学期";}
	echo "<script> showInfo('title_".$i."','".$grade."-".($grade+1).$str."')</script>";
	if($i%2==0)$grade++;
}
?>

<?php
	$grade=$info1['grade_code'];
	for($j=1;$j<=8;$j++)
	{
		if($j%2==0){$grade_term=$grade."2";}
		else {$grade_term=$grade."1";}
		echo $grade_term;
		$sql2=mysql_query("select c_longname,c_kind,c_week_hour,tb_score.c_credit,score,bk_score,ck_score 
		from tb_course_base,tb_score,tb_course2_term 
		where tb_course2_term.c_class='$s_class' and tb_course2_term.term='$grade_term' and tb_course_base.ID=tb_course2_term.cb_id and tb_score.c_id=tb_course2_term.ID and tb_score.s_id='$s_id';");
		$getinfo=mysql_fetch_array($sql2);
		$k=1;
		do
		{
			$longname=$getinfo["c_longname"];
			$kind=$getinfo["c_kind"];
			if($getinfo["bk_score"]==NULL){$score=$getinfo["score"];}
			elseif($getinfo["ck_score"]==NULL){$score=$getinfo["bk_score"];}
			else {$score=$getinfo["ck_score"];}
			$week=$getinfo["c_week_hour"];
			$credit=$getinfo["c_credit"];
			echo"<script> showInfo('term_".$j."_c_".$k."','".$longname."')</script>";
			echo"<script> showInfo('term_".$j."_k_".$k."','".$kind."')</script>";
			echo"<script> showInfo('term_".$j."_s_".$k."','".$score."')</script>";
			echo"<script> showInfo('term_".$j."_w_".$k."','".$week."')</script>";
			echo"<script> showInfo('term_".$j."_cc_".$k."','".$credit."')</script>";
			$k++;
		}while($getinfo=mysql_fetch_array($sql2));
    	if($j%2==0)$grade++;
	}
?>
 
<!--endprint-->
<input type="button" name="button" value="打印" onclick="doPrint()" />
</body>
</html>