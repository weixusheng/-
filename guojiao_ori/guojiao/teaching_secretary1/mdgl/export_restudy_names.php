<?php
include("../../function/conn.php");
$grade=$_GET["grade"];
$term=$_GET["term"];
/** Error reporting */
error_reporting(E_ALL);

date_default_timezone_set('PRC');

/** PHPExcel */
require_once '../../function/PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Add some data
$objPHPExcel->setActiveSheetIndex(0)
			->mergeCells('A1:L1')
			->setCellValue('A1', $grade.'级重修名单')
            ->setCellValue('A2', '学期')
            ->setCellValue('B2', '学号')
            ->setCellValue('C2', '姓名')
            ->setCellValue('D2', '班级')
			->setCellValue('E2', '科目')
			->setCellValue('F2', '课程编号')
			->setCellValue('G2', '类型')
			->setCellValue('H2', '课程类别')
			->setCellValue('I2', '学分')
			->setCellValue('J2', '正考成绩')
			->setCellValue('K2', '补考成绩')
			->setCellValue('L2', '考试状态');
			//->mergeCells('F1:H5');
$i=3;
$sql=mysql_query("select s_id,c_id,score,bk_score,exam_type,s_term from tb_score where bk_score<60 and bk_score!='' and s_id in (select ID from tb_s_information where s_class in (select class_name from tb_class where grade_code='$grade')) and s_term=$term");
$info=mysql_fetch_array($sql);
if($info!="") { 
do{
$s_id=$info["s_id"];
$c_id=$info["c_id"];
$s_term=$info["s_term"];
$bk_score=$info["bk_score"];
$score=$info["score"];
$exam_type=$info["exam_type"];
if($exam_type==0)
$exam_type2="正常";
if($exam_type==1)
$exam_type2="缓考";
if($exam_type==2)
$exam_type2="缺考";
if($exam_type==3)
$exam_type2="作弊";
if($exam_type==4)
$exam_type2="违纪";
if($exam_type==5)
$exam_type2="取消";
if($exam_type==6)
$exam_type2="补修";

$sql2=mysql_query("select s_no,s_name,s_class from tb_s_information where ID='$s_id';");	
$info2=mysql_fetch_array($sql2);
$s_no=$info2["s_no"];
$s_name=$info2["s_name"];
$s_class=$info2["s_class"];
$sql3=mysql_query("select cb_id,c_kind,c_teacher from tb_course2_term where ID='$c_id';");
$info3=mysql_fetch_array($sql3);
$c_kind=$info3["c_kind"]; 
$c_teacher=$info3["c_teacher"];
$cb_id=$info3["cb_id"];
$sql4=mysql_query("select c_longname,c_type,c_id,c_credit from tb_course_base where ID='$cb_id';"); 
$info4=mysql_fetch_array($sql4);
$c_name=$info4["c_longname"];
$c_type=$info4["c_type"];
$c_credit=$info4["c_credit"];
$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $s_term);
$objPHPExcel->getActiveSheet()->setCellValueExplicit('B' . $i, $s_no,PHPExcel_Cell_DataType::TYPE_STRING);
$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $s_name);
$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $s_class);
$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $c_name);
$objPHPExcel->getActiveSheet()->setCellValueExplicit('F' . $i, $info4["c_id"],PHPExcel_Cell_DataType::TYPE_STRING);
$objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $c_kind);
$objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $c_type);
$objPHPExcel->getActiveSheet()->setCellValue('I' . $i, $c_credit);
$objPHPExcel->getActiveSheet()->setCellValue('J' . $i, $score);
$objPHPExcel->getActiveSheet()->setCellValue('K' . $i, $bk_score);
$objPHPExcel->getActiveSheet()->setCellValue('L' . $i, $exam_type2);
$i++;
}while($info=mysql_fetch_array($sql));
$i--;
}
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
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
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
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A2:L".$i);
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle2, "A2:L2"); 
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle3, "A1:L1");
//$objPHPExcel->getActiveSheet()->getStyle('A1:H'.$i)->getFont()->setName(iconv('gbk', 'utf-8', 'Arial'));
//$objPHPExcel->getActiveSheet()->getStyle('A1:H'.$i)->getFont()->setSize(11);

// Redirect output to a client's web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="resudy_list.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>
