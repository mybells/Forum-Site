<?php
    session_start();
    //登录页面
    ?>
<html>
<head>
<meta charset="UTF-8">
	<title>用户登录 - VB论坛</title>
  <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body style="
          background: url(images/12.png) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
">
<a href="index.php"><img src="images/vb.png"></img></a>
  <div> 
  <legend>用户登录<span>没有账号？<a href="register.php">立即注册</a></span></legend>
 <form name="myform" method="post" action="login_submit.php">
<p>
<label for="username" class="label">用户名</label></br>
<input id="username" name="username" type="text" class="input" required="required" placeholder="请输入用户名"/>
<p>
<label for="password" class="label">密码</label></br>
<input id="password" name="password" type="password" class="input" required="required" placeholder="请输入密码"/>
<p/>
<p>
<input type="submit" name="submit" value="登 录" class="submit" />
</p>
</form>
  </div>
</body>
</html>