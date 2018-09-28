<?php
include('../function/conn0.php');
date_default_timezone_set('PRC');
$y=date('Y');
$m=date('m');
$d=date('d');
$classes0=$_GET['classes0'];
$term=$_GET['term'];
$cb_id=$_GET['cb_id'];
$sql=mysql_query("select speciality,grade_code,class_name from tb_class where ID='$classes0'");
$info=mysql_fetch_array($sql);
$speciality=$info["speciality"];
$grade_code=$info["grade_code"];
$class_name=$info["class_name"];
$sql=mysql_query("select c_longname,c_credit from tb_course_base where ID='$cb_id';");
$info=mysql_fetch_array($sql);
$course=$info["c_longname"];
$c_credit=$info["c_credit"];
$sql=mysql_query("select c_week_hour,c_teacher from tb_course2_term where cb_id='$cb_id' and c_class='$class_name';");
$info=mysql_fetch_array($sql);
$c_week_hour=$info["c_week_hour"];
$c_teacher=$info["c_teacher"];
$xueqi=substr($term,-1,1);
$xueqi_array=array("","第一学期","第二学期");
$xuenian=substr($term,0,4);
$xuenian=$xuenian."--".($xuenian+1);
$xuenianqi=$xuenian.$xueqi_array[$xueqi];
$asql=mysql_query("select count(ID) as all_num from tb_s_information where s_class='$class_name'");
$ainfo=mysql_fetch_array($asql);
$all_num=$ainfo["all_num"];
$dsql=mysql_query("select count(ID) as should_num from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where s_class='$class_name') and c_id in (select ID from tb_course2_term where cb_id='$cb_id') and exam_type!=1 and exam_type!=2;");
$dinfo=mysql_fetch_array($dsql);
//if(substr($class_name,0,3)=='电') {
$sql3=mysql_query("select count(ID) as part from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where s_class='$class_name') and c_id in (select ID from tb_course2_term where cb_id='$cb_id') and score>=90;");
$info3=mysql_fetch_array($sql3);
$part1=$info3["part"];
$sql4=mysql_query("select count(ID) as part from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where s_class='$class_name') and c_id in (select ID from tb_course2_term where cb_id='$cb_id') and score<90 and score>=80;");
$info4=mysql_fetch_array($sql4);
$part2=$info4["part"];
$sql5=mysql_query("select count(ID) as part from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where s_class='$class_name') and c_id in (select ID from tb_course2_term where cb_id='$cb_id') and score<80 and score>=70;");
$info5=mysql_fetch_array($sql5);
$part3=$info5["part"];
$sql6=mysql_query("select count(ID) as part from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where s_class='$class_name') and c_id in (select ID from tb_course2_term where cb_id='$cb_id') and score<70 and score>=60;");
$info6=mysql_fetch_array($sql6);
$part4=$info6["part"];
$sql7=mysql_query("select count(ID) as part from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where s_class='$class_name') and c_id in (select ID from tb_course2_term where cb_id='$cb_id') and score<82;");
$info7=mysql_fetch_array($sql7);
$part5=$info7["part"];
if($all_num==0) $temp=0;
else
{
  $part1_a=number_format($part1/$all_num*100,2);
  $part2_a=number_format($part2/$all_num*100,2);
  $part3_a=number_format($part3/$all_num*100,2);
  $part4_a=number_format($part4/$all_num*100,2);
  $part5_a=number_format($part5/$all_num*100,2);
}
//} else {
//$sql3=mysql_query("select count(ID) as part from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where s_class='$class_name') and c_id in (select ID from tb_course2_term where cb_id='$cb_id') and score=95;");
//$info3=mysql_fetch_array($sql3);
//$part1=$info3["part"];
//$sql4=mysql_query("select count(ID) as part from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where s_class='$class_name') and c_id in (select ID from tb_course2_term where cb_id='$cb_id') and score=92;");
//$info4=mysql_fetch_array($sql4);
//$part2=$info4["part"];
//$sql5=mysql_query("select count(ID) as part from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where s_class='$class_name') and c_id in (select ID from tb_course2_term where cb_id='$cb_id') and score=89;");
//$info5=mysql_fetch_array($sql5);
//$part3=$info5["part"];
//$sql6=mysql_query("select count(ID) as part from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where s_class='$class_name') and c_id in (select ID from tb_course2_term where cb_id='$cb_id') and score=85;");
//$info6=mysql_fetch_array($sql6);
//$part4=$info6["part"];
//$sql7=mysql_query("select count(ID) as part from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where s_class='$class_name') and c_id in (select ID from tb_course2_term where cb_id='$cb_id') and score=82;");
//$info7=mysql_fetch_array($sql7);
//$part5=$info7["part"];
//$sql8=mysql_query("select count(ID) as part from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where s_class='$class_name') and c_id in (select ID from tb_course2_term where cb_id='$cb_id') and score=79;");
//$info8=mysql_fetch_array($sql8);
//$part6=$info8["part"];
//$sql9=mysql_query("select count(ID) as part from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where s_class='$class_name') and c_id in (select ID from tb_course2_term where cb_id='$cb_id') and score=75;");
//$info9=mysql_fetch_array($sql9);
//$part7=$info9["part"];
//$sql10=mysql_query("select count(ID) as part from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where s_class='$class_name') and c_id in (select ID from tb_course2_term where cb_id='$cb_id') and score=72");
//$info10=mysql_fetch_array($sql10);
//$part8=$info10["part"];
//$sql11=mysql_query("select count(ID) as part from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where s_class='$class_name') and c_id in (select ID from tb_course2_term where cb_id='$cb_id') and score=69;");
//$info11=mysql_fetch_array($sql11);
//$part9=$info11["part"];
//$sql12=mysql_query("select count(ID) as part from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where s_class='$class_name') and c_id in (select ID from tb_course2_term where cb_id='$cb_id') and score=65;");
//$info12=mysql_fetch_array($sql12);
//$part10=$info12["part"];
//$sql13=mysql_query("select count(ID) as part from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where s_class='$class_name') and c_id in (select ID from tb_course2_term where cb_id='$cb_id') and score=0;");
//$info13=mysql_fetch_array($sql13);
//
//if($all_num==0) $temp=0;
//else
//{
//  $part1_a=number_format($part1/$all_num*100,2);
//  $part2_a=number_format($part2/$all_num*100,2);
//  $part3_a=number_format($part3/$all_num*100,2);
//  $part4_a=number_format($part4/$all_num*100,2);
//  $part5_a=number_format($part5/$all_num*100,2);
//  $part6_a=number_format($part6/$all_num*100,2);
//  $part7_a=number_format($part7/$all_num*100,2);
//  $part8_a=number_format($part8/$all_num*100,2);
//  $part9_a=number_format($part9/$all_num*100,2);
//  $part10_a=number_format($part10/$all_num*100,2);
//  $part11_a=number_format($part11/$all_num*100,2);	
//}
//}

