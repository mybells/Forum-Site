 <?php
	require_once('../connect.php');
	session_start();
	//用户登录验证	
	$username=$_POST['username'];
	$password=$_POST['password'];
$sql="select * from vb_admin where admin_name='{$username}'";  
$rs=mysql_query($sql); //执行sql查询
$num=mysql_num_rows($rs); //获取记录数
if($num){ // 用户存在；
   $row=mysql_fetch_array($rs);
if($username===$row['admin_name']&&$password===$row['admin_password']){ //对密码进行判断。
    $_SESSION['username']=$row['admin_name'];
    echo "<script>window.location.href='guanli.php';</script>";
    }
    else{
echo "<script>alert('信息不正确,返回登陆页面');window.location.href='index.php';</script>";
}
 }
else{
 echo "<script>alert('信息不正确,返回登陆页面');window.location.href='index.php';</script>";
}

?>