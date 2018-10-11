<?php
include("function/conn.php");
$sql=mysql_query("select class_name from tb_class where graduate_flag='0'");
$info=mysql_fetch_array($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<form action="no_pj_list.php" method="post">
<select name="class_name">
<?php
do{
?>
<option value="<?php echo $info["class_name"];?>"><?php echo $info["class_name"];?></option>
<?	
}while($info=mysql_fetch_array($sql));
?>
</select>
<input type="submit" value="查询" />
</form>
</body>
</html>