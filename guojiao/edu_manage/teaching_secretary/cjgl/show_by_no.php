<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link type="text/css" rel="stylesheet" href="../../css/style.css">
<style>
body {
	font-size:14px;
	text-align:center;
	background-color:#CCCCCC;
}
.tdmenu{
	border-color:#06F;
}
table {
	border:0px solid;
	padding:0px;
	margin:0px;
}
 td {
	border:1px solid #06F;
}
</style>
<script>
function showpoint(termyear,point){
	var td=document.getElementById(termyear).innerHTML=point;
	
	}
</script>
</head>

<body class="bgc">
<?php
require '../../function/conn.php';
require '../../function/common.php';
$s_id=$_POST["s_no"];

?> 
<?php
	 $magor_sql=mysql_query("select tb_class.speciality,tb_s_information.ID from tb_class,tb_s_information where tb_s_information.s_no='$s_id' and tb_s_information.s_class=tb_class.class_name");
	 $magor_info=mysql_fetch_array($magor_sql);
	 $major=$magor_info["speciality"];
	 $s_info_id=$magor_info["ID"];
	 $term_sql=mysql_query("select term from stu_info where s_no='$s_id' group by term");		 
     $term_info=mysql_fetch_array($term_sql);
	 if($term_info!=false){ 
?>
<table width="98%" align="center" cellpadding="0" cellspacing="0" style="padding:0; margin:0;">
  <tr>
    <td width="100%" align="center" valign="top">
    <table width="100%" cellpadding="0" cellspacing="0" style="padding:0; margin:0" >
      <tr>
        <td width="8%">学年</td>
        <?php if($major=="电气工程及其自动化") {?><td width="7%">学年绩点</td><?php } ?>
        <td width="85%" style="border:none">
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="7%">学期 </td>
        <?php if($major=="电气工程及其自动化") {?><td width="8%">学期绩点</td><?php } ?>
                    <td width="85%" style="border:none">
                    	<table width="100%" cellpadding="0" cellspacing="0">
                			<tr>
                                <td width="11%" align="center">课程编号</td>
                                <td width="13%" align="center">课程名称</td>
                                <td width="10%">课程类别</td>
                                <td width="8%">总学分</td>
                                <td width="8%">总成绩</td>
                                <td width="10%">考试性质</td>
                                <td width="10%">考试状态</td>
                                <td width="10%">考试结果</td>
                                <td width="10%">评教状态</td>
                                <td width="10%">审核状态</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
         </td>
      </tr>
    </table>
  </td>
  </tr>
  <tr>
  	<td>
    <table width="100%" cellpadding="0" cellspacing="0" style="padding:0; margin:0;" >
 		<?php 
		    $count1=1;
		do{
			$count1++;
			$termyear=substr($term_info["term"],0,4);
		    $termyear1=(integer)$termyear+1;
			$termyear2=(string)$termyear1;
            $s_term=$term_info["term"];
		    ?> 
      	<tr>
        <?php if($count1%2==0){
				$point=0;
				$credit=0;
			 ?>
          <td width="8%" rowspan="2">&nbsp;<?php echo $termyear."-".$termyear2."学年"?></td>
           <?php if($major=="电气工程及其自动化") {?><td width="7%" rowspan="2" id="<?php echo $termyear; ?>">&nbsp;</td><?php }} ?>
          <td width="85%" colspan="12" style="border-bottom:none; border-left:none; border-top:none; border-right:none;">  
          <table width="100%" cellpadding="0" cellspacing="0" align="right">
             <tr>
              <td width="7%">&nbsp;<?php echo $term_info["term"]; ?></td> 
               <?php if($major=="电气工程及其自动化") {?><td width="8%">&nbsp;<?php
				$point_sql=mysql_query("select point,all_credit from tb_score_point where s_id='$s_info_id' and term='$s_term';");
				 if($point_sql==true){
				 	$point_info=mysql_fetch_array($point_sql);
					$credit+=number_format($point_info["all_credit"],2);
					$point+=number_format($point_info["point"],2)*number_format($point_info["all_credit"],2);
					echo number_format($point_info["point"],2);
					if($credit!=0){
					$year_point=number_format($point/$credit,2);
					}else{$year_point=(float)0.00;}
					echo "<script>showpoint(".$termyear.",".$year_point.");</script>";
				 }			    ?></td><?php } ?>
              <td width="85%"  style="border-bottom:none; border-left:none; border-top:none; border-right:none;">
             	 <table width="100%" cellpadding="0" cellspacing="0"  >
                 <?php 
				 chuli($s_term,$s_id,$major)
				 ?> 
                 </table>
              </td>
	          </tr>	
          </table>      
          </td>
        </tr>
        <?php } while($term_info=mysql_fetch_array($term_sql)); ?>
    </table>
  	</td>
  </tr>
</table>
<?php 
	}else{
		echo "暂无成绩！";
	}
?>

