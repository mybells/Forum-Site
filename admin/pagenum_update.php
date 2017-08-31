<?php
    session_start();
	require_once('../connect.php');
	 $postnum = $_POST['ye'];
	 $updatesql = "update vb_postnum set postnum_num='$postnum' where postnum_id=1";
	if(mysql_query($updatesql)){
		echo "<script>alert('设置成功');window.history.go(-1);</script>";
	}else{
		echo "<script>alert('设置失败');window.history.go(-1);</script>";
	}
?>