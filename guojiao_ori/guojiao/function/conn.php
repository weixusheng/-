<?php
//�����ݿ��ļ�Ӧ�ŵ�mysql���ݿⰲװĿ¼�µ�data�ļ�����D:\wamp\bin\mysql\mysql5.5.8\data
$conn= @mysql_connect("localhost","root","123") or die("���ݿ���������Ӵ���".mysql_error());
mysql_select_db("ciesql1",$conn) or die("���ݿ���ʴ���".mysql_error());
mysql_query("set names utf8");
?>