<?php
//连接数据库
	header("Content-type: text/html; charset=utf-8");
	define('HOST', '127.0.0.1');
	define('USERNAME', 'root');
	define('PASSWORD', '123');
	//require_once('config.php');
	//连库
	if(!(@$con=mysql_connect(HOST, USERNAME, PASSWORD))){
		 echo mysql_error();
	}
	//选库
	if(!mysql_select_db('vbbbs')){
		echo mysql_error();	
	}
	//字符集
	if(!mysql_query('set names utf8')){
		echo mysql_error();		
	}
?>