$sql20=mysql_query("select avg(score) as aver from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where s_class='$class_name') and c_id in (select ID from tb_course2_term where cb_id='$cb_id')");
$info20=mysql_fetch_array($sql20);
$sql21=mysql_query("select STD(score) as biaozhuncha from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where s_class='$class_name') and c_id in (select ID from tb_course2_term where cb_id='$cb_id')");
$info21=mysql_fetch_array($sql21);

$sql2=mysql_query("select s_id from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where s_class='$class_name') and c_id in (select ID from tb_course2_term where cb_id='$cb_id') and score<'60';");
$info2=mysql_fetch_array($sql2);
if($info2==true){
	$num=0;
	$s_name2="补考名单：\n";
	do{
		$num++;
		$s_id=$info2["s_id"];
		$sql=mysql_query("select s_name from tb_s_information where ID='$s_id';");
		$info=mysql_fetch_array($sql);
		$s_name_2=$info["s_name"];
 		$s_name2=$s_name2."  ".$s_name_2;
	}while($info2=mysql_fetch_array($sql2));
	$s_name2=$s_name2."\n";
}
		
$sql32=mysql_query("select s_id from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where s_class='$class_name') and c_id in (select ID from tb_course2_term where cb_id='$cb_id') and exam_type=1;");
$info32=mysql_fetch_array($sql32);
$s_name0="";
if($info32==true){
	$num=0;
	$s_name0="缺考名单：\n";
	do{
		$num++;
		$s_id=$info2["s_id"];
		$sql=mysql_query("select s_name from tb_s_iofomation where ID='$s_id';");
		$info=mysql_fetch_array($sql);
		$s_name=$info["s_name"];
 		$s_name0=$s_name0."  ".$s_name;
		}while($info12=mysql_fetch_array($sql12));
	$s_name0=$s_name0."\n";
}
		
$sql22=mysql_query("select s_id from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where s_class='$class_name') and c_id in (select ID from tb_course2_term where cb_id='$cb_id') and exam_type=2;");
$info22=mysql_fetch_array($sql22);
$s_name1="";
if($info22==true){
	$num=0;
	$s_name1="缺考名单：\n";
	do{
		$num++;
		$s_id=$info2["s_id"];
		$sql=mysql_query("select s_name from tb_s_iofomation where ID='$s_id';");
		$info=mysql_fetch_array($sql);
		$s_name_1=$info["s_name"];
		if($num%6==0) $s_name1=$s_name1."\n";
 		$s_name1=$s_name1."  ".$s_name_1;
		}while($info22=mysql_fetch_array($sql22));
	$s_name1=$s_name1."\n";
}
	


