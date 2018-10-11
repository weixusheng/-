<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/style.css" rel="stylesheet" type="text/css" /> 
<title>无标题文档</title>
</head>
<script language="javascript">
function checkform1() {
	if(document.form1.s_no.value=="")
	{
		alert("请输入学号");
		document.form1.s_no.focus();
		return false;
	}
	if(document.form1.s_name.value=="")
	{
		alert("请输入姓名");
		document.form1.s_name.focus();
		return false;
	}
	if(document.form1.s_sex.value=="")
	{
		alert("请选择性别");
		document.form1.s_sex.focus();
		return false;
	}
	if(document.form1.s_birthday.value=="")
	{
		alert("请选择出生年月日");
		document.form1.s_birthday.focus();
		return false;
	}
	if(document.form1.s_id_card.value=="")
	{
		alert("请输入身份证号");
		document.form1.s_id_card.focus();
		return false;
	}
	if(document.form1.now_class.value=="")
	{
		alert("请填写班级");
		document.form1.now_class.focus();
		return false;
	}
	if(document.form1.s_home.value=="")
	{
		alert("请填写籍贯");
		document.form1.s_home.focus();
		return false;
	}
	if(document.form1.s_entrance_date.value=="")
	{
		alert("请输入入学日期");
		document.form1.s_entrance_date.focus();
		return false;
	}
	if(document.form1.bank_num.value=="")
	{
		alert("请输入银行卡号");
		document.form1.bank_num.focus();
		return false;
	}
}
</script>

