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
		$uploadfile="../../upload/mingdan.xls";
		if (move_uploaded_file($_FILES["file"]["tmp_name"],$uploadfile))
		{
			if(!is_uploaded_file($_FILES["file"]["tmp_name"]))
			{	
             	require_once 'reader.php'; 
				//��Ҫ�õ�reader.php��OLERead.php�ļ�
                $data = new Spreadsheet_Excel_Reader(); 
                $data->setOutputEncoding('gb2312'); 
                $data->read($uploadfile);
				include("../../function/conn.php");
				mysql_query("set names gb2312");
				for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) 
				{
				$sql="insert into tb_s_information(s_no,s_name,s_sex ,s_birthday,s_id_card,s_home,s_politics,s_class,s_entrance_date,nation,stu_status,bank_num,is_dragon) VALUES('".trim($data->sheets[0]['cells'][$i][2])."','".trim($data->sheets[0]['cells'][$i][3])."','".trim($data->sheets[0]['cells'][$i][4])."','".trim($data->sheets[0]['cells'][$i][6])."','".trim($data->sheets[0]['cells'][$i][5])."','".trim($data->sheets[0]['cells'][$i][8])."','".trim($data->sheets[0]['cells'][$i][7])."','".trim($data->sheets[0]['cells'][$i][1])."','".trim($data->sheets[0]['cells'][$i][13])."','".trim($data->sheets[0]['cells'][$i][14])."','"."0"."','".trim($data->sheets[0]['cells'][$i][10])."','"."0"."')";
				$res = mysql_query($sql);
				//$gsql=mysql_query("insert into tb_s_password(no,pwd) VALUES('".trim($data->sheets[0]['cells'][$i][2])."','".trim(substr($data->sheets[0]['cells'][$i][2],-6,6))."')");
				
				}
				unlink($uploadfile);
				echo "<script>alert('����ɹ���');location.href='load_stu_info.php'</script>";
			}
		}
 	}

?>