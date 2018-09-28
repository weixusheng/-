<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../css/style.css" rel="stylesheet" type="text/css"/>
<script language="javascript" type="text/javascript">
function tijiao(){
	 document.forms[0].submit(); 
	}
</script>
</head>

<body class="bgc" style="padding:10px;">
<?php
include("../function/conn.php");
date_default_timezone_set('PRC');
$by_year=date("Y")-4;
$sql=mysql_query("select class_name from tb_class where grade_code='$by_year' and graduate_flag='0';");
?>
<form action="input_bk.php" method="post" id="tijiao">
    <table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><select name="class" onchange="tijiao()">
          		<option value="0">--请选择班级--</option>
                <?php
				$class="";
                while($info=mysql_fetch_array($sql)){
				echo "<option value='$info[class_name]'>--$info[class_name]--</option>";					
				}
				?>
        	</select>
        </td>
      </tr>
    </table>
</form>
</body>
</html>