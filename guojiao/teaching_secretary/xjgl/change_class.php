<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" language="javascript">
function check(){
	if(form1.s_no.value==''){
		alert('请输入学号');
		form1.s_no.focus();
		return false;
	}
}
</script>
<script language="javascript">



 function display(ii)
{ 
 if(ii=='4')
 {
	if($class1="") 
	{
		 for (i=0;i<4;i++)
    {
      document.all("tb" + i).style.display="";//显示
    }
		}
		else
		{
			for (i=0;i<4;i++)
    {
      document.all("tb" + i).style.display="";//显示
    }
			}
  
  }
  else
  {
	  for (i=0;i<4;i++)
    {
      document.all("tb" + i).style.display="none";//显示
	  
    }
	 
	  }
}

</script>
<link type="text/css" href="../../css/style.css" rel="stylesheet" />
<style type="text/css">
table tr {
	height:25px;
}
</style>
</head>


<body class="ziye_style" onload="form1.s_no.focus()">
<form name="form1" action="change_class.php" method="post" onsubmit="return check()">
请输入学号：<input name="s_no" type="text" />
<input type="submit" value="查找" name="button1" />
</form>





<?php
if(isset($_POST['s_no'])){
	$s_no=$_POST['s_no'];
	include('../../function/conn.php');
	$sql=mysql_query("select s_name,s_class,stu_status ,class1,class2 from tb_s_information where s_no='$s_no'");
	$info=mysql_fetch_array($sql);
	$s_name=$info['s_name'];
	$s_class=$info['s_class'];
	$stu_status=$info['stu_status'];
	$class1=$info['class1'];
	$class2=$info['class2'];
	
?>
<form name="form2" action="change_class_save.php?s_no=<?php echo $s_no;?>" method="post" style="display:inline;">
<table width="312" height="170" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="98" align="right">学号：</td>
<td width="214" align="left"><?php echo $s_no;?></td>
</tr>
<tr>
<td align="right">姓名：</td>
<td align="left"><?php echo $s_name;?></td>
</tr>
<tr>
  <td align="right">学籍状态：</td>
  <td align="left"><label for="stu_status"></label>
   <!-- <select name="stu_status" id="stu_status"  >-->
<!--  <select name="stu_status" id="stu_status" onchange="setChange(this.value)">   
--> 
<select name="stu_status" id="stu_status" 
onchange="display(this.value)" style=" width:100px">
    <option value="0" <?php if (!(strcmp("0", $stu_status))) {echo "selected=\"selected\"";} ?>>－－正常－－</option>
      <option value="1" <?php if (!(strcmp("1", $stu_status))) {echo "selected=\"selected\"";} ?>>－－出国－－</option>
      <option value="2" <?php if (!(strcmp("2", $stu_status))) {echo "selected=\"selected\"";} ?>>－－退学－－</option>
      <option value="3" <?php if (!(strcmp("3", $stu_status))) {echo "selected=\"selected\"";} ?>>－－休学－－</option>
      <option value="4" <?php if (!(strcmp("4", $stu_status))) {echo "selected=\"selected\"";} ?>>－－降级－－</option>
      </select></td>
</tr>
<tr>
  <td colspan="2">
  <table width="310" border="0"id="contentTable" >
    <tr id="tb0" <?php if($stu_status!=4)echo "style='display:none'"?>>
      <td width="96" align="right">原班级：</td>
<td width="204" align="left"><?php if($class1=='') echo $s_class; else if($class1!=''&&$class2=='') echo $class1;else echo($class2) ;?></td>
    </tr>
    <tr id="tb1" <?php if($stu_status!=4)echo "style='display:none'"?>>
      <td align="right">新班级：</td>
<td align="left">   
 <select name="s_class" style=" width:100px">
  <option selected="selected">--请选择--</option>
	<?php
    $sql1=mysql_query("select ID,class_name from tb_class where graduate_flag=0");
    $info1=mysql_fetch_array($sql1);
    do{
    ?>
    <option value="<?php echo $info1['ID'];?>" <?php if(!strcmp($info1['class_name'],$s_class))?> >
	<?php echo $info1['class_name'];?>
    </option>
    <?php
    }while($info1=mysql_fetch_array($sql1));
    ?>
 </select>
</td>
    </tr>
     <tr id="tb2" <?php if($stu_status!=4)echo "style='display:none'"?>>
      <td width="96" align="right">降级学期：</td>
<td width="204" align="left">
<!--<select name="down_term" style="display:inline;">
  <option selected="selected">--请选择--</option>
	<?php
    $sql1=mysql_query("select ID,term from tb_term " );
    $info1=mysql_fetch_array($sql1);
    do{
    ?>
    <option value="<?php echo $info1['term'];?>" >
	<?php echo $info1['term'];?></option>
    <?php
    }while($info1=mysql_fetch_array($sql1));
    ?>
 </select>-->
 <?php $term=date("Y")?>
 <select name="down_term" style=" width:100px">
  <option selected="selected">--请选择--</option>
  <?php for($i=0;$i<5;$i++){
    for($j=1;$j<=2;$j++){
?>
   <option value="<?php echo $term-$i.$j?>"><?php echo $term-$i.$j?></option>
  <?php } }  ?>
   
	 
 </select>
 

</td>
    </tr> 
    
  </table></td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="right"><input type="submit" value="保存" style="display:block; margin-top:10px; position: fixed;"/></td>
</tr>
</table>
</form>
<?php
}
?>

</body>
</html>