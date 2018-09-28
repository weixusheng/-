<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
// --列头全选框被单击---
function ChkAllClick(sonName,cbAllId ){
 var arrSon =document.getElementsByName(sonName);
 var cbAll = document.getElementById(cbAllId);
 var tempState=cbAll.checked;
 for(i=0;i<arrSon.length;i++) {
  if(arrSon[i].checked!=tempState)
           arrSon[i].click();
 }
}
function hui(form,checkbox)
{
	document.form.checkbox.disabled=true;
	}

// --子项复选框被单击---
function ChkSonClick(sonName, cbAllId) {
 var arrSon = document.getElementsByName(sonName);
 var cbAll = document.getElementById(cbAllId);
 for(var i=0; i<arrSon.length; i++) {
     if(!arrSon[i].checked) {
     cbAll.checked = false;
     return;
     }
 }
 cbAll.checked = true;
}

function change_submit(zt)
{ 
     if (zt == "true")
     {
   document.forms['form'].elements['Submit1'].disabled = 'disabled';
     }
   else
     {
   document.forms['form'].elements['Submit1'].disabled = '';
     }
}
// --反选被单击---
//function ChkOppClick(sonName){
// var arrSon = document.getElementsByName(sonName);
// for(i=0;i<arrSon.length;i++) {
//  arrSon[i].click();
// }
//}
</script>
</head>
<body onload="reload()" class="ziye_style">
<img src="../../images/loading.gif" style="display:none" />
<?php
	$class_name=isset($_POST['class_name'])?$_POST['class_name']:$_GET['class_name'];
	$class_name_1=substr($class_name,0,3);/*utf编码方式，每个汉字占3字节*/
	$id=isset($_POST['subject'])?$_POST['subject']:$_GET['id'];
	$exam_type=isset($_POST["exam"])?$_POST["exam"]:$_GET["exam"];
	$exam_temp=explode('_',$exam_type);
	if($exam_temp[0]=='score'){$can_change="can_change";$exam_aud='exam_type';}
	else {
		$can_change=$exam_temp[0]."_can_change";
		$exam_aud=$exam_temp[0]."_type";
	}
	include("../../function/conn.php");
	$qqsql=mysql_query("select ID from tb_course2_term where c_class='$class_name' and cb_id=$id");
	$qqinfo=mysql_fetch_array($qqsql);
	$c_id=$qqinfo["ID"];
?>
<form name="form" action="exchange_aud_save.php?class_name=<?php echo $class_name;?>&id=<?php echo $id;?>&exam=<?php echo $exam_type;?>&can_change=<?php echo $can_change;?>" method="post" onsubmit="document.getElementById('all_table').innerHTML='<img src=\'../../images/loading.gif\' /><font size=\'2\' color=\'#FF0000\'>正在处理，请耐心等待</font>';document.getElementById('all_table').align='left'">
    <table width="65%" border="1" cellspacing="0" cellpadding="0" >
      <tr>
        <td width="10%" align="center">序号</td>
        <td width="20%" align="center">学号</td>
        <td width="15%" align="center">姓名</td>
        <td width="15%" align="center">成绩</td>
        <td width="15%" align="center">考试状态</td>
        <td width="25%" align="center">全部授权
          <input type="checkbox" name="shAll" value="" id="shAll" onClick="ChkAllClick('shSon[]','shAll')" /></td>
      </tr>
      <?php
	  $can_change=trim($can_change);
    $sql=mysql_query("select ID,s_id,$exam_type,$can_change,$exam_aud from tb_score where c_id='$c_id' and ($exam_type is not null or $exam_aud=1)");
    $info=mysql_fetch_array($sql);
	$i=0;
	if($info==true){
    do {
        $s_id=$info["s_id"];
        $score=$info[$exam_type];
		$can=$info[$can_change];
		$aud0=$info[$exam_aud];
		$score_id=$info["ID"];
		switch($aud0){
			case '0':$aud="正常";break;
			case '1':$aud="缓考";break;
			case '2':$aud="缺考";break;
			case '3':$aud="禁考";break;
			default:$aud="其他";
		}
        $gsql=mysql_query("select s_no,s_name from tb_s_information where ID=$s_id");
        $ginfo=mysql_fetch_array($gsql);
        $s_no=$ginfo["s_no"];
        $s_name=$ginfo["s_name"];
		$i++;
    ?>
      <tr>
        <td align="center"><?php echo $i;?></td>
        <td align="center"><?php echo $s_no?>&nbsp;</td>
        <td align="center"><?php echo $s_name?>&nbsp;</td>
        <td align="center"><?php 
				if($class_name_1=='经'){
					switch($score){
						case 95:echo 'A';break;
						case 92:echo 'A-';break;
						case 89:echo 'B+';break;
						case 85:echo 'B';break;
						case 82:echo 'B-';break;
						case 79:echo 'C+';break;
						case 75:echo 'C';break;
						case 72:echo 'C-';break;
						case 69:echo 'D+';break;
						case 65:echo 'D';break;
						case '0':echo 'F';break;
						}
				}
				else echo $score;?>
          &nbsp;</td>
           <td align="center"><?php echo $aud;?></td>
          <td align="center">
                <input <?php if (!(strcmp($can,1))) {echo "checked=\"checked\" disabled=\"disabled\" ";} ?> type="checkbox" name="shSon[]" value=<?php echo $score_id;?> id="" onclick="ChkSonClick('shSon[]','shAll');change_submit(false)" />
                &nbsp;</td>
      </tr>
      <?php
    }while($info=mysql_fetch_array($sql));
	}
    ?>
     		<tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right" id="all_table"><input name="Submit1" type="submit" disabled="disabled" value="提交" /></td>
            </tr>
    </table>
</form>
</body>
</html>