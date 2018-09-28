<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../../css/style.css" />
<title>无标题文档</title>
</head>

<body class="ziye_style">
<table width="200" border="1" cellspacing="0" cellpadding="0">
	<tr>
    	<th>年级</th>
        <th>班级</th>
        <th>注销</th>
    </tr>
<?php
include("../../function/conn.php");
$sql=mysql_query("select distinct grade_code from tb_class order by grade_code desc limit 5");
$info=mysql_fetch_array($sql);
do {
	$gsql=mysql_query("select * from tb_class where grade_code='$info[grade_code]'");
	$ginfo=mysql_fetch_array($gsql);
	do {
		$grade=$ginfo["grade_code"];
		$class=$ginfo["class_name"];
		$id=$ginfo["ID"];
		$grad=$ginfo["graduate_flag"];
?>
	<tr align="center">
		<td><?php echo $grade?></td>
		<td><?php echo $class?></td>
        <td>
              <input <?php if (!(strcmp($grad,1))) {echo "checked=\"checked\"";} ?> type="Checkbox" name="graduate" value="<?php echo $grad ;?>" id="graduate" onclick="location.href='change_bjzx.php?graduate=<?php echo $grad ;?>&id=<?php echo $id?>'" />
        </td>
    </tr>
<?php		
		}while($ginfo=mysql_fetch_array($gsql));
}while($info=mysql_fetch_array($sql));
 ?>
 </table>
</body>
</html>