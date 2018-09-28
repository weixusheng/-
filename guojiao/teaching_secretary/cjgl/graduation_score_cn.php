<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link type="text/css" rel="stylesheet" href="../../css/style.css">
<style type="text/css" media="all">
* {
	font-size:11pt;
}
#main_title {
	font-size:12pt;
	font-weight:bold;
	padding-left:40px;
	padding-top:10px;
}
#main_table {
	border:1px solid #000;
}
#table_1 {
	border:1px solid #000;
}
.xueqi_title {
	border-bottom:1px solid;
}
.xueqi_bottom {
	border-top:1px solid;
	text-align:center;
}
.td_class1 {
	border-bottom:1px solid;
	border-right:1px solid;
}
.td_class2 {
	border-bottom:1px solid;
}
.td_class3 {
	border-right:1px solid;
}
</style>
<style type="text/css" media="print">
.none_style {
	display:none;
}
* {
	background-color:#FFF;
	font-size:8pt;
}
.print_style {
	width:900px;
}
.prit_height {
	height:13px;
}
</style>
<script type="text/javascript" language="javascript">
function showInfo(target,Infos){
    document.getElementById(target).innerHTML = Infos;
}

function print0(){
	window.print() ;
}

</script>
</head>
<?php
$s_no=$_GET["s_no"];
require '../../function/conn.php';

function cleanString($str,$start,$len) {
$tmpstr = "";
$strlen = $start + $len;
for($i = 0; $i < $strlen; $i++) {
if(ord(substr($str, $i, 1)) > 0xa0) {
$tmpstr .= substr($str, $i, 2);
	$i++;
} else
$tmpstr .= substr($str, $i, 1);
}
if(strlen($str)>$len){
	return $tmpstr."..";
}
else {
	return $str;
}
}

$sql=mysql_query("select ID,s_name,s_sex,now_class,nation from tb_s_information where s_no='$s_no'");
$info=mysql_fetch_array($sql);
$s_id=$info["ID"];
$s_name=$info["s_name"];
$s_sex=$info["s_sex"];
$now_class=$info["now_class"];
$ID=$info["ID"];
$sql1=mysql_query("select speciality,grade_code from tb_class where class_name='$now_class';");
$info1=mysql_fetch_array($sql1);
$speciality=$info1["speciality"];
$grade=$info1['grade_code'];
$nation=$info['nation'];
$sql0=mysql_query("select gra_num from  tb_s_information where s_no='$s_no'");
$info0=mysql_fetch_array($sql0);
$grd_num=$info0['gra_num'];
$gsql=mysql_query("select grd_dsg,score from graduation_design where s_no='$s_no'");
$ginfo=mysql_fetch_array($gsql);
$topic_name=$ginfo['grd_dsg'];
$grd_des_score=$ginfo['score'];

