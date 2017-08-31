<?php
    session_start();
    //注册页面
    ?>
<html>
<head>
<meta charset="UTF-8">
	<title>用户注册 - VB论坛</title>
	  	 
  <link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body style="  background: url(images/12.png) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
<a href="index.php"><img src="images/vb.png"></img></a>
<div>
  <legend>用户注册<span class="qw">已有账号？<a href="login.php">立即登录</a></span></legend>
<form name="myform" method="post" action="register_submit.php" onsubmit="return check()" >
<p>
<label for="username" class="label">用户名</label></br>
<input id="username" name="username" required="required" type="text" class="input" placeholder="请输入用户名" onchange="judge()" /><b id="tiq"></b>
<p/>
<p>
<label for="password" class="label">密码</label></br>
<input id="password" name="password" required="required" type="password" class="input" placeholder="请输入密码"onchange="confirm()"/>
<p/>
<p>
<label for="password1" class="label">密码确认</label></br>
<input id="password1" name="password1" required="required" type="password" class="input" placeholder="请输入确认密码" onchange="confirm()" /><b id="tip"></b>
<p/>
<p>
<label  class="gender">性别:</label>
<input name="sex"  type="radio" value="男" checked/><span class="push">男</span>
<input name="sex"  type="radio" value="女" /><span class="push">女</span>
<p/>
<p>
<input type="submit" name="submit" value="立即注册" class="submit" />
</p>
</form>
</div>
 <script type="text/javascript" src="js/register_judge2.js"></script>
</body>
</html>