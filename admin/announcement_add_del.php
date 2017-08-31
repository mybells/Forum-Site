<?php 
require_once('../connect.php');
session_start();
$id=$_GET['id'];
$title=$_POST['title'];

//$content="<pre>".htmlspecialchars(addslashes($_POST['content']))."</pre>";
$content1=$_POST['content'];
$content=htmlspecialchars(addslashes(preg_replace('/\n/','<br>',$content1)));
echo $content;
$editor=$_SESSION['username'];
if ($id) {
		$sql = "delete from vb_announcement where announcement_id=$id";
	if(mysql_query($sql)){
		echo "<script>alert('删除成功');window.history.go(-1);</script>";
	}else{
		echo "<script>alert('删除失败');window.history.go(-1);</script>";
	}
}

if ($title!=""&&$content!=""&&$editor!="") {
	$insertsql = "insert into vb_announcement(announcement_name,announcement_editor,announcement_content) values ('$title','$editor','$content')";
	if(mysql_query($insertsql)){
		echo "<script>alert('添加成功');window.history.go(-1);</script>";}else{
		echo "<script>alert('添加失败');window.history.go(-1);</script>";
	     }
	}
?>
