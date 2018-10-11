<?php session_start();  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" href="../../css/style.css" rel="stylesheet" />
<title>无标题文档</title>
<?php  
		include("../../function/conn.php");
		$t_no=$_SESSION["no"];
		$term=$_POST["term"];
	    $subject=$_POST["subject"];
      	$gsql=mysql_query("select avg(sum_evaluate),avg(c1),avg(c2),avg(c3),avg(c4),avg(c5),avg(c6),avg(c7),avg(c8),avg(c9),avg(c10),avg(c11),avg(c12),avg(c13),count(ID) from
 tb_evaluate where c_id in(select ID from tb_course2_term where  cb_id='$subject' and term='$term' and c_teacher in(select t_name from tb_teacher_base where t_no='$t_no'))",$conn);
      $ginfo=mysql_fetch_array($gsql);
	  $gsqll=mysql_query("select t_name from tb_teacher_base where t_no='$t_no'",$conn);
	  $ginfoo=mysql_fetch_array($gsqll);
			$type01=$ginfo["avg(c1)"];
			$type02=$ginfo["avg(c2)"];
			$type03=$ginfo["avg(c3)"];
			$type04=$ginfo["avg(c4)"];
			$type05=$ginfo["avg(c5)"];
			$type06=$ginfo["avg(c6)"];
			$type07=$ginfo["avg(c7)"];
			$type08=$ginfo["avg(c8)"];
			$type09=$ginfo["avg(c9)"];
			$type010=$ginfo["avg(c10)"];
			$type011=$ginfo["avg(c11)"];
			$type012=$ginfo["avg(c12)"];
			$type013=$ginfo["avg(c13)"];
			$type014=$ginfo["avg(sum_evaluate)"];
			$type015=$ginfo["count(ID)"];
			$type016=$ginfoo["t_name"];
 ?>
</head>
<body class="bgc">
<div align="center">
  <form id="form1" name="form1" method="post"  action="">
    <table width="1000" border="1" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="3"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="145">教师姓名：<?php echo $type016;?></td>
            <td align="right">评教人数：<?php echo $type015;?></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td width="104">一级指标</td>
        <td width="568">二级指标</td>
        <td width="320">成绩等级</td>
      </tr>
      <tr>
        <td rowspan="3"><div align="center">教材处理</div></td>
        <td><p align="center" >知识、能力、价值观目标是否明确，教学目的是否符合《课程标准》的要求和学生实际，知识技能、能力培养、思想教育的要求是否明确、恰当、可行。</p></td>
        <td align="center"><?php 	echo number_format($type01,2);	?></td>           				   
      </tr>
      <tr>
        <td><p align="center" >是否体现教学目标，知识讲解是否具有科学性、系统性，是否做到理论联系实际，教材的理解与处理是否具有科学性。</p></td>
        <td align="center"><?php 	echo number_format($type02,2);	?></td>
      </tr>
      <tr>
        <td><p align="center" >教学安排的循序渐进性、层次分明性、系统完整性、密切适中性如何。</p></td>
        <td align="center"><?php  echo number_format($type03,2);	?></td>
      </tr>
      <tr>
        <td rowspan="2"><div align="center">教学基本功</div></td>
        <td><p align="center" >教学语言是否清晰、准确、简练、通俗、生动、逻辑严谨。</p></td>
        <td align="center"><?php 	echo number_format($type04,2);	?></td>
      </tr>
      <tr>
        <td><p align="center" >板书设计是否具有科学性，是否工整、完美、简明、扼要，条理清楚。</p></td>
        <td align="center"><?php 	echo number_format($type05,2);	?></td>
      </tr>
      <tr>
        <td rowspan="4"><div align="center">教学方法</div></td>
        <td><p align="center" >方法选择是否灵活多样，是否与教学目的和教学内容相适应，是否与学生的年龄特征相适应，课堂教学机智如何。</p></td>
        <td align="center"><?php 	echo number_format($type06,2);	?></td>
      </tr>
      <tr>
        <td><p align="center" >是否以教师讲解为主，学生的课堂主体性体现的如何，教学原则的选择是否科学合理，符合学生的实际。</p></td>
        <td align="center"><?php 	echo number_format($type07,2);	?></td>
      </tr>
      <tr>
        <td><p align="center" >教师的课上各环节讲、练、演示、板书及主次内容的时间分配是否合理，能否做到精讲多练，加强能力培养。</p></td>
        <td align="center"><?php 	echo number_format($type08,2);	?></td>
      </tr>
      <tr>
        <td><p align="center" >是否有意识、恰当的运用生动的实例激发学生的学习动机，培养学生的学习兴趣，提高教学效率。</p></td>
        <td align="center"><?php 	echo number_format($type09,2);	?></td>
      </tr>
      <tr>
        <td rowspan="4"><div align="center">教学效果</div></td>
        <td><p align="center" >课堂上教师能否及时掌握学生的反馈信息，并采取相应的调控措施进行教学。</p></td>
        <td align="center"><?php 	echo number_format($type010,2);	?></td>
      </tr>
      <tr>
        <td><p align="center" >课堂秩序是否活而不乱，秩序井然。</p></td>
        <td align="center"><?php 	echo number_format($type011,2);	?></td>
      </tr>
      <tr>
        <td><p align="center" >学生是否认真听讲，积极思考，大胆发言，学习积极性是否被充分调动起来。</p></td>
        <td align="center"><?php 	echo number_format($type012,2);	?></td>
      </tr>
      <tr>
        <td height="40"><p align="center" >基础好、中、差学生是否各尽其智，各有所获，均衡提高。学生对本节课的知识、技能掌握的程度如何，能力发展程度如何。</p></td>
        <td align="center"><?php 	echo number_format($type013,2);	?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td height="40" align="center">&nbsp;</td>
        <td align="center">总分：<?php echo number_format($type014,2);?></td>
      </tr>
    </table>
  </form>
</div>
</body>
</html>