<body class="bgc">
<?php
require '../function/conn.php';
require '../function/common.php';
$s_no=$_SESSION["no"];
mysql_query("set names utf8");
$sql=mysql_query("select * from tb_s_information where s_no='$s_no'");
$row=mysql_fetch_array($sql); 
?> 
<form id="form1" name="form1" method="post" action="xinxi2.php" onsubmit="return checkform1()">  
  <table width="843" height="208" border="1" cellpadding="0" cellspacing="0">
  <tr><td colspan="4" align="center" height="40px">学生个人信息</td>
  </tr>
    <tr>
      <td width="105" height="40px" align="right">学号：</td>
      <td width="308">
      <input  class="selectstyle" type="text"  disabled="disabled" name="s_no" id="s_no" value="<?php echo $row['s_no'];?>"/>
      *</td>
      <td colspan="2" rowspan="5" style="padding-left:105px"><label for="pic_path"></label>
     
      <img name="pic_path" src="stu_pic/<?php echo $row['pic_path'];?>" width="175px" height="175px" />
     </td> 
    </tr>
    <tr>
      <td height="40px" align="right">姓名：</td>
      <td>
      <input class="selectstyle" type="text" name="s_name" id="s_name" value="<?php echo $row['s_name'];?>" />
      *</td>
    </tr>
    <tr>
      <td height="40px" align="right" >性别：</td>
      <td>
      <select name="s_sex" id="s_sex" class="selectstyle">
        <option value="男" <?php if (!(strcmp("男", $row["s_sex"]))) {echo "selected=\"selected\"";} ?>>－－男－－</option>
        <option value="女" <?php if (!(strcmp("女", $row["s_sex"]))) {echo "selected=\"selected\"";} ?>>－－女－－</option>
           </select>
      *</td>
    </tr>
     <tr>
      <td height="40px" align="right">班级：</td>
      <td>
      <input class="selectstyle" type="text" name="now_class" id="now_class" value="<?php echo $row['now_class'];?>" disabled="disabled"/></td>
    </tr>
    <tr>
      <td height="40px" align="right">出生年月日：</td>
      <td>
      <input  class="selectstyle" type="text" name="s_birthday" id="s_birthday" value="<?php echo $row['s_birthday'];?>"/></td>
    </tr>
  
    <tr>
      <td height="40px" align="right">身份证号：</td>
      <td>
      <input  class="selectstyle" type="text" name="s_id_card" id="s_id_card" value="<?php echo $row['s_id_card'];?>" />
      *</td>
      <td width="119" height="40px" align="right">银行卡号：</td>
      <td width="301">
      <input  class="selectstyle" type="text" name="bank_num" id="bank_num"value="<?php echo $row['bank_num'];?>" /></td>
    </tr>
    <tr>
      <td height="40px" align="right">籍贯：</td>
      <td>
      <input  class="selectstyle" type="text" name="s_home" id="s_home" value="<?php echo $row['s_home'];?>"/>
      *</td>
      <td height="40px" align="right">入学时间：</td>
      <td>
      <input  class="selectstyle" type="text" name="s_entrance_date"  disabled="disabled" id="s_entrance_date" value="<?php echo $row['s_entrance_date'];?>" /></td>
    </tr>
    <tr>
      <td height="40px" align="right">民族：</td>
      <td>
      <input  class="selectstyle" type="text" name="nation" disabled="disabled" id="nation" value="<?php echo $row['nation'];?>" /></td>
      <td height="40px" align="right">是否为龙舟队：</td>
      <td><select name="is_dragon"  disabled="disabled" id="is_dragon" class="selectstyle">
      <option value="1" <?php if (!(strcmp(1, $row["is_dragon"]))) {echo "selected=\"selected\"";} ?>>－－是－－</option>
      <option value="0" <?php if (!(strcmp(0, $row["is_dragon"]))) {echo "selected=\"selected\"";} ?>>－－否－－</option>
          </select></td>
    </tr>
    <tr>
      <td height="35px" align="right">政治面貌：</td>
          <td>
         <select name="s_politics" id="s_politics" disabled="disabled" class="selectstyle" >
         <option value="" <?php if (!(strcmp("", $row["s_politics"]))) {echo "selected=\"selected\"";} ?>>－－群众－－</option>
           <option value="共青团员"  <?php if (!(strcmp("共青团员", $row["s_politics"]))) {echo "selected=\"selected\"";} ?>>－－共青团员－－    </option>
         <option value="中共预备党员" <?php if (!(strcmp("中共预备党员", $row["s_politics"]))) {echo "selected=\"selected\"";} ?>>－－中共预备党员－－
         </option>
         <option value="共产党员" <?php if (!(strcmp("共产党员", $row["s_politics"]))) {echo "selected=\"selected\"";} ?>>－－共产党员－－
         </option>
        </select>
           </td>
      <td height="35px" align="right">毕业证号：</td>
      <td>
        <input  class="selectstyle" type="text" name="gra_num" disabled="disabled" id="gra_num" value="<?php echo $row['gra_num'];?>"/></td>
    </tr>
    <tr>
          <td height="40px" align="right">学籍状态：</td>
            <td>
               <select name="stu_status" id="stu_status"  disabled="disabled" class="selectstyle" >
                      <option value="0"  <?php if (!(strcmp(0, $row["stu_status"]))) {echo "selected=\"selected\"";} ?>>－－正常－－
                      </option>
                      <option value="1" <?php if (!(strcmp(1, $row["stu_status"]))) {echo "selected=\"selected\"";} ?>>－－退学－－
                      </option>
                      <option value="2" <?php if (!(strcmp(2, $row["stu_status"]))) {echo "selected=\"selected\"";} ?>>－－出国－－
                     </option>
                 </select> 
              </td>
      <td height="40px" align="right">毕业标志：</td>
      <td>
     <select name="s_graduate" id="s_graduate" disabled="disabled" class="selectstyle" >
         <option value="0"  <?php if (!(strcmp(0, $row["s_graduate"]))) {echo "selected=\"selected\"";} ?>>－－未毕业－－
          </option>
         <option value="1" <?php if (!(strcmp(1, $row["s_graduate"]))) {echo "selected=\"selected\"";} ?>>－－已毕业－－
          </option>
         <option value="2" <?php if (!(strcmp(2, $row["s_graduate"]))) {echo "selected=\"selected\"";} ?>>－－毕业无学位－－
          </option>
      </select></td>
    <tr>
    <input name="s_no" type="hidden" value="<?php echo $s_no;?>" />
        <td></td> <td><input name="submit1" type="submit" value="保存" /></td>
    </tr>
  </table>
</form>
</body>
</html>