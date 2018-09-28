<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/style.css" rel="stylesheet" type="text/css" /> 
<title>无标题文档</title>
</head>
<body class="bgc">
<?php
require '../function/conn.php';
require '../function/common.php';
$s_no=$_GET["s_no"];
mysql_query("set names utf8");
$sql=mysql_query("select * from tb_s_information where s_no='$s_no'");
$row=mysql_fetch_array($sql); 
?> 
<form id="form1" name="form1" method="post" action="xixin2.php" onclick="return checkform1()" >  
  <table width="843" height="208" border="1" cellpadding="0" cellspacing="0">
  <tr><td colspan="4" align="center" height="40px">学生个人信息</td>
  </tr>
    <tr>
      <td width="105" height="40px" align="right">学号：</td>
      <td width="308"><?php echo $row['s_no'];?>
      </td>
      <td colspan="2" rowspan="5" style="padding-left:105px"><label for="textfield"></label>
      <img src="stu_pic/<?php echo $row['pic_path'];?>" width="175px" height="175px" />
     </td> 
    </tr>
    <tr>
      <td height="40px" align="right">姓名：</td>
      <td><?php echo $row['s_name'];?></td>
    </tr>
    <tr>
      <td height="40px" align="right" >性别：</td>
      <td>
            <?php  echo $row["s_sex"];?>
      </td>
    </tr>
     <tr>
      <td height="40px" align="right">当前班级：</td>
      <td><?php echo $row['now_class'];?></td>
    </tr>
    <tr>
      <td height="40px" align="right">出生年月日：</td>
      <td><?php echo $row['s_birthday'];?></td>
    </tr>
  
    <tr>
      <td height="40px" align="right">身份证号：</td>
      <td>
      <?php echo $row["s_id_card"];?></td>
      <td width="122" height="40px" align="right">银行卡号：</td>
      <td width="298">
     <?php echo $row["bank_num"];?></td>
    </tr>
    <tr>
      <td height="40px" align="right">籍贯：</td>
      <td>
      <?php echo $row['s_home'];?>
      <td height="40px" align="right">入学时间：</td>
      <td>
     <?php echo $row['s_entrance_date'];?></td>
    </tr>
    <tr>
      <td height="40px" align="right">民族：</td>
      <td><?php echo $row['nation'];?></td>
      <td height="40px" align="right">是否为龙舟队：</td>
      <td>
      <?php  if($row["is_dragon"]=="0"){echo "是";}else{ echo "否";}?>
         </td>
    </tr>
    <tr>
      <td height="35px" align="right">政治面貌：</td>
      <td>
     <?php echo $row["s_politics"];?>
            </td>
      <td height="35px" align="right">毕业证号：</td>
      <td><?php echo $row['gra_num'];?></td>
    </tr>
    <tr>
      <td height="40px" align="right">学籍状态：</td>
      <td> <?php  if($row['stu_status']=="0"){echo "正常";}else if($row['stu_status']=="1") { echo "退学";}
	  else if($row["stu_status"]=="2") { echo "出国";}?></td>
      <td height="40px" align="right">毕业标志：</td>
      <td> <?php  if($row['s_graduate']=="0"){echo "未毕业";}else if($row['s_graduate']=="1") { echo "已毕业";}else if($row['s_graduate']=="2") { echo "毕业无学位";}?></td>
    <tr>
  </table>
  
</form>
</body>
</html>
