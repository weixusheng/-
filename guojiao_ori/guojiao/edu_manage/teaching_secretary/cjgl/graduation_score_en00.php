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
//$s_no='0915010101';
require '../../function/conn.php';
require '../../function/pinyin.php';
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

$sql=mysql_query("select ID,s_name,s_sex,s_class,nation from tb_s_information where s_no='$s_no'");
$info=mysql_fetch_array($sql);
$s_id=$info["ID"];
$s_name=$info["s_name"];
$s_sex=$info["s_sex"];
$s_class=$info["s_class"];
$ID=$info["ID"];
$sql1=mysql_query("select major,grade_code from tb_class where class_name='$s_class';");
$info1=mysql_fetch_array($sql1);
$speciality=$info1["major"];
$grade=$info1['grade_code'];
$nation=$info['nation'];
$sql0=mysql_query("select grd_num from  graduation_number where s_no='$s_no'");
$info0=mysql_fetch_array($sql0);
$grd_num=$info0['grd_num'];
$dsql=mysql_query("select tpc_id,score from gra_tpc_selection where s_no='$s_no'");
$dinfo=mysql_fetch_array($dsql);
$title_id=$dinfo['tpc_id'];
$gsql=mysql_query("select topic_name from graduation_design where ID='$title_id'");
$ginfo=mysql_fetch_array($gsql);
$topic_name=$ginfo['topic_name'];
$grd_des_score=$dinfo['score'];

