<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ޱ����ĵ�</title>
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
</head>

<body class="ziye_style">
<?php
include("../../function/conn.php");
mysql_query("set names gb2312");
function fenban($str)
{
	$first_name=substr($str,0,4);
	$second_name=substr($str,4,strlen($str)-4);
	$second_name_array=explode('��',$second_name);
	$length=count($second_name_array);
	for($i=1;$i<=$length;$i++){
		$class_name[$i-1]=$first_name.$second_name_array[$i-1];
	}
	return $class_name;
}
function check_table_content($var)
{
	$row=$var->sheets[0]['numRows'];
	for ($i = 2; $i <= $row;$i++)
	{
		$c_id=trim($var->sheets[0]['cells'][$i][4]);
		$asql=mysql_query("select count(ID) as num 
				from tb_course_base where c_id='$c_id'");
		$ainfo=mysql_fetch_array($asql);
		$respose_course=$ainfo['num'];
		if($respose_course==0)
		{
			echo("<script>alert('��".$i."�еĿγ̱�����ݿ��в�����,��У��');</script>");
			echo "<script>location.href='load_teac_task.php'</script>";
			return false;
			break;			
		}
		elseif ($respose_course>1) {
			echo("<script>alert('��".$i."�еĿγ̱�������ݿ��д��ڲ�ֹһ��������ϵ������Ա');</script>");
			echo "<script>location.href='load_teac_task.php'</script>";
			return false;
			break;			
		}
		else 
		{
			return true;
		}	
	}
}
?>
<?php
	error_reporting(2);
	$type=array("xls");//���������ϴ��ļ�������
	//��ȡ�ļ���׺������
	  function fileext($filename)
	{
		return substr(strrchr($filename, "."),1);
	}
   $a=strtolower(fileext($_FILES["file"]["name"]));
   //�ж��ļ�����
   if(!in_array($a,$type))
     {
        $text=implode(",",$type);
        echo "��ֻ���ϴ����������ļ�: ",$text,"<br>";
		echo "<script>location.href='load_stu_info.php'</script>";
		exit();
     }
   //����Ŀ���ļ����ļ���
   else{
		$uploadfile="../../upload/teach_task.xls";
		if (move_uploaded_file($_FILES["file"]["tmp_name"],$uploadfile))
		{
			if(!is_uploaded_file($_FILES["file"]["tmp_name"]))
			{	
             	require_once '../xjgl/reader.php'; 
				//��Ҫ�õ�reader.php��OLERead.php�ļ�
                $data = new Spreadsheet_Excel_Reader(); 
                $data->setOutputEncoding('gb2312'); 
                $data->read($uploadfile);				
				$result=check_table_content($data);
				if ($result==true) {					
				for ($i = 2; $i <= $data->sheets[0]['numRows'];$i++) 
				{
					$pp=0;
					$class_name=fenban(trim($data->sheets[0]['cells'][$i][3]));
					$pp=count($class_name);
					$gsql=mysql_query("select ID from tb_course_base where c_id='".trim($data->sheets[0]['cells'][$i][4])."'");
					$ginfo=mysql_fetch_array($gsql);
					for($j=0;$j<$pp;$j++){
						$sql="INSERT INTO tb_course2_term(grade,term,c_class,cb_id,c_week_hour,c_teacher,c_kind,credit) VALUES('".trim($data->sheets[0]['cells'][$i][2])."','".trim($data->sheets[0]['cells'][$i][1])."','".$class_name[$j]."','".$ginfo['ID']."','".trim($data->sheets[0]['cells'][$i][9])."','".trim($data->sheets[0]['cells'][$i][11])."','".trim($data->sheets[0]['cells'][$i][17])."','".trim($data->sheets[0]['cells'][$i][8])."')";
						$res = mysql_query($sql);
					}
						$week=explode('-',trim($data->sheets[0]['cells'][$i][12]));
						$term=trim($data->sheets[0]['cells'][$i][12]);
						$asql=mysql_query("select begin_date from tb_week where week_num='$week[0]' and term='$term'");
						$ainfo=mysql_fetch_array($asql);
						$bsql=mysql_query("select end_date from tb_week where week_num='$week[1]' and term='$term'");
						$binfo=mysql_fetch_array($bsql);
						$begin_date=$ainfo['begin_date'];
						$end_date=$binfo['end_date'];
						$repate=trim($data->sheets[0]['cells'][$i][38]);
					$tsql="INSERT INTO tb_course1_term(grade,term,c_class,c_id,c_week_hour,c_teacher,c_stu_num,c_kind,credit,mon_hour,tue_hour,wed_hour,thu_hour,fri_hour,stu_amount,repeat_time,begin_date,end_date) 
                		VALUES('".trim($data->sheets[0]['cells'][$i][2])."','".trim($data->sheets[0]['cells'][$i][1])."','".trim($data->sheets[0]['cells'][$i][3])."','".trim($data->sheets[0]['cells'][$i][4])."','".trim($data->sheets[0]['cells'][$i][9])."','".trim($data->sheets[0]['cells'][$i][11])."','".trim($data->sheets[0]['cells'][$i][14])."','".trim($data->sheets[0]['cells'][$i][17])."','".trim($data->sheets[0]['cells'][$i][8])."','".trim($data->sheets[0]['cells'][$i][33])."','".trim($data->sheets[0]['cells'][$i][34])."','".trim($data->sheets[0]['cells'][$i][35])."','".trim($data->sheets[0]['cells'][$i][36])."','".trim($data->sheets[0]['cells'][$i][37])."','".trim($data->sheets[0]['cells'][$i][14])."','".$repate."','".$begin_date."','".$end_date."')";
					$res = mysql_query($tsql);
				}
				unlink($uploadfile);
				echo "<script>alert('����ɹ���');location.href='load_teac_task.php'</script>";
				}
				else 
				{
					exit;
				}
		}
		}
 	}
?>
</body>
</html>