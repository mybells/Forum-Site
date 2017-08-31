<?php 
require_once('../connect.php');
session_start();
$id=$_GET['id'];
$name=$_POST['zhan'];
$www=$_POST['wang'];
if ($id) {
		$sql = "delete from vb_link where link_id=$id";
	if(mysql_query($sql)){
		echo "<script>alert('删除成功');window.history.go(-1);</script>";
	}else{
		echo "<script>alert('删除失败');window.history.go(-1);</script>";
	}
}

if ($name!=""&&$www!="") {
	$insertsql = "insert into vb_link(link_name,link_www) values ('$name','$www')";
	if(mysql_query($insertsql)){
		echo "<script>alert('添加成功');window.history.go(-1);</script>";}else{
		echo "<script>alert('添加失败');window.history.go(-1);</script>";
	     }
	}
?>