?> 
<body class="bgcc">
    <table border="0" cellpadding="0" cellspacing="0" width="1500" class="print_style">
      <tr>
      	<td>
           <table width="100%" height="90" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" colspan="2" width="15%" >Student Number：<?php echo $s_no; ?></td>
                <td width="13%" colspan="2">Name：<?php echo getPinYin($s_name,true,false,false); ?></td>
                <td width="60%" align="left" colspan="6" rowspan="2" id="main_title" valign="top">Transcript of Northeast Dianli University</td>
              </tr>
              <tr>
                <td width="15%" colspan="2">Race:<?php echo getPinYin($nation,true,true,false);?></td>
                <td width="18%" colspan="2">Gender：<?php if($s_sex=='女')echo "Female";if($s_sex=='男')echo "Male"; ?></td>
              </tr>
              <tr>
                <td width="15%" colspan="2">Class:<?php echo substr($s_class,6,(strlen($s_class)-6)); ?></td>
                <td width="18%" colspan="2">Major:<?php echo $speciality; ?></td>
                <td width="10%" colspan="2">College:College of International Exchange</td>
                <td width="6%" colspan="2">degree：</td>
                <td width="25%" colspan="2">Graduation card number：<?php echo $grd_num;?></td>
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
                    for($j=1;$j<=8;$j++)
                    {
						$all_xueshi=0;
						$all_xuefen=0;
                ?>
               		<td valign="top" width="25%">
                    <table width="100%" height="100%" cellpadding="0" cellspacing="0" id="table_1">
                    <tr><td colspan="5" align="center" id="title_<?php echo $j;?>" class="xueqi_title"></td></tr>
                    <tr>
                    	<td width="57%" align="center" class="td_class1">Course Title</td>
                        <td width="13%" align="center" class="td_class1">Category</td>
                        <td width="10%" align="center" class="td_class1">Score</td>
                        <td width="10%" align="center" class="td_class1">Hours</td>
                        <td width="10%" align="center" class="td_class2">Credit</td>
                    </tr>
                <?        
						if($j%2==0){$grade_term=$grade."2";}
                        else {$grade_term=$grade."1";}
                        $grade_term;
                        $sql2=mysql_query("select c_englishname,c_kind,c_week_hour,tb_score.c_credit,score,bk_score,ck_score 
                        from tb_course_base,tb_score,tb_course2_term 
                        where tb_course2_term.c_class='$s_class' and tb_course2_term.term='$grade_term' and tb_course_base.ID=tb_course2_term.cb_id and tb_score.c_id=tb_course2_term.ID and tb_score.s_id='$s_id';");
                        for($k=1;$k<=17;$k++)
                        {
				?>
                	<tr valign="top" height="16" class="prit_height">
                    	<td id="<?php echo "term_".$j."_c_".$k;?>" class="td_class3">&nbsp;</td>
                        <td id="<?php echo "term_".$j."_k_".$k;?>" class="td_class3">&nbsp;</td>
                        <td id="<?php echo "term_".$j."_s_".$k;?>" class="td_class3">&nbsp;</td>
                        <td id="<?php echo "term_".$j."_w_".$k;?>" class="td_class3">&nbsp;</td>
                        <td id="<?php echo "term_".$j."_cc_".$k;?>">&nbsp;</td>
                <?			
                            $getinfo=mysql_fetch_array($sql2);
							$longname=$getinfo["c_englishname"];
                            $kind=$getinfo["c_kind"];
							if($kind=="必修")$kind="Required";
							if($kind=="选修")$kind="Selected";
                            if($getinfo["bk_score"]==NULL){$score=$getinfo["score"];}
                            elseif($getinfo["ck_score"]==NULL){$score=$getinfo["bk_score"];}
                            else {$score=$getinfo["ck_score"];}
                            $week=$getinfo["c_week_hour"];
                            $credit=$getinfo["c_credit"];
							$all_xueshi+=$week;
							$all_xuefen+=$credit;
							
							if($speciality=='International Economics and Trade')
							{
								switch($score){
									case 95:$score66='A';break;
									case 90:$score66='A-';break;
									case 88:$score66='B+';break;
									case 85:$score66='B';break;
									case 80:$score66='B-';break;
									case 78:$score66='C+';break;
									case 75:$score66='C';break;
									case 70:$score66='C-';break;
									case 68:$score66='D+';break;
									case 65:$score66='D';break;
									case 50:$score66='F';break;
								}
								$score=$score66;
								$score66='';
							}
							
							
							
                            echo"<script> showInfo('term_".$j."_c_".$k."','&nbsp;".cleanString($longname,0,24)."')</script>";
                            echo"<script> showInfo('term_".$j."_k_".$k."','&nbsp;".$kind."')</script>";
                            echo"<script> showInfo('term_".$j."_s_".$k."','&nbsp;".$score."')</script>";
                            echo"<script> showInfo('term_".$j."_w_".$k."','&nbsp;".$week."')</script>";
                            echo"<script> showInfo('term_".$j."_cc_".$k."','&nbsp;".$credit."')</script>";
				?>
                    </tr>
                 <?
                        };
                        if($j%2==0)$grade++;
				?>
                    <tr>
                    	<td colspan="5" id="tail_<?php echo $j;?>" class="xueqi_bottom">Total Hours:<?php echo $all_xueshi;?>Total Credits:<?php echo $all_xuefen;?></td>
                    </tr>
                    </table>
                    </td>
                <?
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
					if($i%2==0){$str="Second Semester";}
					else {$str="First Semester";}
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
                    <td width="10%" colspan="2">Overall Hours:<?php echo $all_all_xueshi;?></td>
                    <td width="10%"colspan="2" >Overall Credits:<?php echo $all_all_xuefen;?></td>
                    <td width="28%"colspan="2"></td>
                    <td width="12%"colspan="2"></td>
                    <td width="10%"colspan="2"> </td>
                    <td width="10%"colspan="2">  </td>
                    <td width="10%"colspan="2"></td>
                    <td width="10%"><?php echo date('Y');?>-<?php echo date('m');?>-<?php echo date('d');?></td>
                </tr>
            </table>
        </td>
      </tr>
    </table>
	<div style="text-align:center;">
     <input type="button" name="button1" value="打&nbsp;&nbsp;印" onclick="print0()" class="none_style" />
     <input type="button" name="button1" value="导为Excel" onclick="location.href='../export_graduation_score_en.php?s_no=<?php echo $s_no;?>'" class="none_style" />
</div>
</body>
</html>