<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link type="text/css" rel="stylesheet" href="../../css/style.css">
</head>

<body class="ziye_style">
<?php
 include("../../function/conn.php");
  date_default_timezone_set("PRC");
				$year=date("Y");
				$mon=date("m");
				if($mon>8 || $mon<3){
					$grade=$year-1;
					$warn_term=$grade."2";
				}
				else {
					$grade=$year;
					$warn_term=$grade."1";
				}
?>
<table width="470" border="1" cellspacing="0" cellpadding="0">
<caption>东北电力大学经济管理学院学业警告名单</caption>
  <tr>
    <td width="60" align="center">学期</td>
    <td width="70" align="center">学号</td>
    <td width="100" align="center">班级</td>
    <td width="100" align="center">姓名</td>
    <td width="80" align="center">未修满学分</td>
  </tr>
  <?php
  $sql=mysql_query("
SELECT * FROM tb_class,(
SELECT 
s_class,s_no,s_name,
SUM(upload_credit-tm_credit) AS cha 
FROM (
SELECT *
FROM 
jiangji  
WHERE stu_status!=4

UNION

SELECT * 
FROM 
jiangji 
WHERE 
stu_status=4 
AND down_term2  IS NULL 
AND down_term1 IS NOT NULL 
AND term!=down_term1-9 
AND term!=down_term1-10

UNION

SELECT * 
FROM 
jiangji 
WHERE 
stu_status=4 
AND down_term2  IS NOT NULL 
AND down_term1 IS NOT NULL 
AND term!=down_term2-9 
AND term!=down_term2-10
AND term!=down_term2-19 
AND term!=down_term2-20
) table1  
GROUP BY s_no) table2 
WHERE cha>0  AND tb_class.class_name=s_class AND tb_class.graduate_flag='0' 
");
  if($sql==true){
  $info=mysql_fetch_array($sql);
  if($info["s_no"]!=""){
	  do{
  ?>
  <tr>   
	<td align="center"><?php echo $warn_term; ?>&nbsp;</td>
    <td align="center"><?php echo $info["s_no"]; ?>&nbsp;</td>
    <td align="center"><?php echo $info["s_class"]; ?>&nbsp;</td>
    <td align="center"><?php echo $info["s_name"]; ?>&nbsp;</td>
    <td align="center"><?php echo $info["cha"]; ?>&nbsp;</td>
  </tr>
	   <?php }while($info=mysql_fetch_array($sql));
	 
  }else {?>
  <tr><td colspan="5" align="center">无学业警告名单</td></tr>
  <?php }
  }?>
  </table>
</body>
</html>