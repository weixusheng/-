<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script language="javascript">
function showInfo(target,Infos){
    document.getElementById(target).innerHTML = Infos;
	}
</script>

</head>
<body bgcolor="#EEF2FB" style="height:100%; padding:0; margin:0; padding-top:8px;">
<?php
		include("../function/conn.php");
		$id=$_GET["id"];
		$sql=mysql_query("select value from tb_system where variable='pingjiao_term'");
		$info=mysql_fetch_array($sql);
		$term=$info['value'];
		
?> 
	<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#EEF2FB">
		<tr valign="top">
			<td width="100%">
				<form id="form1" name="form1" method="post" action="">
					<table width="100%" height="25" border="0" cellpadding="0"cellspacing="0">
					  <tr bgcolor="#EEF2FB">
						<td width="23%" align="right">课程选择</td>
						<td width="60%" align="left">
						<?php
	                      
							$gsql=mysql_query("select tb_course_base.c_longname,tb_course2_term.c_teacher,tb_course2_term.ID from tb_course2_term,tb_course_base,tb_s_information where tb_course_base.ID=tb_course2_term.cb_id and tb_course2_term.term='$term' and tb_course2_term.c_class=tb_s_information.s_class and tb_s_information.ID='$id'");
							$bsql=mysql_query("select tb_course_base.c_longname,tb_course2_term.c_teacher,tb_course2_term.ID from tb_course2_term,tb_course_base,tb_s_information where tb_course_base.ID=tb_course2_term.cb_id and tb_course2_term.term='$term' and tb_course2_term.c_class=tb_s_information.s_class and tb_s_information.ID='$id'");
							$binfo=mysql_fetch_array($bsql);

						?>
						   <select name="select"  onchange="window.location=this.value" > 
                             <option>请选择科目</option>
						   <?php
						   //$k=0;
						   while($ginfo=mysql_fetch_array($gsql)){  $c_id=$ginfo['ID'];?>
                             <?php
							 $ksql=mysql_query("select ID from tb_evaluate where c_id='$c_id' and s_id='$id' and term='$term'"); 
							 $kinfo=mysql_fetch_array($ksql);
							 if($kinfo==false){
 ?>						   <option  value="pingjiao1.php?c_id=<?php echo $c_id?>&id=<?php echo $id;?>&term=<?php echo $term;?>" target="window">
						   <?php echo $ginfo['c_longname'];?>|<?php echo $ginfo['c_teacher'];?>| <?php echo"未评"?></option>
						   <?php
							 }}
                           	 do{ 
							 $c_id=$binfo['ID'];
							 ?>
                             <?php
							 $ksql=mysql_query("select ID from tb_evaluate where c_id='$c_id' and s_id='$id' and term='$term' order by c_id"); 
							 $kinfo=mysql_fetch_array($ksql);
							 if($kinfo!=false){
 ?>						   <option  value="pingjiao1.php?c_id=<?php echo $c_id?>&id=<?php echo $id;?>&term=<?php echo $term;?>" target="window">

						   <?php echo $binfo['c_longname'];?>|<?php echo $binfo['c_teacher'];?>|<?php echo"已评"?></option>
						   <?php
						   
							 }}while($binfo=mysql_fetch_array($bsql));
						   ?>

						  </select>
						 </td>
                     <?php /*?> <!-- <td width="17%" align="left" id="<?php echo $sum;?>">总分:<?php  if($sum_evaluate==0)echo "0分";else echo $sum_evaluate."分";?></td>--><?php */?>
					  </tr>
					</table>
					<iframe  src="blank.php" width="100%" scrolling="auto" height="650" marginheight="0" frameborder="0" name="window" style="background-color:#0099FF">
					</iframe>
				</form>
			</td>
		</tr>
	</table>
</body>
</html>