?> 
<body class="bgcc">
    <table border="0" cellpadding="0" cellspacing="0" width="1500" class="print_style">
      <tr>
      	<td>
           <table width="100%" height="90" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" colspan="2" width="15%" >学号：<?php echo $s_no; ?></td>
                <td width="13%" colspan="2">姓名：<?php echo $s_name; ?></td>
                <td width="60%" align="left" colspan="6" rowspan="2" id="main_title" valign="top">东北电力大学&nbsp;&nbsp;学生总成绩单</td>
              </tr>
              <tr>
                <td width="15%" colspan="2">民族：<?php echo $nation;?></td>
                <td width="18%" colspan="2">性别：<?php echo $s_sex; ?></td>
              </tr>
              <tr>
                <td width="15%" colspan="2">行政班级：<?php echo $now_class; ?></td>
                <td width="18%" colspan="2">专业：<?php echo $speciality; ?></td>
                <td width="10%" colspan="2">院系：经济管理学院</td>
                <td width="6%" colspan="2"><!--学位：经济学学士--></td>
                <td width="25%" colspan="2"><!--毕业证号：--><?php /*echo $grd_num;*/?></td>
              </tr>
            </table>
        </td>
      </tr>
      <tr>
      	<td valign="top">
        	<table width="100%" cellpadding="0" cellspacing="0" id="main_table"> 
            	<tr>
            	<?php
					$all_all_xueshi=0;
					$all_all_xuefen=0;
                    $grade=$info1['grade_code'];
					/*$sql3=mysql_query("select sum(c_week_hour),sum(credit),
		from tb_course2_term where c_class='$now_class' and cb_id=214");
				    $getinfo3=mysql_fetch_array($sql3);
				    $hour1=$getinfo3["sum(c_week_hour)"];
				
				    $sql4=mysql_query("select sum(c_week_hour),sum(credit),
		from tb_course2_term where c_class='$now_class' and cb_id=215");
					$getinfo4=mysql_fetch_array($sql4);
					$hour2=$getinfo4["sum(c_week_hour)"];
					
					$sql5=mysql_query("select sum(c_week_hour),sum(credit),
		from tb_course2_term where c_class='$now_class' and cb_id=216");
					$getinfo5=mysql_fetch_array($sql5);
					$hour3=$getinfo5["sum(c_week_hour)"];*/
				
                    for($j=1;$j<=8;$j++)
                    {
						
						$all_xueshi=0;
						$all_xuefen=0;
                ?>
               		<td valign="top" width="25%">
                    <table width="100%" height="100%" cellpadding="0" cellspacing="0" id="table_1">
                    <tr><td colspan="5" align="center" id="title_<?php echo $j;?>" class="xueqi_title"></td></tr>
                    <tr>
                    	<td width="57%" align="center" class="td_class1">课&nbsp;&nbsp;程&nbsp;&nbsp;名&nbsp;&nbsp;称</td>
                        <td width="13%" align="center" class="td_class1">类别</td>
                        <td width="10%" align="center" class="td_class1">成绩</td>
                        <td width="10%" align="center" class="td_class1">学时</td>
                        <td width="10%" align="center" class="td_class2">学分</td>
                    </tr>
                <?php     
						if($j%2==0){$grade_term=$grade."2";}
                        else {$grade_term=$grade."1";}
                        
						if($j==1){
				$sql2=mysql_query("select distinct c_longname,c_kind,c_week_hour,tb_score.c_credit,eff_score,tb_course_base.ID
				from tb_course_base,tb_score,tb_course2_term 
				where tb_course2_term.c_class='$now_class' and tb_course2_term.term='$grade_term' and tb_course_base.ID=tb_course2_term.cb_id and tb_score.c_id=tb_course2_term.ID and tb_score.s_id='$s_id' and tb_course2_term.cb_id not in(214,215,216);");}//在第一列屏蔽掉英语三级三门课
						else if($j==3){
				$sql2=mysql_query("select distinct c_longname,c_kind,c_week_hour,tb_score.c_credit,eff_score,tb_course_base.ID
				from tb_course_base,tb_score,tb_course2_term 
				where tb_course2_term.c_class='$now_class' and tb_course2_term.term='$grade_term' and tb_course_base.ID=tb_course2_term.cb_id and tb_score.c_id=tb_course2_term.ID and tb_score.s_id='$s_id' and  tb_course2_term.cb_id not in(106);");}//第三列屏蔽创业就业教育
				    else
					{
				$sql2=mysql_query("select distinct c_longname,c_kind,c_week_hour,tb_score.c_credit,eff_score,tb_course_base.ID
				from tb_course_base,tb_score,tb_course2_term 
				where tb_course2_term.c_class='$now_class' and tb_course2_term.term='$grade_term' and tb_course_base.ID=tb_course2_term.cb_id and tb_score.c_id=tb_course2_term.ID and tb_score.s_id='$s_id' ;");
						}
                        for($k=1;$k<=17;$k++)
                        {
				?>
                	<tr valign="top" height="16" class="prit_height">
                    	<td id="<?php echo "term_".$j."_c_".$k;?>" class="td_class3">&nbsp;</td>
                        <td id="<?php echo "term_".$j."_k_".$k;?>" class="td_class3">&nbsp;</td>
                        <td id="<?php echo "term_".$j."_s_".$k;?>" class="td_class3">&nbsp;</td>
                        <td id="<?php echo "term_".$j."_w_".$k;?>" class="td_class3">&nbsp;</td>
                        <td id="<?php echo "term_".$j."_cc_".$k;?>">&nbsp;</td>
                <?php			
					$getinfo=mysql_fetch_array($sql2);
					//var_dump($getinfo);
					$cb_id=$getinfo["ID"];
					$longname=$getinfo["c_longname"];
					$kind=$getinfo["c_kind"];
					$score=$getinfo["eff_score"];
					$week=$getinfo["c_week_hour"];			
					$credit=$getinfo["c_credit"];
					
							
						if($j==2 && ($cb_id==214)){//在第二列插入英语三级的总学时学分
			  				$week='66';
			  				$credit='3';	
						}
						if($j==2 && ($cb_id==216||$cb_id==215)){
							$week='88';
							$credit='4';	
						}
						if($j==6 && ($cb_id==107)){//在第六列插入创业就业教育的总学时学分
		
				  			$week='18';
				  			$credit='1';	
						}
					$all_xueshi+=$week;
					$all_xuefen+=$credit;		
							
							
							if($speciality=='国际经济与贸易')
							{
								$score66='';
								switch($score){
									case 95:$score66='A';break;
									case 92:$score66='A-';break;
									case 89:$score66='B+';break;
									case 85:$score66='B';break;
									case 82:$score66='B-';break;
									case 79:$score66='C+';break;
									case 75:$score66='C';break;
									case 72:$score66='C-';break;
									case 69:$score66='D+';break;
									case 65:$score66='D';break;
									case '0':$score66='F';break;
								}
								$score=$score66;
								$score66='';
							}
							
							
                            echo"<script> showInfo('term_".$j."_c_".$k."','&nbsp;".cleanString($longname,0,36)."')</script>";
                            echo"<script> showInfo('term_".$j."_k_".$k."','&nbsp;".$kind."')</script>";
                            echo"<script> showInfo('term_".$j."_s_".$k."','&nbsp;".$score."')</script>";
                            echo"<script> showInfo('term_".$j."_w_".$k."','&nbsp;".$week."')</script>";
                            echo"<script> showInfo('term_".$j."_cc_".$k."','&nbsp;".$credit."')</script>";
				?>
                    </tr>
                 <?php
                        };
                        if($j%2==0)$grade++;
				?>
                    <tr>
                    	<td colspan="5" id="tail_<?php echo $j;?>" class="xueqi_bottom">学期学时：<?php echo $all_xueshi;?>学期学分：<?php echo $all_xuefen;?></td>
                    </tr>
                    </table>
                    </td>
                <?php
                    if($j==4)echo "</tr><tr valign='top'  height='16'>";
					$all_all_xueshi+=$all_xueshi;
					$all_all_xuefen+=$all_xuefen;
					}
                ?>
                </tr>
            </table>
            <?php
				$grade=$info1['grade_code'];
				for($i=1;$i<=8;$i++){
					if($i%2==0){$str="第二学期";}
					else {$str="第一学期";}
					echo "<script> showInfo('title_".$i."','".$grade."-".($grade+1).$str."')</script>";
					if($i%2==0)$grade++;
				}
			?>
        </td>
      </tr>
      <tr>
      	<td>
            <table width="100%" height="40"border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td height="10"colspan="14">&nbsp;</td>
                </tr>
                <tr>
                    <td width="10%" colspan="2">总学时：<?php echo $all_all_xueshi;?></td>
                    <td width="10%"colspan="2" >总学分：<?php echo $all_all_xuefen;?></td>
                    
                    <td width="28%"colspan="2"></td>
                    <td width="12%"colspan="2"></td>
                    <td width="10%"colspan="2"></td>
                    <td width="10%"colspan="2"></td>
                    <td width="10%"colspan="2">教务处 ：</td>
                    <td width="10%"><?php echo date('Y');?>年<?php echo date('m');?>月<?php echo date('d');?>日</td>
                </tr>
            </table>
        </td>
      </tr>
    </table>
	<div style="text-align:center;">
     <input type="button" name="button1" value="打&nbsp;&nbsp;印" onclick="print0()" class="none_style" />
     <input type="button" name="button1" value="导为Excel" onclick="location.href='../export_graduation_score.php?s_no=<?php echo $s_no;?>'" class="none_style" />
</div>
</body>
</html>