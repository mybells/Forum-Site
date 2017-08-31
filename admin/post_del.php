<?php 
require_once('../connect.php');
session_start();
$id=$_GET['id'];
if ($id) {
		$sql = "delete from vb_post where post_id=$id";
	if(mysql_query($sql)){
		echo "<script>alert('删除成功');window.history.go(-1);</script>";
	}else{
		echo "<script>alert('删除失败');window.history.go(-1);</script>";
	}
}

?>