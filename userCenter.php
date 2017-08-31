 if (opacity <0.1) {
				this.setState({
					bool:true
				})
            }
			if (opacity >0.9) {
				this.setState({
					bool:false
				});
            }
			if(this.state.bool){
				opacity += .05;
			}
			if(!this.state.bool){
				opacity -= .05;
				
			}<?php 
require_once('connect.php');
session_start();

$nme=$_SESSION['username'];
$s=$_GET['s'];
$g=$_GET['g'];
if ($s) {
}else{$s=1;}
$sqlcount1="select * from vb_post where post_editor='$nme'";
$datacount1=mysql_query($sqlcount1);

$sqlcount2="select * from vb_replypost where replypost_username='$nme' order by replypost_id ASC";
$datacount2=mysql_query($sqlcount2);

if ($nme!="root") {
	$sqlcount3="select * from vb_user where user_username='$nme'";
$datacount3=mysql_query($sqlcount3);
$row3 = mysql_fetch_assoc($datacount3);
}else{
	$sqlcount3="select * from vb_admin where admin_name='$nme'";
$datacount3=mysql_query($sqlcount3);
$row3 = mysql_fetch_assoc($datacount3);
}


$sqlcount4="select * from vb_link";
$datacount4=mysql_query($sqlcount4);

?>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>个人中心 - VB论坛</title>
        <link rel="stylesheet" type="text/css" href="css/admin.css" />
    <!-- Bootstrap -->
    <link href="public/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="public/jquery.min.js"></script>
    <script src="public/bootstrap/js/bootstrap.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
        <script>
        $(function(){
if($(".left").height() > $(".right").height()){
$(".right").css("height",$(".left").height()) 
}else{
$(".left").css("height",$(".right").height()+12) 
}
})</script>
  </head>
<body style="  background: url(images/12.png) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;width:960px; margin-left: auto;margin-right:auto;margin-top: 35px;">
<div class="top" style="padding:8px;height:35px;width:100%;position:absolute;top:0px;left:0px;background-color:#f8f8f8;border-bottom:0.5px solid #cad9ea;">
<span class="top_left">欢迎来到<a href="index.php" style="color:#000;">VB论坛!</a></span>
<?php if ($_SESSION['username']) {?>
       <span class="top_right" style="float:right"><a href="index.php" target="_blank">站点首页</a>&nbsp;丨&nbsp;欢迎您  
       <?php echo $_SESSION['username']; ?>&nbsp;丨&nbsp;<a href="session_stop.php">退出</a></span>
<?php }else{ ?>
<span class="top_right" style="float:right"><a href="index.php">登录</a>&nbsp;丨&nbsp;<a href="register.php">注册</a></span>
<?php }?>
</div>


<div class="bor" style="width:100%;border:1px solid #e7e7e7; min-height:300px;max-height:1000px;height:500;overflow:auto;">
    <div class="left" style="padding-top:10px;padding-left:10px;width:130px;background:#bddaef;height:100%;float:left">
    	<div style="border-bottom:1px solid #7f7f7f;font-weight:bold;padding-bottom:3px;"><font size="4px">个人中心</font>
    	</div>
<?php if ($s==1) {?>
	<a href="userCenter.php?s=1" style="color:#000" onclick="col('#div1')" ><div id="div1" style="border-bottom:1px solid #7f7f7f;height:35px;text-align:center;padding-top:6px;background:#fff;"><span class="glyphicon glyphicon-triangle-bottom"></span><font size="3px">个人资料</font>
        </div></a>
    <div id="div1" style="border-bottom:1px solid #7f7f7f;height:35px;padding-top:6px;">
    	<ul>
    		<li><a href="userCenter.php?s=1&g=1">修改密码</a></li>
    	</ul>
    </div>
<?php }else{?>
        <a href="userCenter.php?s=1" style="color:#000" onclick="col('#div1')" ><div id="div1" style="border-bottom:1px solid #7f7f7f;height:35px;text-align:center;padding-top:6px;"><span class="glyphicon glyphicon-triangle-right"></span><font size="3px">个人资料</font>
        </div></a><?php }?>


<?php if ($s==2) {?>
	<a href="userCenter.php?s=2" style="color:#000" onclick="col('#div2')" ><div id="div3" style="border-bottom:1px solid #7f7f7f;height:35px;text-align:center;padding-top:6px;background:#fff;"><span class="glyphicon glyphicon-triangle-bottom"></span><font size="3px">已发帖子</font>
        </div></a>
        <div id="div1" style="border-bottom:1px solid #7f7f7f;height:55px;padding-top:6px;">
    	<ul>
    	    <li><a href="userCenter.php?s=2&g=2">查看已发帖</a></li>
    		<li><a href="userCenter.php?s=2&g=3">删除已发帖</a></li>
    	</ul>
    </div>
<?php }else{?>
        <a href="userCenter.php?s=2" style="color:#000" onclick="col('#div2')" ><div id="div3" style="border-bottom:1px solid #7f7f7f;height:35px;text-align:center;padding-top:6px;"><span class="glyphicon glyphicon-triangle-right"></span><font size="3px">已发帖子</font>
        </div></a>
        <?php }?>


