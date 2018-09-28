<?php session_start();  ?>
<?php
$grade_code = $_GET["grade_code"];
$t_no=$_SESSION["no"];
//接收年级键值
include("../../../function/conn.php");
mysql_query("set names utf8");
if($grade_code!=""){//如果传递过来的不为空则执行
$sql = ("select distinct tb_class.class_name from tb_class,tb_course2_term,tb_teacher_base where tb_class.graduate_flag='0' and tb_class.class_name=tb_course2_term.c_class and tb_course2_term.c_teacher=tb_teacher_base.t_name and tb_teacher_base.t_no='$t_no' and tb_class.grade_code='$grade_code'");//查询数据库年级
//查询班级符合属于上边传递过来的年级的字段
$result = mysql_query($sql);//执行SQL查询语句
$result1="";
while($row=mysql_fetch_row($result)){//循环记录集
   $result1 .= $row[0]."-"; 
}  
}
$result0 = substr($result1,0,strlen($result1)-1);//消掉最后的"-"
echo $result1; 
return $result1; //返回数据做回显
?>
 