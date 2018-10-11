<?php
	error_reporting(2);
	$type=array("xls");//设置允许上传文件的类型
	//获取文件后缀名函数
	  function fileext($filename)
	{
		return substr(strrchr($filename, "."),1);
	}
   $a=strtolower(fileext($_FILES["file"]["name"]));
   //判断文件类型
   if(!in_array($a,$type))
     {
        $text=implode(",",$type);
        echo "您只能上传以下类型文件: ",$text,"<br>";
		echo "<script>location.href='load_stu_info.php'</script>";
		exit();
     }
   //生成目标文件的文件名
   else{
		$uploadfile="../../upload/mingdan.xls";
		if (move_uploaded_file($_FILES["file"]["tmp_name"],$uploadfile))
		{
			if(!is_uploaded_file($_FILES["file"]["tmp_name"]))
			{	
             	require_once 'reader.php'; 
				//需要用到reader.php和OLERead.php文件
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
				echo "<script>alert('导入成功！');location.href='load_stu_info.php'</script>";
			}
		}
 	}

?>