<?php
	include("../../function/conn.php");
	error_reporting(0);
	$type0=$_POST["type"];
	$gzb=$_POST["gzb"];
	$class=$_POST["class"];
	$term=$_POST["term"];
	$c_id=$_POST["c_id"];
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
		$sql=mysql_query("select ID,c_credit from tb_course_base where c_id='$c_id'");
		$info=mysql_fetch_array($sql);
		$id=$info["ID"];
		$c_credit=$info["c_credit"];
		$gsql=mysql_query("select ID from tb_course2_term where cb_id='$id' and c_class='$class'");
		$ginfo=mysql_fetch_array($gsql);
		$c_id=$ginfo["ID"];
		if (move_uploaded_file($_FILES["file"]["tmp_name"],$uploadfile))
		{
			if(!is_uploaded_file($_FILES["file"]["tmp_name"]))
			{	
             	
				require_once '../xjgl/reader.php'; 
				//需要用到reader.php和OLERead.php文件
                $data = new Spreadsheet_Excel_Reader(); 
                $data->setOutputEncoding('gb2312'); 
                $data->read($uploadfile);
				
				if($type0==1) {
				for ($i =6; $i <= 35; $i++) 
				{
					
					$k=trim($data->sheets[$gzb]['cells'][$i][1]);
					$hsql=mysql_query("select ID from tb_s_information where s_no='$k'");
					$hinfo=mysql_fetch_array($hsql);
					$s_id=$hinfo['ID'];
					if(trim($data->sheets[$gzb]['cells'][$i][1])==NULL||trim($data->sheets[$gzb]['cells'][$i][1])=='') {break;}
					mysql_query("INSERT INTO tb_score(s_id,c_id,s_term,c_credit,score) VALUES('$s_id','$c_id','$term','$c_credit','".trim($data->sheets[$gzb]['cells'][$i][7])."')");
				}
				for ($i=6;$i<=35;$i++) 
				{
					$k=trim($data->sheets[$gzb]['cells'][$i][8]);
					if(trim($data->sheets[$gzb]['cells'][$i][8])==NULL||trim($data->sheets[$gzb]['cells'][$i][8])=='') {break;}
					$hsql=mysql_query("select ID from tb_s_information where s_no='$k'");
					$hinfo=mysql_fetch_array($hsql);
					$s_id=$hinfo['ID'];
					mysql_query("INSERT INTO tb_score(s_id,c_id,s_term,c_credit,score) VALUES('$s_id','$c_id','$term','$c_credit',
'".trim($data->sheets[$gzb]['cells'][$i][14])."')");
				}
				}
				if($type0==2) {
					for ($i =6; $i <= 35; $i++){
					$k=trim($data->sheets[$gzb]['cells'][$i][1]);
					if(trim($data->sheets[$gzb]['cells'][$i][1])==NULL||trim($data->sheets[$gzb]['cells'][$i][1])=='') {break;}
					$hsql=mysql_query("select ID from tb_s_information where s_no='$k'");
					$hinfo=mysql_fetch_array($hsql);
					$s_id=$hinfo['ID'];
					mysql_query("update tb_score set bk_score='".trim($data->sheets[0]['cells'][$i][7])."' where s_id='$s_id' and c_id='$c_id'" );
					echo $i."<br/>";
					}
					for ($i=6;$i<=35;$i++) {
					$k=trim($data->sheets[$gzb]['cells'][$i][8]);
					if(trim($data->sheets[$gzb]['cells'][$i][8])==NULL||trim($data->sheets[$gzb]['cells'][$i][8])=='') {break;}
					$hsql=mysql_query("select ID from tb_s_information where s_no='$k'");
					$hinfo=mysql_fetch_array($hsql);
					$s_id=$hinfo['ID'];
					mysql_query("update tb_score set bk_score='".trim($data->sheets[0]['cells'][$i][14])."'  where s_id='$s_id' and c_id='$c_id'");
					}
				}
				if($type0==3) {
					for ($i =6; $i <= 35; $i++){
					$k=trim($data->sheets[$gzb]['cells'][$i][1]);
					if(trim($data->sheets[$gzb]['cells'][$i][1])==NULL||trim($data->sheets[$gzb]['cells'][$i][1])=='') {break;}
					$hsql=mysql_query("select ID from tb_s_information where s_no='$k'");
					$hinfo=mysql_fetch_array($hsql);
					$s_id=$hinfo['ID'];
					mysql_query("update tb_score set ck_score='".trim($data->sheets[0]['cells'][$i][7])."' where s_id='$s_id' and c_id='$c_id'");
					}
					for ($i=6;$i<=35;$i++) {
					$k=trim($data->sheets[$gzb]['cells'][$i][8]);
					if(trim($data->sheets[$gzb]['cells'][$i][8])==NULL||trim($data->sheets[$gzb]['cells'][$i][8])=='') {break;}
					$hsql=mysql_query("select ID from tb_s_information where s_no='$k'");
					$hinfo=mysql_fetch_array($hsql);
					$s_id=$hinfo['ID'];
					mysql_query("update tb_score set ck_score='".trim($data->sheets[0]['cells'][$i][14])."' where s_id='$s_id' and c_id='$c_id'");
					}
				}
					unlink($uploadfile);
					echo "<script>alert('导入成功！');location.href='dcj_form.php'</script>";
			}
		}
 	}
?>