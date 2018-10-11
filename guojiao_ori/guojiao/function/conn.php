<?php
//此数据库文件应放到mysql数据库安装目录下的data文件夹下D:\wamp\bin\mysql\mysql5.5.8\data
$conn= @mysql_connect("localhost","root","123") or die("数据库服务器连接错误".mysql_error());
mysql_select_db("ciesql1",$conn) or die("数据库访问错误".mysql_error());
mysql_query("set names utf8");
?>