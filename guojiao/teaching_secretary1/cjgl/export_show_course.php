<?php
//include("../../function/conn.php");
//$term=$_GET["term"];
//$class=$_GET["class_name"];
//$cb_id=$_GET["subject"];
//$sql=mysql_query("select speciality,grade_code from tb_class where class_name='$class';");
//$info=mysql_fetch_array($sql);
//$speciality=$info["speciality"];
//$grade_code=$info["grade_code"];
//$sql=mysql_query("select c_longname,c_credit from tb_course_base where ID='$cb_id';");
//$info=mysql_fetch_array($sql);
//$course=$info["c_longname"];
//$c_credit=$info["c_credit"];
//$sql=mysql_query("select c_week_hour,c_teacher from tb_course2_term where cb_id='$cb_id';");
//$info=mysql_fetch_array($sql);
//$c_week_hour=$info["c_week_hour"];
//$c_teacher=$info["c_teacher"];

/** Error reporting */
error_reporting(E_ALL);

date_default_timezone_set('PRC');

/** PHPExcel */
require_once '../../function/PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Add some data
$objPHPExcel->setActiveSheetIndex(0)
			->mergeCells('A1:N1')
			->setCellValue('A1', '东北电力大学    学生考核成绩登录表')
			->mergeCells('A2:N2')
			->setCellValue('A2', '年级[]&nbsp;&nbsp;学院[经济管理学院]&nbsp;&nbsp;专业[]&nbsp;&nbsp;班级[/]&nbsp;&nbsp;学年学期[/]')
            ->setCellValue('A3', '课程名称')
			->mergeCells('B3:F3')
            ->setCellValue('G3', '')
            ->setCellValue('H3', '周学时')
            ->setCellValue('I3', '')
			->setCellValue('K3', '学分')
			->setCellValue('J3', '')
			->mergeCells('K3:L3')
			->setCellValue('K2','任课教师')
			->mergeCells('M3:N3')
			->setCellValue('L2','')
			->setCellValue('A3', '学号')
			->setCellValue('B3', '姓名')
			->setCellValue('C3', '平时')
			->setCellValue('D3', '期中')
			->setCellValue('E3', '实验')
			->setCellValue('F3', '期末')
			->setCellValue('G3', '总成绩')
			->setCellValue('H3', '学号')
			->setCellValue('I3', '姓名')
			->setCellValue('J3', '平时')
			->setCellValue('K3', '期中')
			->setCellValue('L3', '实验')
			->setCellValue('M3', '期末')
			->setCellValue('N3', '总成绩')
			->mergeCells('A35:A40')
			->setCellValue('A35', '成绩总结')
			->mergeCells('B35:D35')
			->setCellValue('B35', '应参加考试人数')
			->mergeCells('B36:D36')
			->setCellValue('B36', '实际参加考试人数')
			->mergeCells('E35:G35')
			->setCellValue('E35', '人')
			->mergeCells('E36:F36')
			->setCellValue('E36', '人')
			->mergeCells('E37:G37')
			->setCellValue('E37', '人 %')
			->mergeCells('E38:G38')
			->setCellValue('E38', '人 %')
			->mergeCells('E39:B39')
			->setCellValue('E39', '人 %')
			->mergeCells('E40:F40')
			->setCellValue('E40', '人 %');
			//->mergeCells('F1:H5');
//$i=4;
//for($j=0;$j<30;$j++){
//$e_score="";
//$info=mysql_fetch_array($sql);
//$s_id=$info["s_id"];
//$score=$info["score"];
//$bk_score=$info["bk_score"];
//$ck_score=$info["ck_score"];
//$sql1=mysql_query("select s_no,s_name from tb_s_information where ID='$s_id';");
//$info1=mysql_fetch_array($sql1);
//$s_no=$info1["s_no"];
//$s_name=$info1["s_name"];
//if($bk_score==NULL) $e_score=$score;
//elseif($ck_score==NULL) $e_score=$bk_score;
//else $e_score=$ck_score;
//$k="";
//if($info1==true) $k="--";
//		$objPHPExcel->getActiveSheet()->setCellValueExplicit('A' . $i, $s_no,PHPExcel_Cell_DataType::TYPE_STRING);
//		$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $s_name);
//		$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $k);
//		$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $k);
//		$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $k);
//		$objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $e_score);
//		$objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $e_score);
//		$i++;
//	}
//for($j=0;$j<30;$j++){
//$e_score="";
//$info=mysql_fetch_array($sql);
//$s_id=$info["s_id"];
//$score=$info["score"];
//$bk_score=$info["bk_score"];
//$ck_score=$info["ck_score"];
//$sql1=mysql_query("select s_no,s_name from tb_s_information where ID='$s_id';");
//$info1=mysql_fetch_array($sql1);
//$s_no=$info1["s_no"];
//$s_name=$info1["s_name"];
//if($bk_score==NULL) $e_score=$score;
//elseif($ck_score==NULL) $e_score=$bk_score;
//else $e_score=$ck_score;
//$k="";
//if($info1==true) $k="--";
//		$objPHPExcel->getActiveSheet()->setCellValueExplicit('H' . $i, $s_no,PHPExcel_Cell_DataType::TYPE_STRING);
//		$objPHPExcel->getActiveSheet()->setCellValue('I' . $i, $s_name);
//		$objPHPExcel->getActiveSheet()->setCellValue('J' . $i, $k);
//		$objPHPExcel->getActiveSheet()->setCellValue('K' . $i, $k);
//		$objPHPExcel->getActiveSheet()->setCellValue('L' . $i, $k);
//		$objPHPExcel->getActiveSheet()->setCellValue('M' . $i, $e_score);
//		$objPHPExcel->getActiveSheet()->setCellValue('N' . $i, $e_score);
//		$i++;
//	}
//$i--;
$objPHPExcel->getActiveSheet()->freezePane('A4');

// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('123');

//Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
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
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A3:N".$i);
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle2, "A3:N3"); 
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle3, "A1:N1");
//$objPHPExcel->getActiveSheet()->getStyle('A1:H'.$i)->getFont()->setName(iconv('gbk', 'utf-8', 'Arial'));
//$objPHPExcel->getActiveSheet()->getStyle('A1:H'.$i)->getFont()->setSize(11);

// Redirect output to a client's web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="course_list.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>
