 <?php
	require_once('connect.php');
	session_start();
	//用户登录验证	
	$username=$_POST['username'];
	$password=$_POST['password'];
$sql="select * from vb_user where user_username='{$username}'";  
$rs=mysql_query($sql); //执行sql查询
$num=mysql_num_rows($rs); //获取记录数
if($num){ // 用户存在；
   $row=mysql_fetch_array($rs);
if($username===$row['user_username']&&$password===$row['user_password']){ //对密码进行判断。
    $_SESSION['username']=$row['user_username'];
    echo "<script>window.history.go(-2);</script>";
    }
    else{
echo "<script>alert('信息不正确,返回登陆页面');window.location.href='login.php';</script>";
}
 }
else{
 echo "<script>alert('信息不正确,返回登陆页面');window.location.href='login.php';</script>";
}

?>