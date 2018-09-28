<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
<script>
function check(){
	var a=confirm("你确定这些学生不上此门课么？此操作不可返回！！！");
	if(a==false) return false;
	else return true;
	}
</script>
<title>无标题文档</title>
</head>

<body class="ziye_style">
<?php
include("../../function/conn.php");
if(isset($_POST["class_name"])==true){
$class=$_POST["class_name"];
$term=$_POST["term"];
$cb_id=$_POST["subject"];
}else{
	$class=$_GET["class"];
	$term=$_GET["term"];
	$cb_id=$_GET["cb_id"];
	}
$sql=mysql_query("select tb_s_information.s_name,tb_s_information.s_no,tb_s_information.now_class,tb_score.ID from tb_s_information,tb_score,tb_course2_term where tb_score.s_id=tb_s_information.ID and tb_score.c_id=tb_course2_term.ID and tb_score.s_term='$term' and tb_s_information.now_class='$class' and tb_course2_term.cb_id='$cb_id' order by tb_s_information.s_no;");
?>

<form action="culi.php" method="post" onsubmit="return check()">
<span style=" padding-left:0px;"><input name="" type="submit"  value="确定"/>&nbsp;&nbsp;&nbsp;<input name="" type="reset"  value="重置"/></span><br /><br />

<table width="620" border="0" cellspacing="0" cellpadding="0">
<caption><h3>学生选课表（注：选中为此学生不选择此门课）</h3></caption>
  <tr>
    <td>
        <table width="310" border="0" cellspacing="0" cellpadding="0">
          <tr align="center">
            <td width="70" style="border:solid 1px #000;">学号</td>
            <td width="70" style="border:solid 1px #000; border-left:none;">姓名</td>
            <td width="80" style="border:solid 1px #000; border-left:none;">班级</td>
            <td width="90" style="border:solid 1px #000; border-left:none;">是否不上此门课</td>
          </tr>
        <?php
        for($i=0;$i<30;$i++){
			$info=mysql_fetch_array($sql);
        ?>
          <tr align="center" height="25">
            <td style="border:solid 1px #000; border-top:none;">&nbsp;<?php echo $info["s_no"]; ?></td>
            <td style="border:solid 1px #000; border-top:none; border-left:none;">&nbsp;<?php echo $info["s_name"]; ?></td>
            <td style="border:solid 1px #000; border-top:none; border-left:none;">&nbsp;<?php echo $info["now_class"]; ?></td>
            <td style="border:solid 1px #000; border-top:none; border-left:none;">&nbsp;<?php if($info["now_class"]!=NULL) {?><input name="score_id[]" type="checkbox" value=<?php echo $info["ID"]; ?> /><?php } ?></td>
          </tr>
        <?php }
        ?>
        </table>
    </td>
    <td>
        <table width="340" border="0" cellspacing="0" cellpadding="0">
          <tr align="center">
            <td width="70" style="border:solid 1px #000; border-left:none;">学号</td>
            <td width="80" style="border:solid 1px #000; border-left:none;">姓名</td>
            <td width="100" style="border:solid 1px #000; border-left:none;">班级</td>
            <td width="90" style="border:solid 1px #000; border-left:none;">是否不上此门课</td>
          </tr>
        <?php
        for($i=0;$i<30;$i++){
		$info=mysql_fetch_array($sql);?>
          <tr align="center" height="25">
            <td style="border:solid 1px #000; border-top:none; border-left:none;">&nbsp;<?php echo $info["s_no"]; ?></td>
            <td style="border:solid 1px #000; border-top:none; border-left:none;">&nbsp;<?php echo $info["s_name"]; ?></td>
            <td style="border:solid 1px #000; border-top:none; border-left:none;">&nbsp;<?php echo $info["now_class"]; ?></td>
            <td style="border:solid 1px #000; border-top:none; border-left:none;">&nbsp;<?php if($info["now_class"]!=NULL) {?><input name="score_id[]" type="checkbox" value=<?php echo $info["ID"]; ?> /><?php } ?></td>
          </tr>
        <?php }
        ?>
        </table>
     </td>
  </tr>
</table>
<input name="term" type="hidden" value="<?php echo $term; ?>" />
<input name="class" type="hidden" value="<?php echo $class; ?>" />
<input name="cb_id" type="hidden" value="<?php echo $cb_id; ?>" />
<input name="s_no" type="hidden" value="<?php echo $info["s_no"]; ?>" />
</form>
</body>
</html>