/** Error reporting */
error_reporting(E_ALL);

date_default_timezone_set('PRC');

/** PHPExcel */
require_once'../function/PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '东北电力大学   学生考核成绩登记表')
			->mergeCells('A1:N1')
			->setCellValue('A2','学年学期：'.$xuenianqi)
			->mergeCells('A2:G2')
			->mergeCells('H2:N2')
			->setCellValue('A3','学院')
			->setCellValue('B3','经济管理学院')
			->mergeCells('B3:G3')
			->setCellValue('H3','教学班名称')
			->setCellValue('A4','课程名称')
			->mergeCells('B4:F4')
			->setCellValue('G4','学时')
			->setCellValue('I4','学分')
			->setCellValue('K4','教师')
			->mergeCells('L4:N4')
			->setCellValue('A5','学号')
			->setCellValue('B5','姓名')
			->setCellValue('C5','平时')
			->setCellValue('D5','期中')
			->setCellValue('E5','实验')
			->setCellValue('F5','期末')
			->setCellValue('G5','总成绩')
			->setCellValue('H5','学号')
			->setCellValue('I5','姓名')
			->setCellValue('J5','平时')
			->setCellValue('K5','期中')
			->setCellValue('L5','实验')
			->setCellValue('M5','期末')
			->setCellValue('N5','总成绩')
			->setCellValue('A38','成')
			->setCellValue('A39','绩')
			->setCellValue('A40','总')
			->setCellValue('A41','结')
			->setCellValue('B36','应参加考试人数')
			->mergeCells('B36:E36')
			->setCellValue('B37','实际参加考试人数')
			->mergeCells('B37:E37');
			if(substr($class_name,0,3)=='电') {
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('G36','人')
			->setCellValue('G37','人')
			->setCellValue('B38','90-100')
			->mergeCells('B38:D38')
			->setCellValue('F38','人')
			->setCellValue('B39','80-90')
			->mergeCells('B39:D39')
			->setCellValue('F39','人')
			->setCellValue('B40','70-80')
			->mergeCells('B40:D40')
			->setCellValue('F40','人')
			->setCellValue('B41','60-70')
			->mergeCells('B41:D41')
			->setCellValue('F41','人')
			->setCellValue('B42','60分以下')
			->mergeCells('B42:D42')
			->setCellValue('F42','人')
			->setCellValue('B43','平均分')
			->setCellValue('E43','标准差')
			->mergeCells('E43:F43')
			->mergeCells('C43:D43')
			->mergeCells('H36:N43')
			->setCellValue('A44','备注')
			->mergeCells('B44:N44')
			->mergeCells('A45:B45')
			->mergeCells('C45:E45')
			->mergeCells('F45:H45')
			->mergeCells('I45:J45')
			->mergeCells('K45:N45')
			->setCellValue('A45','评分人：')
			->setCellValue('C45','审核人：')
			->setCellValue('F45','成绩录入人员：')
			->setCellValue('I45','学院公章：')
			->setCellValue('K45','打印日期：'.$y.'年'.$m.'月'.$d.'日'); 
}
 else {
	$objPHPExcel->setActiveSheetIndex(0)
	->setCellValue('G36','人')
	->setCellValue('G37','人')
	->setCellValue('B38','A')
	->mergeCells('B38:D38')
	->setCellValue('F38','人')
	->setCellValue('B39','A-')
	->mergeCells('B39:D39')
	->setCellValue('F39','人')
	->setCellValue('B40','B+')
	->mergeCells('B40:D40')
	->setCellValue('F40','人')
	->setCellValue('B41','B')
	->mergeCells('B41:D41')
	->setCellValue('F41','人')
	->setCellValue('B42','B-')
	->mergeCells('B42:D42')
	->setCellValue('F42','人')
	->setCellValue('B43','C+')
	->mergeCells('B43:D43')
	->setCellValue('F43','人')
	->setCellValue('B44','C')
	->mergeCells('B44:D44')
	->setCellValue('F44','人')
	->setCellValue('B45','C-')
	->mergeCells('B45:D45')
	->setCellValue('F45','人')
	->setCellValue('B46','D+')
	->mergeCells('B46:D46')
	->setCellValue('F46','人')
	->setCellValue('B47','D')
	->mergeCells('B47:D47')
	->setCellValue('F47','人')
	->setCellValue('B48','F')
	->mergeCells('B48:D48')
	->setCellValue('F48','人')
	->setCellValue('A49','评分人：')
	->setCellValue('C49','审核人：')
	->setCellValue('F49','成绩录入人员：')
	->setCellValue('I49','学院公章：')
	->setCellValue('K49','打印日期：'.$y.'年'.$m.'月'.$d.'日');
}
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('I3',$class_name)
			->mergeCells('I3:N3')
			->setCellValue('B4',$course)
			->setCellValue('H4',$c_week_hour)
			->setCellValue('J4',$c_credit)
			->setCellValue('L4',$c_teacher)
			->setCellValue('F36',$all_num)
			->setCellValue('F37',$dinfo["should_num"])
			->setCellValue('E38',$part1)
			->setCellValue('E39',$part2)
			->setCellValue('E40',$part3)
			->setCellValue('E41',$part4)
			->setCellValue('E42',$part5);
