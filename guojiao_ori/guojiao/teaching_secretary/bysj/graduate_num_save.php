<?php
	error_reporting(2);
	include("../../function/conn.php");
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
		echo "<script>alert('��ֻ���ϴ����������ļ�:xls,xlsx');location.href='load_graduate_num.php'</script>";
		exit();
     }
   //����Ŀ���ļ����ļ���
   else{
		$uploadfile="../../upload/mingdan.xls";
		if (move_uploaded_file($_FILES["file"]["tmp_name"],$uploadfile))
		{
			if(!is_uploaded_file($_FILES["file"]["tmp_name"]))
			{	
             	require_once '../xjgl/reader.php'; 
				//��Ҫ�õ�reader.php��OLERead.php�ļ�
                $data = new Spreadsheet_Excel_Reader(); 
                $data->setOutputEncoding('gb2312');
                $data->read($uploadfile);
				for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) 
				{
				echo trim($data->sheets[0]['cells'][$i][4]);
				$sql=mysql_query("UPDATE tb_s_information SET gra_num='".trim($data->sheets[0]['cells'][$i][4])."' where s_no='".trim($data->sheets[0]['cells'][$i][1])."'");
				}
				unlink($uploadfile);
			echo "<script>alert('����ɹ���');location.href='load_graduate_num.php'</script>";
		}
		}
 	}

?>