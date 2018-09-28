<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
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
<table width="60%" border="1" cellspacing="0" cellpadding="0">
  <tr><caption>降级名单
  </caption>
  </tr>	
  <tr>
    <td align="center" width="18%">年级</td>
    <td align="center" width="20%">班级</td>
    <td align="center" width="25%">学号</td>
    <td align="center" width="20%">姓名</td>
    <td align="center" width="17%">未取得学分</td>
  </tr>
<?php
$j=0;
$sql=mysql_query("SELECT * FROM (
SELECT 
s_class,s_no,s_name,grade_code,
SUM(upload_credit-tm_credit) AS wxc 
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
AND down_term2 IS NOT NULL 
AND down_term1 IS NOT NULL 
AND term!=down_term2-9 
AND term!=down_term2-10
AND term!=down_term2-19 
AND term!=down_term2-20
) table1  
GROUP BY s_no) table2 
WHERE wxc>=16
");
$info=mysql_fetch_array($sql);
do{
$wxc=$info["wxc"];
?>
	<tr>
    	 <td align="center"><?php echo $info['grade_code']; ?>&nbsp;</td>
        <td align="center"><?php echo $info['s_class'];?>&nbsp;</td>
        <td align="center"><?php echo $info['s_no']; ?>&nbsp;</td>
        <td align="center"><?php echo $info['s_name'];?>&nbsp;</td>
        <td align="center"><?php  $j++;echo $wxc; ?>&nbsp;</td>
    </tr>
<?php 
}while($info=mysql_fetch_array($sql));
if($j==0){
echo "<tr><td align='center' colspan='5'>暂无降级名单<td><tr>";
}?>
</table>
</body>
</html>