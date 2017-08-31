<?php
require_once('connect.php');
session_cache_limiter('private'); //不清空表单
session_start();
	// if (!empty($_POST['content'])) {
	// 	if (get_magic_quotes_gpc()) {
	// 		$htmlData = stripslashes($_POST['content']);
	// 	} else {
	// 		$htmlData = $_POST['content'];
	// 	}
	// } 
$content=htmlspecialchars(addslashes($_POST['content']));
$zhuti=$_POST["zhuti"];
$title=$_POST["title"];
$editor=$_SESSION['username'];
$replynum=0;
$checknum=0;
if($editor==""){
		echo "<script>alert('请先登录');window.location.href='login.php';</script>";
	     }else if ($content!=""&&$zhuti!=""&&$title!=""&&$editor!="") {	
	$insertsql = "insert into vb_post(post_theme,post_title,post_editor,post_replynum,post_checknum,post_content) values ('$zhuti','$title','$editor','$replynum','$checknum','$content')";
	if(mysql_query($insertsql)){
		echo "<script>alert('发帖成功');window.location.href='index.php';</script>";}
	else {echo "<script>alert('发帖失败');window.history.back();</script>";}}
?>
