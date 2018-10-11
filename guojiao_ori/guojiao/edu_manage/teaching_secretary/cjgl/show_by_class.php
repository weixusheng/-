<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
<style type="text/css">
 td{
	 text-align:center;
	 }
</style>
<script type="text/javascript" language="javascript">
	function showInfo(target,Infos){
		document.getElementById(target).innerHTML = Infos;
	}

	function getvalue(I,J){
		for(i=1;i<=3;i++){
			sumscore=0;
			sumcredit=0;
			for(j=4;j<=J;j++){
				a=document.getElementById("td_"+i+"_"+j).innerHTML;
				if(a==null||a=="")a=0;
				else a=parseFloat(a);
				if(isNaN(a))a=0;
				if(a<60)a=0;
				b=parseFloat(document.getElementById("a_"+j).innerHTML);
				alert(a);
				sumscore=sumscore+a*b;
				sumcredit=sumcredit+b;
			}
			averscore=sumscore/sumcredit;
			alert(averscore);
			document.getElementById("td_"+i+"_a").innerHTML=averscore;
		}
}
</script>
<title>无标题文档</title>
</head>
<body class="bgc">
<?php
include("../../function/conn.php");
$grade=$_POST["grade_code"];	
 $term=$_POST["term"];
$class=$_POST["class_name"];
$sql0=mysql_query("select count(ID) as count from tb_course2_term where c_class='$class' and term='$term'");
$info0=mysql_fetch_array($sql0);
$hsql=mysql_query("select count(ID) as count from tb_s_information where now_class='$class'");
$hinfo=mysql_fetch_array($hsql);
?>
<table border="1" bordercolor="#000000" cellspacing="0" cellpadding="0" width="100%">
<caption>经济管理学院<?php echo $class; ?>班学生成绩</caption>
<tr>
<td width="6%">学期</td>
<td width="7%">班级</td>
<td width="8%">学号</td>
<td width="5%">姓名</td>
<?php
	for($j=4;$j<$info0["count"]+4;$j++) {
?>
        <td width="5%" id="<?php echo "td_0_".$j ?>">&nbsp;</td>
    <?php 
	}
	 ?>
    <td width="63%">平均学分绩点</td>
</tr>
<?php

for($i=1;$i<$hinfo['count']+1;$i++)
	{
?>
	<tr>
    	<td id="<?php echo "td_".$i.'_0' ?>"><?php echo $term;?>&nbsp;</td>
        <td id="<?php echo "td_".$i.'_1' ?>"><?php echo $class;?>&nbsp;</td>
        <td id="<?php echo "td_".$i.'_2' ?>"></td>
        <td id="<?php echo "td_".$i.'_3' ?>"></td>
		<?php
		for($j=4;$j<$info0["count"]+4;$j++) {
		?>
        <td id="<?php echo "td_".$i."_".$j ?>" width="4%"></td>
    	<?php 
		}
		?>
        <td id="<?php echo 'td_'.$i.'_a'; ?>">&nbsp;</td>
	</tr>
    <?php
	}
	    $i=0;
		$stu_id=array();
		$sql1=mysql_query("select ID,s_no,s_name from tb_s_information where s_class='$class'");
		$info1=mysql_fetch_array($sql1);
		do{
			$stu_id[$i]=$info1["ID"];
			$i++;
			$s_no=$info1["s_no"];
		    $s_name=$info1["s_name"];
			echo "<script>showInfo('td_".$i."_2','".$s_no."&nbsp;"."');</script>";
			echo "<script>showInfo('td_".$i."_3','".$s_name."&nbsp;"."');</script>";
			
		}while($info1=mysql_fetch_array($sql1));
		$w=$i;
		$sql2=mysql_query("select ID,cb_id from tb_course2_term where c_class='$class' and term='$term'");
	 	$info2=mysql_fetch_array($sql2);
		
	    $j=4;
		do {
		$c_id=$info2["ID"];
		$cb_id=$info2["cb_id"];
		$sql22=mysql_query("select c_shortname from tb_course_base where ID='$cb_id'");
	 	$info22=mysql_fetch_array($sql22);
	 	$c_name=$info22["c_shortname"];
		
		echo "<script>showInfo('td_"."0_".$j."','".$c_name."');</script>";
		$i=0;
		$n=1;
		for($i=0;$i<$w;$i++){
			 $s_idd=$stu_id[$i];
			$sql3=mysql_query("select score,bk_score,ck1_score from tb_score where c_id='$c_id' and s_id='$s_idd'");
            $info3=mysql_fetch_array($sql3);
		    $score=$info3["score"];
		    $bk_score=$info3["bk_score"];
		    $ck_score=$info3["ck1_score"];
			if($ck_score!='')
				$e_score=$ck_score;
			else {if($bk_score!='')
					$e_score=$bk_score;
					else $e_score=$score;
			}
			if(substr($class,0,3)=="经"){
				if($e_score>=95) $e_score="A";
				elseif($e_score>=92) $e_score="A-";
				elseif($e_score>=89) $e_score="B+";
				elseif($e_score>=85) $e_score="B";
				elseif($e_score>=82) $e_score="B-";
				elseif($e_score>=79) $e_score="C+";
				elseif($e_score>=75) $e_score="C";
				elseif($e_score>=72) $e_score="C-";
				elseif($e_score>=69) $e_score="D+";
				elseif($e_score>=65) $e_score="D";
				elseif($e_score=='0')   $e_score="F";
				else $e_score='';
				}
			echo "<script>showInfo('td_".$n."_".$j."','".$e_score."&nbsp;"."');</script>";
			$sql=mysql_query("select point from tb_score_point where s_id='$s_idd' and term='$term'");
            $info=mysql_fetch_array($sql);
            $point=$info["point"];
		    echo "<script>showInfo('td_".$n."_a','".$point."');</script>";
			$n++;
		}
		$j++;
	}while($info2=mysql_fetch_array($sql2));
	$n=1;
?>
</table>
<?php 
echo "<br>";
echo "<br>";
?>


</body>
</html>