if(substr($class_name,0,3)=='电') {
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G38',$part1_a."%")
			->setCellValue('G39',$part2_a."%")
			->setCellValue('G40',$part3_a."%")
			->setCellValue('G41',$part4_a."%")
			->setCellValue('G42',$part5_a."%")
			->setCellValue('G43',number_format($info21["biaozhuncha"],3))
			->setCellValue('C43',number_format($info20["aver"],3))
			->setCellValue('H36',$s_name2.$s_name0.$s_name1);
			}
			else {
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G38',$part1_a."%")
			->setCellValue('G39',$part2_a."%")
			->setCellValue('G40',$part3_a."%")
			->setCellValue('G41',$part4_a."%")
			->setCellValue('G42',$part5_a."%")
			->setCellValue('G43',$part6_a."%")
			->setCellValue('G44',$part2_a."%")
			->setCellValue('G45',$part2_a."%")
			->setCellValue('G46',$part2_a."%")
			->setCellValue('G47',$part2_a."%")
			->setCellValue('G48',$part2_a."%")
			->setCellValue('H49',$s_name2.$s_name0.$s_name1);
}

$sql25=mysql_query("select s_id,score from tb_score where s_term='$term' and s_id in (select ID from tb_s_information where s_class='$class_name') and c_id in (select ID from tb_course2_term where cb_id='$cb_id');");
for($i=6;$i<36;$i++){
	$info25=mysql_fetch_array($sql25);
	$s_id=$info25["s_id"];
	$score=$info25["score"];
	$sql26=mysql_query("select s_no,s_name from tb_s_information where ID='$s_id';");
	$info26=mysql_fetch_array($sql26);
	$s_no=$info26["s_no"];
	$s_name=$info26["s_name"];
	$objPHPExcel->getActiveSheet()->setCellValueExplicit('A' . $i, $s_no,PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $s_name);
	$objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $score);
}
for($j=6;$j<36;$j++){
	$info25=mysql_fetch_array($sql25);
	$s_id=$info25["s_id"];
	$score=$info25["score"];
	$sql26=mysql_query("select s_no,s_name from tb_s_information where ID='$s_id';");
	$info26=mysql_fetch_array($sql26);
	$s_no=$info26["s_no"];
	$s_name=$info26["s_name"];
	$objPHPExcel->getActiveSheet()->setCellValueExplicit('H' . $j, $s_no,PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('I' . $j, $s_name);
	$objPHPExcel->getActiveSheet()->setCellValue('N' . $j, $score);
}
			
$objPHPExcel->getActiveSheet()->freezePane('A2');

// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('班级成绩单');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(9);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(6);

$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(9);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(6);


$sharedStyle1 = new PHPExcel_Style();
$sharedStyle2 = new PHPExcel_Style();
$sharedStyle3 = new PHPExcel_Style();
$sharedStyle4 = new PHPExcel_Style();
$sharedStyle5 = new PHPExcel_Style();
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
							),
		'font' => array(
								'size' => 9
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
							),
		'font' => array(
								'size' => 9
							)
		
		 ));


$sharedStyle3->applyFromArray(
	array(
		'font' => array(
								'size' => 9
							)
		 ));
$sharedStyle4->applyFromArray(
	array(
		'font' => array(
								'size' => 14,
								'bold' => true
							),
		'alignment' => array(
								'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
							)
		 ));
$sharedStyle5->applyFromArray(
	array(
		'alignment' => array(
								'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
							),
		'font' => array(
								'size' => 9
							)

		 ));
		 
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle3, "A2:N45");
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A3:N44"); 
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle4, "A1:N1");
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle5, "A36:A42");
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle2, "A3:N5");
$objPHPExcel->getActiveSheet()->getStyle('H36')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('H36')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$objPHPExcel->getActiveSheet()->getStyle('H36')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
$objPHPExcel->getActiveSheet()->getStyle('A36:A42')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
$objPHPExcel->getActiveSheet()->getStyle('A2:N2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('A2:N2')->getFill()->getStartColor()->setARGB('FFFFFFFF');
$objPHPExcel->getActiveSheet()->getStyle('A36:A42')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('A36:A42')->getFill()->getStartColor()->setARGB('FFFFFFFF');


// Redirect output to a client's web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename='.iconv('utf-8','gbk',$class_name).iconv('utf-8','gbk',$course).iconv('utf-8','gbk','成绩').'.xlsx');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>