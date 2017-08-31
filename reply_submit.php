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
$reply1id=$_GET['id'];
$con=$_GET['con'];
$user=$_GET['user'];
$tm=$_GET['tm'];
$usertm=$user."&nbsp".$tm;
$replyparentid=$_POST['replyparentid'];
$replytitle=$_POST['replytitle'];
$replycontent=htmlspecialchars(addslashes($_POST['replycontent']));
$replyusername=$_SESSION['username'];
//$replytouser=htmlspecialchars(addslashes($_POST['replytouser']));
if($replyusername==""){
		echo "<script>alert('请先登录');window.location.href='login.php';</script>";
	     }else if ($replytitle!=""&&$replyparentid!=""&&$replycontent!=""&&$replyusername!="") {	
	$replyinsertsql = "insert into vb_replypost(replypost_parentid,replypost_title,replypost_content,replypost_username,replypost_replytousertm,replypost_replytocon) values ('$replyparentid','$replytitle','$replycontent','$replyusername','$usertm','$con')";
	if(mysql_query($replyinsertsql)){
		echo "<script>window.location.href='replyupdate.php?id=".$reply1id."';</script>";
		//echo "<script>window.history.go(-2);</script>";
		}
	else {echo "<script>alert('回复失败');window.history.go(-1);</script>";}}
?>
