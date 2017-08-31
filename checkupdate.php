<?php
require_once('connect.php');
session_start();
//修改查看数量
$checkid=$_GET['id'];
$selectsql="select * from vb_post where post_id=$checkid";
$selectdata=mysql_query($selectsql);
$selectrow=mysql_fetch_array($selectdata);
$check=$selectrow['post_checknum']+1;
$updatesql = "update vb_post set post_checknum='$check' where post_id=$checkid";
if(mysql_query($updatesql)){
		echo "<script>window.location.href='forum.php?id=".$checkid."&p=1';</script>";
	}else{
		echo "<script>window.location.href='index.php';</script>";
	}
?>