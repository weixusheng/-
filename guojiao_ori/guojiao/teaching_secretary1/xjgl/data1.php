<?php
$class_name=$_GET["class_name"];
include("../../function/conn.php");
mysql_query("set names 'utf8'");
if($class_name!=""){
$sql = ("select distinct term from tb_course2_term where c_class='$class_name' order by term");
$result = mysql_query($sql);//执行SQL查询语句
$result1="";
while($row=mysql_fetch_row($result)){//循环记录集
   $result1 .= $row[0]."-"; 
}  
}
$result0 = substr($result1,0,strlen($result1)-1);//消掉最后的"-"
echo $result0; //返回数据做回显
?>