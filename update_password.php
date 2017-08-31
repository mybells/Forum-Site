<?php //修改用户密码
require_once('connect.php');
session_start();
$nas=$_POST['nas'];
$pas=$_POST['pas'];
$pas1=$_POST['pas1'];
if ($nas!="root") {
if ($pas==$pas1) {
$updatesql = "update vb_user set user_password='$pas' where user_username='$nas'";
if(mysql_query($updatesql)){
		echo "<script>window.history.go(-1);alert('修改成功')</script>";
	}else{
		echo "<script>window.history.go(-1);alert('修改失败')</script>";
	}
}else{
	echo "<script>window.history.go(-1);alert('两次密码不一致，请重新输入')</script>";
}
}else{
	if ($pas==$pas1) {
		$updatesql1 = "update vb_user set user_password='$pas' where user_username='$nas'";
$updatesql = "update vb_admin set admin_password='$pas' where admin_name='$nas'";
if(mysql_query($updatesql)&&mysql_query($updatesql1)){
		echo "<script>window.history.go(-1);alert('修改成功')</script>";
	}else{
		echo "<script>window.history.go(-1);alert('修改失败')</script>";
	}
}else{
	echo "<script>window.history.go(-1);alert('两次密码不一致，请重新输入')</script>";
}

}
?>