<?php
require_once('connect.php');
session_start();
    //验证用户名是否重复
	$usname=$_GET['username'];
	$sql=mysql_query("select * from vb_user where user_username='$usname'");
	$info=mysql_fetch_array($sql);
	if ($usname=="") {
		echo "";
	}else if($info){
		echo "此用户名已被注册!";return false;
	}else{
		echo "此用户名可用";return true;
	}
	//提交注册信息
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sex = $_POST['sex'];
	$insertsql = "insert into vb_user(user_username,user_password,user_sex) values ('$username','$password','$sex')";
	if(mysql_query($insertsql)){
		$_SESSION['username']=$username;
		echo "<script>alert('注册成功');window.location.href='index.php';</script>";
	}else{
		echo "<script>alert('注册失败');window.location.href='register.php';</script>";
	}
	?>









  