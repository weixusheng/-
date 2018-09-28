<?php
session_start();
$t_no=$_SESSION["no"];
include("../../function/conn.php");
mysql_query("set names utf8");
$bsql=mysql_query("select t_name from tb_teacher_base where t_no='$t_no'");
$binfo=mysql_fetch_array($bsql);
$t_id=$binfo["t_name"];
$term = $_GET["term"];//接收年级键值
if($term!=""){//如果传递过来的不为空则执行
$gsql = mysql_query("select distinct cb_id from tb_course2_term where term='$term' and c_teacher='$t_id'");//查询班级符合属于上边传递过来的年级的字段
$ginfo=mysql_fetch_array($gsql);
$cb_id=$ginfo["cb_id"];
$sql="select c_longname,ID from tb_course_base where ID='$cb_id'";
$result = mysql_query($sql);//执行SQL查询语句
$result1="";
while($row=mysql_fetch_row($result)){//循环记录集
   $result1 .= $row[0]."**".$row[1]."-"; 
}  
}
$result0 = substr($result1,0,strlen($result1)-1);//消掉最后的"-"
echo $result0; //返回数据做回显
?>
 
 

