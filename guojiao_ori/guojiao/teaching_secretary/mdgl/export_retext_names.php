<?php
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="retext_list.xlsx"');
header('Cache-Control: max-age=0');
include("../../function/conn0.php");
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
			->mergeCells('A1:J1')
			->setCellValue('A1', $grade.'级补考名单')
            ->setCellValue('A2', '学期')
            ->setCellValue('B2', '班级')
            ->setCellValue('C2', '学号')
            ->setCellValue('D2', '姓名')
			->setCellValue('E2', '考试科目')
			->setCellValue('F2', '课程编号')
			->setCellValue('G2', '类型')
			->setCellValue('H2', '学分')
			->setCellValue('I2', '成绩')
			->setCellValue('J2', '考试状态');
			//->mergeCells('F1:H5');
$i=3;
$sql=mysql_query("select s_id,c_id,s_term,score,exam_type from tb_score where score<60 and s_term='$term' and s_id in (select ID from tb_s_information where s_class in (select class_name from tb_class where grade_code='$grade'))");
$info=mysql_fetch_array($sql);
if($info==true){
do {
	$s_id=$info["s_id"];
	$c_id=$info["c_id"];
	$s_term=$info["s_term"];
	$score=$info["score"];
	$exam_type=$info["exam_type"];
	$s_term=$info["s_term"];
	if($exam_type==0) {
		$exam_type="正常";
	}
	if($exam_type==1) {
		$exam_type="缓考";
	}
	if($exam_type==2) {
		$exam_type="缺考";
	}
	if($exam_type==3) {
		$exam_type="作弊";
	}
	if($exam_type==4) {
		$exam_type="违纪";
	}
	if($exam_type==5) {
		$exam_type="取消";
	}
	if($exam_type==6) {
		$exam_type="补休";
	}
	$ssql=mysql_query("select s_class,s_no,s_name,s_entrance_date from tb_s_information where ID=$s_id");
	$sinfo=mysql_fetch_array($ssql);
	$gsql=mysql_query("select ID,c_longname,c_credit,c_id from tb_course_base where ID=$c_id");
	$ginfo=mysql_fetch_array($gsql);
	do {
		$c_id=$ginfo["c_id"];
		$s_class=$sinfo["s_class"];
		$s_no=$sinfo["s_no"];
		$s_name=$sinfo["s_name"];
		$s_entrance_date=$sinfo["s_entrance_date"];
		$c_longname=$ginfo["c_longname"];
		//$c_hour=$ginfo["c_hour"];
		$c_credit=$ginfo["c_credit"];
		$id=$ginfo["ID"];
		$csql=mysql_query("select distinct c_kind from tb_course2_term where cb_id='$id'");
		$cinfo=mysql_fetch_array($csql);
		$c_kind=$cinfo["c_kind"];
	
	$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $s_term);
	$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $s_class);
	$objPHPExcel->getActiveSheet()->setCellValueExplicit('C' . $i, $sinfo["s_no"],PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $s_name);
	$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $c_longname);
	$objPHPExcel->getActiveSheet()->setCellValueExplicit('F' . $i, $c_id,PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $c_kind);
	$objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $c_credit);
	$objPHPExcel->getActiveSheet()->setCellValue('I' . $i, $score);
	$objPHPExcel->getActiveSheet()->setCellValue('J' . $i, $exam_type);
	$i++;
	}while($ginfo=mysql_fetch_array($gsql));
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
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A2:J".$i);
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle2, "A2:J2"); 
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle3, "A1:J1");
//$objPHPExcel->getActiveSheet()->getStyle('A1:H'.$i)->getFont()->setName(iconv('gbk', 'utf-8', 'Arial'));
//$objPHPExcel->getActiveSheet()->getStyle('A1:H'.$i)->getFont()->setSize(11);
// Redirect output to a client's web browser (Excel2007)
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>
