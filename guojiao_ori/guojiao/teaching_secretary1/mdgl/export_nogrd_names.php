<?php
include("../../function/conn.php");
$grade=$_GET["grade"];
/** Error reporting */
error_reporting(E_ALL);

date_default_timezone_set('PRC');

/** PHPExcel */
require_once '../../function/PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Add some data
$objPHPExcel->setActiveSheetIndex(0)
			->mergeCells('A1:H1')
			->setCellValue('A1', $grade.'无学位名单')
            ->setCellValue('A2', '年级')
            ->setCellValue('B2', '班级')
            ->setCellValue('C2', '学号')
            ->setCellValue('D2', '姓名')
			->setCellValue('E2', '已得学分')
			->setCellValue('F2', '所缺学分')
			->setCellValue('G2', '平均学分绩点')
			->setCellValue('H2', '课程首次考试不及格门数');
			//->mergeCells('F1:H5');
	$i=3;
   $num=0;
  $sql=mysql_query("select class_name from tb_class where grade_code='$grade';");
  $info=mysql_fetch_array($sql);
 do
 {
   $class_name=$info["class_name"];
   $sql2=mysql_query("select ID from tb_s_information where s_class='$class_name'");
   $info2=mysql_fetch_array($sql2);
   if($info==true){
   do{
		$s_id=$info2["ID"];
		$average_jidian=0;
		$sum_biye_credit=0;  
		$sum_jidian_credit=0;
		$sum_grade=0;
		$num_unpassedcourse=0;
		$quefen=0;
		$sql3=mysql_query("select ID from tb_course2_term where c_class='$class_name';");
		$info3=mysql_fetch_array($sql3);
		do{
		 $ID=$info3["ID"];
		 $sql4=mysql_query("select c_credit,score,bk_score,ck_score from tb_score where c_id='$ID' and s_id='$s_id';");
		 $info4=mysql_fetch_array($sql4);
		 if($info4==true){
		 do{
			 $score=$info4["score"];
			 $bk_score=$info4["bk_score"];
			 $ck_score=$info4["ck_score"];
			 $c_credit=$info4["c_credit"];
			 $sum_jidian_credit=$sum_jidian_credit+$c_credit;
			 if($score>=60||$bk_score>=60||$ck_score>=60)
			 $sum_biye_credit=$sum_biye_credit+$c_credit;
			 if($bk_score==NULL)
			 $sum_grade=$sum_grade+$score*$c_credit;
			 elseif($bk_score>=60&&$ck_score==NULL)
			 $sum_grade=$sum_grade+$bk_score*$c_credit;
			 elseif($ck_score>=60)
			 $sum_grade=$sum_grade+$ck_score*$c_credit;
			 if($score<60)
			 $num_unpassedcourse=$num_unpassedcourse+1;
		 }while($info4=mysql_fetch_array($sql4));
		 }
		}while($info3=mysql_fetch_array($sql3));
	 if($sum_jidian_credit!=0)
	 $average_jidian=number_format($sum_grade/$sum_jidian_credit,2); 
	 else $average_jidain=0.00;
	 $a_grade=number_format($sum_biye_credit,1);
	if($a_grade<100||$average_jidian<65.00||$num_unpassedcourse>16){
	$asql=mysql_query("select s_no,s_name from tb_s_information where s_class='$class_name' and ID='$s_id';");
	$ainfo=mysql_fetch_array($asql);
	$s_no=$ainfo["s_no"];
	$s_name=$ainfo["s_name"];
	$quefen=100.0-$a_grade;
	if($quefen<0) $quefen=0;
$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $grade);
$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $class_name);
$objPHPExcel->getActiveSheet()->setCellValueExplicit('C' . $i, $s_no,PHPExcel_Cell_DataType::TYPE_STRING);
$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $s_name);
$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $a_grade);
$objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $quefen);
$objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $average_jidian);
$objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $num_unpassedcourse);
$i++;
	  $num++; 
	  }	  
   }while($info2=mysql_fetch_array($sql2));
   }
 }while($info=mysql_fetch_array($sql));
$i--;
$objPHPExcel->getActiveSheet()->freezePane('A3');

// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('123');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
$sharedStyle1 = new PHPExcel_Style();
$sharedStyle2 = new PHPExcel_Style();
$sharedStyle3 = new PHPExcel_Style();
$sharedStyle1->applyFromArray(
	array(
		'alignment' => array(
								'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
							),
		'borders' => array(
								'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'right'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'left'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'top'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN)
							)

		 ));
$sharedStyle2->applyFromArray(
	array('fill' 	=> array(
								'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
								'color'		=> array('argb' => 'FFCCFFCC')
							),
		'alignment' => array(
								'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
							),
		'borders' => array(
								'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'right'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'left'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'top'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN)
							)
		 ));
$sharedStyle3->applyFromArray(
	array(
			'alignment' => array(
								'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
							),
			'font' 	=> array(
								'size'		=> 18,
								'color'		=> array('argb' => '00000000')
							)
		 ));
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A2:H".$i);
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle2, "A2:H2"); 
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle3, "A1:H1");
//$objPHPExcel->getActiveSheet()->getStyle('A1:H'.$i)->getFont()->setName(iconv('gbk', 'utf-8', 'Arial'));
//$objPHPExcel->getActiveSheet()->getStyle('A1:H'.$i)->getFont()->setSize(11);

// Redirect output to a client's web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="nograde_list.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>
