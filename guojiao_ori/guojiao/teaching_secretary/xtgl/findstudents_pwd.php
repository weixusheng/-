<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body style="height:400px; text-align:center;width:550px;" class="ziye_style">
 <div style="padding-left:20px; height:35px; text-align:right">
        <form action="#" method="post" name="queryform" id="queryform">
          <input id="n_num" name="n_num" type="text" value="请输入要查询的学号"/>
          <input id="enter" name="enter" type="submit" value="查询" />    
        </form>
 </div>
<div style="width:550px; border-left:#FFF solid 2px; text-align:center; padding-left:10px">
<?php
include("../../function/conn.php");
if(isset($_POST['n_num'])) {
	$num0=$_POST['n_num'];
    $query_Recordset1 = "select * from  tb_s_password where no='$num0'";
	$Recordset1= mysql_query($query_Recordset1) ;
	$row_Recordset1 = mysql_fetch_array($Recordset1);
    $query_Recordset2 = "select * from  tb_s_information where s_no='$num0'";
	$Recordset2= mysql_query($query_Recordset2) ;
	$row_Recordset2 = mysql_fetch_array($Recordset2);
	
	}
else {
	$query_Recordset2="select * from tb_s_information where 1";
	$Recordset2=mysql_query($query_Recordset2);
	$row_Recordset2=mysql_fetch_array($Recordset2);
	}
	if($row_Recordset2['s_no']!=""){
		?>
    <table cellpadding="10" cellspacing="0" border="2" bordercolor="#CCCCCC" width="100%">
    <caption  style="font-size:16px; color: #333">学生信息</caption>
    <tr style="font-size:16px;">
     <td width="14%">学号</td>
     <td width="14%">姓名</td>
     <td width="14%">班级</td>
     <td width="20%">密码</td>
    </tr>
        <?php
		do{
		$no=$row_Recordset2['s_no'];
    $query_Recordset1 = "select * from  tb_s_password where no='$no'";
	$Recordset1= mysql_query($query_Recordset1) ;
	$row_Recordset1 = mysql_fetch_array($Recordset1);
	?>
    <tr  style="font-size:14px; color:#666">
     <td><?php echo $row_Recordset2['s_no'];?></td>
     <td><?php echo $row_Recordset2['s_name'];?></td>
     <td><?php echo $row_Recordset2['now_class'];?></td>
     <td><?php echo $row_Recordset1['pwd'];?></td>
    </tr>
   <?php
		}while($row_Recordset2 = mysql_fetch_array($Recordset2));
    }?>
    </table>
</div>
</body>
</html>