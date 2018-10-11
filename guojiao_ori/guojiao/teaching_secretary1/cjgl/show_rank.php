<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
<title>无标题文档</title>
<style type="text/css">
.style {
	display:inline-block;
}
</style>
</head>

<body class="bgc" style="margin:20px;">
<?php
$grade=$_POST["grade"];
$major=$_POST["major"];
$term=$_POST["term"];
include("../../function/conn.php")
?>
<table border="1" cellspacing="0" cellpadding="0" width="70%">
<caption style="font-size:24px;"><?php echo $grade?>级&nbsp;&nbsp;<?php echo $major?>专业
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php foreach($term as $term1){ echo $term1."&nbsp;";}?>学期</caption>
 <tr>
    <th>学号</th><th>姓名</th><th>班级</th><th>绩点</th><th>排名</th>
 </tr>  
<?php 
	$i=1;
	$term2=implode(",",$term);
	$sql=mysql_query("select s_no,s_class,s_name,sum(point*upload_credit)/sum(upload_credit) as sum_point from jiangji where term in($term2) and grade_code='$grade' and major='$major' group by s_no order by sum_point desc");
	$info=mysql_fetch_array($sql);
	do {	
?>
  <tr align="center">
    <td width="20%"><?php echo $info['s_no']?></td>
    <td width="20%"><?php echo $info['s_name'] ?></td>
    <td width="20%"><?php echo $info['s_class']?></td>
    <td width="20%"><?php echo number_format($info['sum_point'],2)?></td>
    <td width="20%"><?php echo $i?></td>
  </tr>
    <?php 
	$i++;
	}while($info=mysql_fetch_array($sql))
	?>
</table>
</body>  
</html>