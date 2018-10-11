<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="../css/student.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        table tr td {
            text-align:center;
            font-size:14pt;
        }
		.bgc {
			background-color:#BCCCDD;
		}
    </style>
    <script language="javascript">
        function showInfo(target,Infos){
            document.getElementById(target).innerHTML = Infos;
        }
    </script>
</head>
<body class="bgc"> 
    <div  class="maintable" style="border:0px none;">   
    <?php 
		$s_id=$_GET["s_id"];
		include("../function/conn.php");
		$sql1=mysql_query("select value from tb_system where variable='can_chongxiu'");
		$info1=mysql_fetch_array($sql1);
		$sql2=mysql_query("select value from tb_system where variable='chongxiu_term'");
		$info2=mysql_fetch_array($sql2);
		if($info1["value"]==1){
		$term=substr($info2["value"],-1,1);
		?>  
			<form method="post" id="form1" name="form1" action=""  >
				<table width="80%" cellspacing="0" cellpadding="0" align="center" style="border:none;" border="0">
					<tr>
						<td style="border-bottom:none; border-left:none; border-top:none; border-right:none;">
                        <?php
                        $sql=mysql_query("select c_id,score,bk_score,s_term from tb_score where s_id='$s_id' and score<'65' and substr(s_term,-1,1)='$term';");
						if($sql!=false){
						$info=mysql_fetch_array($sql);
						?>
						<table width="100%" cellspacing="0" cellpadding="0" align="center" style="border:none;">
							<tr>
								<td id="<?php echo $ii;?>" colspan="4" style="border-bottom:none; border-left:none; border-top:none;border-right:none;"><?php echo $str1="你可以申请重修的科目:"?></td> 
							</tr>
							<tr>
								<td width="20%">课程编号</td>
								<td width="15%">开课学期</td>
								<td width="50%" >课程名称</td>
								<td width="15%">报名</td>
							</tr>
							<?php 
							do{
								if($info["score"]>=60){
								$c_id=$info['c_id'];
								$gsql=mysql_query("select tb_course_base.c_id,tb_course_base.c_longname,tb_course2_term.ID from tb_course_base,
	tb_course2_term where tb_course2_term.ID='$c_id' and tb_course_base.ID=tb_course2_term.cb_id");
								$ginfo=mysql_fetch_array($gsql);
							?>
							<tr>
								<td><?php echo $ginfo['c_id'];?> </td>
								<td><?php echo $info['s_term'];?></td>
								<td ><?php echo $ginfo['c_longname'];?></td>
								<?php
								$c_id=$ginfo['ID'];
								$tsql=mysql_query("select id from tb_chongxiu where s_id='$s_id' and c_id='$c_id'");
								?>
								<td><input type="checkbox" name="chongxiu1" 
								<?php  if($tsql!=false)
								{$tinfo=mysql_fetch_array($tsql); 																																																																																																						
								if($tinfo!=false) echo "checked=\"checked\"";} 
								?>  id="checkbox1"  value="<?php echo $ginfo['c_id']; ?>" 
								onclick="javascript:location.href='chongxiu1.php?s_id=<?php echo $s_id;?>&c_id=<?php echo $ginfo['ID']; ?>&term=<?php echo $info['s_term'];?>&chongxiu_term=<?php echo $info2["value"]; ?>'"/></td>
							</tr>
							<?php } 
							} while($info=mysql_fetch_array($sql));
							?>
						</table>
						<?php 
						$tsql=mysql_query("select c_id,s_term from tb_score where s_id='$s_id' and eff_score<'60' and substr(s_term,-1,1)='$term';");
						if($tsql!=false){
						?>
						<br />
						<br />
						<br />
						<table width="100%" cellspacing="0" cellpadding="0" style="border-bottom:none; border-left:none; border-top:none;border-right:none;">
						<tr>
						<td colspan="4" id="<?php echo $jj;?>"  style="border-bottom:none; border-left:none; border-top:none;border-right:none;"><?php echo $str2="你必须重修的科目： " ?></td>
						</tr>
						<tr>
						<td width="20%">课程编号</td>
						<td width="15%">开课学期</td>
						<td width="50%">课程名称</td>
						<td width="15%">报名</td>
						</tr>
						<?php
						$tinfo=mysql_fetch_array($tsql);
						if($tinfo['c_id']!='') {
						do{
						$c_id=$tinfo["c_id"];
						$ssql=mysql_query("select tb_course_base.c_id,tb_course_base.c_longname,tb_course2_term.ID from tb_course_base,
	tb_course2_term where tb_course2_term.ID='$c_id' and tb_course_base.ID=tb_course2_term.cb_id");
						$sinfo=mysql_fetch_array($ssql);
					   ?>
						<tr>
						<td><?php echo $sinfo['c_id']; ?> </td>
						<td><?php echo $tinfo['s_term'];?></td>
						<td><?php echo $sinfo['c_longname'];?></td>
						 <?php
						$zsql=mysql_query("select ID from tb_chongxiu where s_id='$s_id' and c_id='$c_id'",$conn);
						?>
						<td><input type="checkbox" name="chongxiu2"
						<?php  if($zsql!=false)
						{$zinfo=mysql_fetch_array($zsql); 																																																																																																						
						if($zinfo!=false) echo "checked=\"checked\"";} 
						?>  id="checkbox1"  value="<?php echo $sinfo['c_id']; ?>" 
						onclick="javascript:location.href='chongxiu1.php?s_id=<?php echo $s_id;?>&c_id=<?php echo $sinfo['ID']; ?>&term=<?php echo $tinfo['s_term'];?>&chongxiu_term=<?php echo $info2["value"]; ?>'"/></td>
						</tr>
						<?php } while($tinfo=mysql_fetch_array($tsql));}
						?>
						</table>
						</td>
					</tr>
					<?php }else echo "<div style='text-align:center;font-size:24px;font-weight:bolder;'>你没有必须重修的科目</div>";?>
				</table> 
			</form>
		<?php 
			}else echo "<div style='text-align:center;font-size:24px;font-weight:bolder;'>你没有可以重修的科目</div>";
		}else echo "<div style='text-align:center;font-size:24px;font-weight:bolder;'>现在不是重修时间</div>";
		?>
		</div><br />
<br />
<br />

</body>
</html>