<?php
function chuli($s_term,$s_id,$major){
$getsql=mysql_query("select c_no,c_name,credit,score,exam_type,verify,bk_score,c_kind,bk_type,bk_verify,ck1_score,ck1_type,ck1_verify,ck2_score,ck2_type,ck2_verify,ck3_score,ck3_type,ck3_verify,evaluate from stu_info where s_no='$s_id' and term='$s_term' ;");		
$getinfo=mysql_fetch_array($getsql);
	do{
		if($getinfo["score"]!=NULL){
			$score=$getinfo["score"];
			if($major=="国际经济与贸易"){
			switch($score){
					case "95":$score="A";break;
					case "92":$score="A-";break;
					case "89":$score="B+";break;
					case "85":$score="B";break;
					case "82":$score="B-";break;
					case "79":$score="C+";break;
					case "75":$score="C";break;
					case "72":$score="C-";break;
					case "69":$score="D+";break;
					case "65":$score="D";break;
					case "0":$score="F";break;
					case "":$score="";break;	
				}
			}
			 ?>              
	<tr >
		<td width="11%">&nbsp;<?php echo $getinfo["c_no"]; ?></td>
		<td width="13%">&nbsp;<?php echo $getinfo["c_name"]; ?></td>
		<td width="10%">&nbsp;<?php echo $getinfo["c_kind"]; ?></td>
		<td width="8%">&nbsp;<?php echo $getinfo["credit"]; ?></td>
		<td width="8%">&nbsp;<?php echo $score; ?>
		</td>
        <td width="10%">正考</td>
        <td width="10%"><?php switch($getinfo["exam_type"]){
          case 0: echo "正常";break;
          case 1: echo "缓考";break;
          case 2: echo "缺考";break;
          case 3: echo "禁考";break;
        }?>
        </td>
        <td width="10%">&nbsp;<?php if($getinfo["evaluate"]==0) echo "未评教"; elseif($getinfo["score"]<60)echo "未通过";else echo "通过"; ?></td>
        <td width="10%">&nbsp;<?php if($getinfo["evaluate"]==1) echo "已评教"; else echo "未评教"; ?></td>
        <td width="10%">&nbsp;<?php if($getinfo["verify"]==1) echo "已审核"; else echo "未审核"; ?></td>
	</tr><?php    		
		}else{ 
		?> 
<!--<tr><td width="100%" height="100%" align="center" valign="middle" colspan="11">暂无成绩！</td></tr>-->
		<?php
		}
		if($getinfo["bk_score"]!=NULL){
			$score=$getinfo["bk_score"];
			if($major=="国际经济与贸易"){
			switch($score){
					case "95":$score="A";break;
					case "92":$score="A-";break;
					case "89":$score="B+";break;
					case "85":$score="B";break;
					case "82":$score="B-";break;
					case "79":$score="C+";break;
					case "75":$score="C";break;
					case "72":$score="C-";break;
					case "69":$score="D+";break;
					case "65":$score="D";break;
					case "0":$score="F";break;
					case "":$score="";break;	
				}
			}
			 ?>              
	<tr >
		<td width="11%">&nbsp;<?php echo $getinfo["c_no"]; ?></td>
		<td width="13%">&nbsp;<?php echo $getinfo["c_name"]; ?></td>
		<td width="10%">&nbsp;<?php echo $getinfo["c_kind"]; ?></td>
		<td width="8%">&nbsp;<?php echo $getinfo["credit"]; ?></td>
		<td width="8%">&nbsp;<?php echo $score; ?>
		</td>
        <td width="10%">补考</td>
        <td width="10%"><?php switch($getinfo["bk_type"]){
          case 0: echo "正常";break;
          case 1: echo "缓考";break;
          case 2: echo "缺考";break;
          case 3: echo "禁考";break;
        }?>
        </td>
        <td width="10%">&nbsp;<?php if($getinfo["evaluate"]==0) echo "未评教"; elseif($getinfo["bk_score"]<60)echo "未通过";else echo "通过"; ?></td>
        <td width="10%">&nbsp;<?php if($getinfo["evaluate"]==1) echo "已评教"; else echo "未评教"; ?></td>
        <td width="10%">&nbsp;<?php if($getinfo["bk_verify"]==1) echo "已审核"; else echo "未审核"; ?></td>
	</tr><?php    		
		}
		if($getinfo["ck1_score"]!=NULL){
			$score=$getinfo["ck1_score"];
			if($major=="国际经济与贸易"){
			switch($score){
					case "95":$score="A";break;
					case "92":$score="A-";break;
					case "89":$score="B+";break;
					case "85":$score="B";break;
					case "82":$score="B-";break;
					case "79":$score="C+";break;
					case "75":$score="C";break;
					case "72":$score="C-";break;
					case "69":$score="D+";break;
					case "65":$score="D";break;
					case "0":$score="F";break;
					case "":$score="";break;	
				}
			}

			 ?>              
	<tr >
		<td width="11%">&nbsp;<?php echo $getinfo["c_no"]; ?></td>
		<td width="13%">&nbsp;<?php echo $getinfo["c_name"]; ?></td>
		<td width="10%">&nbsp;<?php echo $getinfo["c_kind"]; ?></td>
		<td width="8%">&nbsp;<?php echo $getinfo["credit"]; ?></td>
		<td width="8%">&nbsp;<?php echo $score; ?>
		</td>
        <td width="10%">重修考试</td>
        <td width="10%"><?php switch($getinfo["ck1_type"]){
          case 0: echo "正常";break;
          case 1: echo "缓考";break;
          case 2: echo "缺考";break;
          case 3: echo "禁考";break;
        }?>
        </td>
        <td width="10%">&nbsp;<?php if($getinfo["evaluate"]==0) echo "未评教"; elseif($getinfo["ck1_score"]<60)echo "未通过";else echo "通过"; ?></td>
        <td width="10%">&nbsp;<?php if($getinfo["evaluate"]==1) echo "已评教"; else echo "未评教"; ?></td>
        <td width="10%">&nbsp;<?php if($getinfo["ck1_verify"]==1) echo "已审核"; else echo "未审核"; ?></td>
	</tr><?php    		
		}
		if($getinfo["ck2_score"]!=NULL){
			$score=$getinfo["ck2_score"];
			if($major=="国际经济与贸易"){
			switch($score){
					case "95":$score="A";break;
					case "92":$score="A-";break;
					case "89":$score="B+";break;
					case "85":$score="B";break;
					case "82":$score="B-";break;
					case "79":$score="C+";break;
					case "75":$score="C";break;
					case "72":$score="C-";break;
					case "69":$score="D+";break;
					case "65":$score="D";break;
					case "0":$score="F";break;
					case "":$score="";break;	
				}
			}

			 ?>              
	<tr >
		<td width="11%">&nbsp;<?php echo $getinfo["c_no"]; ?></td>
		<td width="13%">&nbsp;<?php echo $getinfo["c_name"]; ?></td>
		<td width="10%">&nbsp;<?php echo $getinfo["c_kind"]; ?></td>
		<td width="8%">&nbsp;<?php echo $getinfo["credit"]; ?></td>
		<td width="8%">&nbsp;<?php echo $score; ?>
		</td>
        <td width="10%">第二次重修考试</td>
        <td width="10%"><?php switch($getinfo["ck2_type"]){
          case 0: echo "正常";break;
          case 1: echo "缓考";break;
          case 2: echo "缺考";break;
          case 3: echo "禁考";break;
        }?>
        </td>
        <td width="10%">&nbsp;<?php if($getinfo["evaluate"]==0) echo "未评教"; elseif($getinfo["ck2_score"]<60)echo "未通过";else echo "通过"; ?></td>
        <td width="10%">&nbsp;<?php if($getinfo["evaluate"]==1) echo "已评教"; else echo "未评教"; ?></td>
        <td width="10%">&nbsp;<?php if($getinfo["ck2_verify"]==1) echo "已审核"; else echo "未审核"; ?></td>
	</tr><?php    		
		}
		if($getinfo["ck3_score"]!=NULL){
			$score=$getinfo["ck3_score"];
			if($major=="国际经济与贸易"){
			switch($score){
					case "95":$score="A";break;
					case "92":$score="A-";break;
					case "89":$score="B+";break;
					case "85":$score="B";break;
					case "82":$score="B-";break;
					case "79":$score="C+";break;
					case "75":$score="C";break;
					case "72":$score="C-";break;
					case "69":$score="D+";break;
					case "65":$score="D";break;
					case "0":$score="F";break;
					case "":$score="";break;	
				}
			}

			 ?>              
	<tr >
		<td width="11%">&nbsp;<?php echo $getinfo["c_no"]; ?></td>
		<td width="13%">&nbsp;<?php echo $getinfo["c_name"]; ?></td>
		<td width="10%">&nbsp;<?php echo $getinfo["c_kind"]; ?></td>
		<td width="8%">&nbsp;<?php echo $getinfo["credit"]; ?></td>
		<td width="8%">&nbsp;<?php echo $score; ?>
		</td>
        <td width="10%">第三次重修考试</td>
        <td width="10%"><?php switch($getinfo["ck3_type"]){
          case 0: echo "正常";break;
          case 1: echo "缓考";break;
          case 2: echo "缺考";break;
          case 3: echo "禁考";break;
        }?>
        </td>
        <td width="10%">&nbsp;<?php if($getinfo["evaluate"]==0) echo "未评教"; elseif($getinfo["ck3_score"]<60)echo "未通过";else echo "通过"; ?></td>
        <td width="10%">&nbsp;<?php if($getinfo["evaluate"]==1) echo "已评教"; else echo "未评教"; ?></td>
        <td width="10%">&nbsp;<?php if($getinfo["ck3_verify"]==1) echo "已审核"; else echo "未审核"; ?></td>
	</tr><?php    		
		}
	}while($getinfo=mysql_fetch_array($getsql));
}
?>
</body>
</html>