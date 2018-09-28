<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link type="text/css" rel="stylesheet" href="../../css/style.css">
<script type="text/javascript">
/********
*定义创建XMLHttpRequest对象的方法
*
**************************************/
var xmlHttp = false;
try {
	xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
	try {
		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	} catch (e2) {
		xmlHttp = false;
	}
}
if (!xmlHttp && typeof XMLHttpRequest != 'undefined') {
	xmlHttp = new XMLHttpRequest();
}
/***************
*判断服务器响应的事件，如果返回是4则说明交互完成，判断标示头，
*/
function queryteaname(t_id,target){//执行程序查询，查询城市的
var url='data.php?t_id='+t_id+'&n='+Math.random();//设定URL传值方法同时防止缓存
xmlHttp.open("GET",url,true);//建立服务器连接，异步传输true
xmlHttp.onreadystatechange=function() {
	if(xmlHttp.readyState==4)
		{//4说明是执行交互完毕0 (未初始化)1 (正在装载)2 (装载完毕) 3 (交互中)4 (完成)
		   if(xmlHttp.status==200)
		   {//http的一个报头说明成功找到
				var a = xmlHttp.responseText;
				document.getElementById(target).innerHTML=a;
		   }
		}
};//处理这个响应所需要的函数
xmlHttp.send(null);//执行程序函数这里的中间的参数是因为GET原因
}
</script>




</head>
<?php 
include("../../function/conn.php");
$num=0;
?>
<body  class="ziye_style">
<form action="chose_tea_save.php" method="post">
<table border="1" bordercolor="#000000" cellspacing="0" cellpadding="0">
  <tr align="center">
    <td>重修学期</td>
    <td>重修课目</td>
    <td>课程编号</td>
    <td>上课学期</td>
    <td>填入教师工号</td>
    <td>教师信息</td>
  </tr>
  <?php
  $sql=mysql_query("select ID,c_id,chongxiu_term,term from tb_chongxiu where cx_teacher is NULL or cx_teacher=''");
  $info=mysql_fetch_array($sql);
  if($info!=false) {
  do {
	  $id=$info['ID'];
	  $c_id=$info["c_id"];
	  $c_term=$info["chongxiu_term"];
	  $term=$info["term"];
	  mysql_query("insert into selc_tea_ls(id,c_id,c_term,term) values($id,$c_id,$c_term,$term)");
	  }while($info=mysql_fetch_array($sql));
	  $gsql=mysql_query("select cb_id from tb_course2_term where ID in(select c_id from selc_tea_ls) group by cb_id");
	  $ginfo=mysql_fetch_array($gsql);
	  do {
		$num=$num+1;
		$cb_id=$ginfo['cb_id'];
		$hsql=mysql_query("select c_id,c_longname from tb_course_base where ID='$cb_id'");
		$hinfo=mysql_fetch_array($hsql);
		$class_name=$hinfo["c_longname"];
?>
  <tr align="center">
    <td><?php echo $c_term;?></td>
    <td><?php echo $class_name;?></td>
    <td><?php echo $hinfo['c_id'];?></td>
    <td><?php echo $term;?></td>
    <td><input name="<?php echo 't_no'.$num ?>" width="80" type="text" onblur="queryteaname(this.value,this.name)"/><input name="<?php echo 'ID'.$num ?>" type="hidden" value="<?php echo $cb_id?>" /></td>
    <td><span id="<?php echo 't_no'.$num ?>"></span></td>
  </tr>	
<?php
  }while($ginfo=mysql_fetch_array($gsql));
  }
	else {
?>
<tr>
	<td colspan="5" align="center">没有需要选择重修教师的科目</td>
</tr>
<?php }?>
<tr>
	<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
    <td><input name="max" type="hidden" value="<?php echo $num?>" /><input name="" type="submit" value="保存"/></td>
</tr>
</table>
</form>
</body>
</html>