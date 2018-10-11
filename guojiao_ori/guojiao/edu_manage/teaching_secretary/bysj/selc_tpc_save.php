<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
<title>无标题文档</title>
</head>

<body class="bgc">
 <?php
  date_default_timezone_set("PRC");$year=date("Y");
  include("../../function/conn.php");
  $s_no=$_POST["s_no"];
  $tpc=$_POST["tpc"];
  $sql=mysql_query("select s_name from tb_s_information where s_no='$s_no'");
  $info=mysql_fetch_array($sql);
  $s_name=$info["s_name"];
  mysql_query("insert into gra_tpc_selection(s_no,graduation_date,tpc_id) values('$s_no',$year,'$tpc')");
  mysql_query("update graduation_design set selcd_num=selcd_num+1 where ID='$tpc'");
  echo "<script>location.href='selc_tpc.php?s_name=".$s_name."'</script>";
 ?>
</body>
</html>