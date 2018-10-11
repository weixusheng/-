<?php
$subject=$_GET["subject"];
$grade=$_GET["grade"];
include("../function/conn.php");
mysql_query("set names 'utf8'");
if($grade!=""&$subject!=''){
$sql = ("select c_class from tb_course2_term where cb_id='$subject' and grade='$grade'");
$result = mysql_query($sql);//执行SQL查询语句
$result1="";
while($row=mysql_fetch_row($result)){//循环记录集
   $result1 .= $row[0]."-"; 
}  
}
$result0 = substr($result1,0,strlen($result1)-1);//消掉最后的"-"
echo $result0; //返回数据做回显
?>