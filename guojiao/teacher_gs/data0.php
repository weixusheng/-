<?php
$grade_code = $_GET["grade_code"];//接收年级键值
include("../../function/conn.php");
mysql_query("set names utf8");
if($grade_code!=""){//如果传递过来的不为空则执行
$sql = "select class_name from tb_class where grade_code='$grade_code' and graduate_flag='0'";//查询班级符合属于上边传递过来的年级的字段
$result = mysql_query($sql);//执行SQL查询语句
$result1="";
while($row=mysql_fetch_row($result)){//循环记录集
   $result1 .= $row[0]."-"; 
}  
}
$result0 = substr($result1,0,strlen($result1)-1);//消掉最后的"-"
echo $result1; //返回数据做回显
?>