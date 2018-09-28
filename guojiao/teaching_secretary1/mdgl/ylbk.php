<html>
	<head>
		<link type="text/css" rel="stylesheet" href="../../css/style.css">
		<style type="text/css">
			table tr td {
				padding:0px;
				margin: 0px;
			}
		</style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body class="ziye_style">
		<?php
		include("../../function/conn.php");
		mysql_query("set names utf8");
		$grade=date("Y")-4;
		$sql=mysql_query("select grade,major,s_no,s_name,s_class,c_name,c_no,c_kind,credit,term,eff_score from stu_info where eff_score<60 and grade=$grade order by s_no");
		$info=mysql_fetch_array($sql);
		$i=1;
		echo "<table width='95%' align='center' border='1' bordercolor='#000' cellpadding='0' cellspacing='0'>";
		echo "<tr  align='center'>";
		echo "<td width='7%'>序号</td>";
		echo "<td width='8%'>年级</td>";
		echo "<td width='11%'>班级</td>";
		echo "<td width='15	%'>专业</td>";
		echo "<td width='12%'>学号</td>";
		echo "<td width='10%'>姓名</td>";
		echo "<td width='15%'>科目</td>";
		echo "<td width='12%'>课程编号</td>";
		echo "<td width='13%'>考试性质</td>";
		echo "<td width='13%'>学分</td>";
		echo "<td width='13%'>学期</td>";
		echo "<td width='13%'>成绩</td>";
		echo "</tr>";
		do {	
			echo "<tr  align='center'>";
			echo "<td>".$i++."</td>";
			echo "<td>".$info['grade']."</td>";
			echo "<td>".$info['s_class']."</td>";
			echo "<td>".$info['major']."</td>";
			echo "<td>".$info['s_no']."</td>";
			echo "<td>".$info['s_name']."</td>";
			echo "<td>".$info['c_name']."</td>";
			echo "<td>".$info['c_no']."</td>";
			echo "<td>".$info['c_kind']."</td>";
			echo "<td>".$info['credit']."</td>";
			echo "<td>".$info['term']."</td>";
			echo "<td>".$info['eff_score']."</td>";
			echo "</tr>";
		}while($info=mysql_fetch_array($sql));
		echo "</table>";
		?>
	</body>
</html>