<?php if ($s==3) {?>
	<a href="userCenter.php?s=3" style="color:#000" onclick="col('#div3')" ><div id="div3" style="border-bottom:1px solid #7f7f7f;height:35px;text-align:center;padding-top:6px;background:#fff;"><span class="glyphicon glyphicon-triangle-bottom"></span><font size="3px">已发评论</font>
        </div></a>
        <div id="div3" style="border-bottom:1px solid #7f7f7f;height:55px;padding-top:6px;">
    	<ul>
    	    <li><a href="userCenter.php?s=3&g=4">查看评论</a></li>
    		<li><a href="userCenter.php?s=3&g=5">删除评论</a></li>
    	</ul>
    </div>
<?php }else{?>
        <a href="userCenter.php?s=3" style="color:#000" onclick="col('#div3')" ><div id="div3" style="border-bottom:1px solid #7f7f7f;height:35px;text-align:center;padding-top:6px;"><span class="glyphicon glyphicon-triangle-right"></span><font size="3px">已发评论</font>
        </div></a>
        <?php }?>

</div>
<div class="right" style="float:left;padding:10px;"> 
<?php if ($s==1&&$g=="") {//个人资料
	if ($nme!="root") {?>
		<div style="margin-left:15px;margin-top:5px;">
    <div style="font-size:19;font-weight:bold;margin-bottom:10px;">个人资料</div>
    <div style="margin-bottom:10px;"><font size="4">用户名：<?php echo $row3['user_username'] ?></font></div>
    <div style="margin-bottom:10px;"><font size="4">密&nbsp;&nbsp;&nbsp;&nbsp;码：<?php echo $row3['user_password'] ?></font></div>
    <div style="margin-bottom:10px;"><font size="4">性&nbsp;&nbsp;&nbsp;&nbsp;别：<?php echo $row3['user_sex'] ?></font></div>
    </div>
	<?php }else{?>  
    <div style="margin-left:15px;margin-top:5px;">
    <div style="font-size:19;font-weight:bold;margin-bottom:10px;">个人资料</div>
    <div style="margin-bottom:10px;"><font size="4">用户名：<?php echo $row3['admin_name'] ?></font></div>
    <div style="margin-bottom:10px;"><font size="4">密&nbsp;&nbsp;&nbsp;&nbsp;码：<?php echo $row3['admin_password'] ?></font></div>
    <div style="margin-bottom:10px;"><font size="4">性&nbsp;&nbsp;&nbsp;&nbsp;别：<?php echo $row3['admin_sex'] ?></font></div>
    </div> 	
<?php }}?>
<?php if ($s==1&&$g==1) {//修改密码?> 
<div style="margin-left:15px;margin-top:5px;">
         <div style="font-size:19;font-weight:bold;margin-bottom:20px;">修改密码</div>
         <form action="update_password.php" method="post">
         <input type="hidden" name="nas" value="<?php echo $nme?>">
         <?php if ($nme!="root") {?>
         <div style="margin-bottom:10px;"><font size="4">&nbsp;原 密 码：<?php echo $row3['user_password'] ?></div><?php }else{ ?>
         	<div style="margin-bottom:10px;"><font size="4">&nbsp;原 密 码：<?php echo $row3['admin_password'] ?></div><?php }?>
         <div style="margin-bottom:10px;"><font size="4">&nbsp;新 密 码：<input type="password" required name="pas"></font></div>
         <div style="margin-bottom:15px;"><font size="4">确认密码&nbsp;:&nbsp;<input type="password" required name="pas1"></font></div>
         <div><input class="btn btn-default" type="submit"></div>
         </form>
 </div>
<?php }?>
<?php if ($s==2&&$g=="2"||$s==2&&$g=="") {//已发帖子?>
		<div style="margin-left:15px;margin-top:5px;">
         <div style="font-size:19;font-weight:bold;margin-bottom:20px;">查看已发帖</div>
         <div>
    	<table border="1px solid #ccc" style="width:750px;">
    		<tr>
    			<td>标题</td>
    			<td>回复量</td>
    			<td>查看量</td>
    			<td>发布时间</td>
    		</tr>
<?php while ($row1 = mysql_fetch_assoc($datacount1)) {?>
            <tr style="height:40px;">
    			<td><a href="forum.php?id=<?php echo $row1['post_id'];?>&p=1" style="color:#000"><?php echo $row1['post_title'];?></a></td>
    			<td><?php echo $row1['post_replynum'];?></td>
    			<td><?php echo $row1['post_checknum'];?></td>
    			<td><?php echo $row1['post_posttime'];?></td>
    		</tr>
<?php }?>
    	</table>
    </div>
         </div>
<?php }?>
<?php if ($s==2&&$g=="3") {//删除已发帖子?>
 		<div style="margin-left:15px;margin-top:5px;">
         <div style="font-size:19;font-weight:bold;margin-bottom:20px;">删除已发帖</div>
         <div>
    	<table border="1px solid #ccc" style="width:750px;">
    		<tr>
    			<td>标题</td>
    			<td>回复量</td>
    			<td>查看量</td>
    			<td>发布时间</td>
    			<td></td>
    		</tr>
<?php while ($row1 = mysql_fetch_assoc($datacount1)) {?>
            <tr style="height:40px;">
    			<td><?php echo $row1['post_title'];?></td>
    			<td><?php echo $row1['post_replynum'];?></td>
    			<td><?php echo $row1['post_checknum'];?></td>
    			<td style="width:90px"><?php echo $row1['post_posttime'];?></td>
    			<td style="text-align:center;"><button onclick="deltie(<?php echo $row1['post_id'];?>)">删除</button></td>
    		</tr>
<?php }?>
    	</table>
    </div>
         </div>
<?php }?>

