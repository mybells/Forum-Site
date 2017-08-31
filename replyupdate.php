<?php
require_once('connect.php');
session_start();
//修改huifu数量
$replyid=$_GET['id'];
$selectsql="select * from vb_post where post_id=$replyid";
$selectdata=mysql_query($selectsql);
$selectrow=mysql_fetch_array($selectdata);
$reply=$selectrow['post_replynum']+1;
$updatesql = "update vb_post set post_replynum='$reply' where post_id=$replyid";
if(mysql_query($updatesql)){
	    echo "<script>window.history.go(-2);</script>";
	}else{
		echo "<script>window.location.href='index.php';</script>";
	}
?>