<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
<title>无标题文档</title>
</head>

<body class="ziye_style">
<form name="form1" method="post" action="update_topic.php">
<table width="90%" align="center" border="1" cellpadding="0" cellspacing="0">
<tr>
	<td>学号</td>
    <td>姓名</td>
    <td>班级
        <select name="class" onchange="form1.submit()">
            <option value="">全部</option>
            <?php
				include("../../function/conn.php");
                $sql0=mysql_query("select distinct class from graduation_design");
                $info0=mysql_fetch_array($sql0);
                do{
            ?>
                    <option value="<?php echo $info0['class']?>" <?php if(isset($_POST['class'])&&$_POST['class']==$info0['class']) echo "selected='selected'"?>><?php echo $info0['class']?></option>
            <?php
                }while($info0=mysql_fetch_array($sql0));
            ?>
        </select>
    </td>
    <td>题目</td>
    <td>指导教师</td>
    <td>修改</td>
</tr>
<?php
if(isset($_POST['class'])&&$_POST['class']!=''){
	$select_class=$_POST['class'];
	$sql1=mysql_query("select * from graduation_design where class='$select_class'");
}else{
	$sql1=mysql_query("select * from graduation_design");
}
$info1=mysql_fetch_array($sql1);
do {
?>
<tr>
	<td><?php echo $info1['s_no'];?></td>
    <td><?php echo $info1['s_name'];?></td>
    <td><?php echo $info1['class'];?></td>
    <td width="60%"><?php echo $info1['grd_dsg'];?></td>
    <td><?php echo $info1['t_name'];?></td>
    <td><a href="update_topic_save.php?s_no=<?php echo $info1['s_no']?>">修改</a></td>
</tr>
<?php
}while($info1=mysql_fetch_array($sql1));
?>
</table>
</form>
<br />
<br />
</body>
</html>