<?php if ($s==3&&$g=="4"||$s==3&&$g=="") {//已发评论?>
			<div style="margin-left:15px;margin-top:5px;">
         <div style="font-size:19;font-weight:bold;margin-bottom:20px;">查看已发评论</div>
         <div>
    	<table border="1px solid #ccc" style="width:750px;">
    		<tr>
    			<td>帖子标题</td>
    			<td>发表的评论</td>
    			<td>发表时间</td>
    		</tr>
<?php while ($row2 = mysql_fetch_assoc($datacount2)) {
	        $content1=htmlspecialchars_decode($row2['replypost_content']);
            $content2=strip_tags($content1);
               if (strlen($content2)>7) {
                  $con=mb_substr($content2,0,7,"utf-8")."...";
               }else{$con=$content2;}?>
            <tr style="height:40px;">
    			<td><a href="forum.php?id=<?php echo $row2['replypost_parentid'];?>&p=1" style="color:#000"><?php echo $row2['replypost_title'];?></a></td>
    			<td><?php echo $con;?></td>
    			<td><?php echo $row2['replypost_replytime'];?></td>
    		</tr>
<?php }?>
    	</table>
    </div>
         </div>
<?php }?>
<?php if ($s==3&&$g==5) {//删除已发评论?>
			<div style="margin-left:15px;margin-top:5px;">
         <div style="font-size:19;font-weight:bold;margin-bottom:20px;">删除已发评论</div>
         <div>
    	<table border="1px solid #ccc" style="width:750px;">
    		<tr>
    			<td>帖子标题</td>
    			<td>发表的评论</td>
    			<td>发表时间</td>
    			<td></td>
    		</tr>
<?php while ($row2 = mysql_fetch_assoc($datacount2)) {
	        $content1=htmlspecialchars_decode($row2['replypost_content']);
            $content2=strip_tags($content1);
               if (strlen($content2)>7) {
                  $con=mb_substr($content2,0,7,"utf-8")."...";
               }else{$con=$content2;}?>
            <tr style="height:40px;">
    			<td><?php echo $row2['replypost_title'];?></td>
    			<td><?php echo $con;?></td>
    			<td style="width:100px"><?php echo $row2['replypost_replytime'];?></td>
    			<td style="text-align:center;"><button onclick="del(<?php echo $row2['replypost_id'];?>)">删除</button></td>
    		</tr>
<?php }?>
    	</table>
    </div>
         </div>
<?php }?>

</div>	
</div>
<div style="border-top:1px solid #ccc;text-align:center;margin-top:20px;">
<center>
<table style="text-align:center;">
	<tr style="padding:0 auto;height:30px;font-size:14">
	<?php while ($row4 = mysql_fetch_assoc($datacount4)) {?>
		<td style="padding-left:10px;padding-right:10px;"><a href="<?php echo $row4['link_www']?>" target="_blank;" style="color:#838383"><?php echo $row4['link_name']?></a></td>
		<?php }?>

	</tr>
</table></center>
<div>
<h5>© 2017 VB论坛</h5><h5 id="er">联系邮箱:435541908@qq.com</h5></div>
</div>

<script>
function deltie(id){
    var r=confirm("确定删除此条帖子？")
  if (r==true)
    {
   window.location.href="admin/post_del.php?id="+id;
    }
  else
    {
    }
	
}
function del(id){
      var rs=confirm("确定删除此条评论？")
  if (rs==true)
    {
  window.location.href="del_content.php?id="+id;
    }
  else
    {
    }

}
</script>
</body>
</html>