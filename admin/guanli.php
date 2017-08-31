<?php 
require_once('../connect.php');
session_start();
$s=$_GET['s'];
$g=$_GET['g'];
$page=$_GET['p'];
$showpage=5;//显示五个页码    
$pagesize=10;//每页显示几条数据
$offset=($page-1)*$pagesize;//每页的起始limit $offset,$pagesize
$sql1 = "select * from vb_post limit $offset,$pagesize";
$data = mysql_query($sql1); //执行sql

$sqlcount1="select * from vb_post";
$datacount1=mysql_query($sqlcount1);
$num1=mysql_num_rows($datacount1); //获取记录数
$pagecount=ceil($num1/$pagesize);//总页数

$sqlcount2="select postnum_num from vb_postnum";
$datacount2=mysql_query($sqlcount2);
$row2 = mysql_fetch_array($datacount2);

$sqlcount3="select * from vb_user";
$datacount3=mysql_query($sqlcount3);

$sqlcount4="select * from vb_link";
$datacount4=mysql_query($sqlcount4);
if ($s) {
}else{$s=1;}
$asql="select * from vb_announcement";
$adata = mysql_query($asql); //执行asql
if($_SESSION['username']!="root"){
	echo "<script>window.location.href='index.php'</script>";
}
?>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>论坛管理 - VB论坛</title>
        <link rel="stylesheet" type="text/css" href="../css/admin.css" />
    <!-- Bootstrap -->
    <link href="../public/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="../public/jquery.min.js"></script>
    <script src="../public/bootstrap/js/bootstrap.js"></script>
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
<body style="  background: url(../images/12.png) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;width:960px; margin-left: auto;margin-right:auto;margin-top: 35px;">
<div class="top" style="padding:8px;height:35px;width:100%;position:absolute;top:0px;left:0px;background-color:#f8f8f8;border-bottom:0.5px solid #cad9ea;">
<span class="top_left">欢迎来到<a href="index.php" style="color:#000;">VB论坛!</a></span>
<?php if ($_SESSION['username']) {?>
       <span class="top_right" style="float:right"><a href="../index.php" target="_blank">站点首页</a>&nbsp;丨&nbsp;欢迎您  
       <?php echo $_SESSION['username']; ?>&nbsp;丨&nbsp;<a href="../session_stop.php">退出</a></span>
<?php }else{ ?>
<span class="top_right" style="float:right"><a href="index.php">登录</a>&nbsp;丨&nbsp;<a href="../register.php">注册</a></span>
<?php }?>
</div>


<div class="bor" style="width:100%;border:1px solid #e7e7e7; min-height:300px;max-height:1000px;height:500;overflow:auto;">
    <div class="left" style="padding-top:10px;padding-left:10px;width:130px;background:#bddaef;height:100%;float:left">
    	<div style="border-bottom:1px solid #7f7f7f;font-weight:bold;padding-bottom:3px;"><font size="4px">设置</font>
    	</div>
<?php if ($s==1) {?>
	<a href="guanli.php?s=1" style="color:#000" onclick="col('#div1')" ><div id="div1" style="border-bottom:1px solid #7f7f7f;height:35px;text-align:center;padding-top:6px;background:#fff;"><span class="glyphicon glyphicon-triangle-bottom"></span><font size="3px">公告管理</font>
        </div></a>
    <div id="div1" style="border-bottom:1px solid #7f7f7f;height:55px;padding-top:6px;">
    	<ul>
    		<li><a href="guanli.php?s=1&g=1">添加公告</a></li>
    		<li><a href="guanli.php?s=1&g=2">删除公告</a></li>
    	</ul>
    </div>
<?php }else{?>
        <a href="guanli.php?s=1" style="color:#000" onclick="col('#div1')" ><div id="div1" style="border-bottom:1px solid #7f7f7f;height:35px;text-align:center;padding-top:6px;"><span class="glyphicon glyphicon-triangle-right"></span><font size="3px">公告管理</font>
        </div></a><?php }?>


<?php if ($s==2) {?>
	<a href="guanli.php?s=2" style="color:#000" onclick="col('#div2')" ><div id="div3" style="border-bottom:1px solid #7f7f7f;height:35px;text-align:center;padding-top:6px;background:#fff;"><span class="glyphicon glyphicon-triangle-bottom"></span><font size="3px">帖子管理</font>
        </div></a>
        <div id="div1" style="border-bottom:1px solid #7f7f7f;height:55px;padding-top:6px;">
    	<ul>
    		<li><a href="guanli.php?s=2&g=3">删除帖子</a></li>
    		<li><a href="guanli.php?s=2&g=4">每页帖数</a></li>
    	</ul>
    </div>
<?php }else{?>
        <a href="guanli.php?s=2" style="color:#000" onclick="col('#div2')" ><div id="div3" style="border-bottom:1px solid #7f7f7f;height:35px;text-align:center;padding-top:6px;"><span class="glyphicon glyphicon-triangle-right"></span><font size="3px">帖子管理</font>
        </div></a>
        <?php }?>


<?php if ($s==3) {?>
	<a href="guanli.php?s=3" style="color:#000" onclick="col('#div3')" ><div id="div3" style="border-bottom:1px solid #7f7f7f;height:35px;text-align:center;padding-top:6px;background:#fff;"><span class="glyphicon glyphicon-triangle-bottom"></span><font size="3px">用户管理</font>
        </div></a>
        <div id="div1" style="border-bottom:1px solid #7f7f7f;height:33px;padding-top:6px;">
    	<ul>
    		<li><a href="guanli.php?s=3">删除用户</a></li>
    	</ul>
    </div>
<?php }else{?>
        <a href="guanli.php?s=3" style="color:#000" onclick="col('#div3')" ><div id="div3" style="border-bottom:1px solid #7f7f7f;height:35px;text-align:center;padding-top:6px;"><span class="glyphicon glyphicon-triangle-right"></span><font size="3px">用户管理</font>
        </div></a><?php }?>


<?php if ($s==4) {?>
	<a href="guanli.php?s=4" style="color:#000" onclick="col('#div4')" ><div id="div4" style="border-bottom:1px solid #7f7f7f;height:35px;text-align:center;padding-top:6px;background:#fff;"><span class="glyphicon glyphicon-triangle-bottom"></span><font size="3px">链接管理</font>
        </div></a>
        <div id="div1" style="border-bottom:1px solid #7f7f7f;height:55px;padding-top:6px;">
    	<ul>
    		<li><a href="guanli.php?s=4&g=5">添加链接</a></li>
    		<li><a href="guanli.php?s=4&g=6">删除链接</a></li>
    	</ul>
    </div>
<?php }else{?>
        <a href="guanli.php?s=4" style="color:#000" onclick="col('#div4')" ><div id="div4" style="border-bottom:1px solid #7f7f7f;height:35px;text-align:center;padding-top:6px;"><span class="glyphicon glyphicon-triangle-right"></span><font size="3px">链接管理</font>
        </div></a><?php }?>    
    </div>

      <div class="right" style="float:left;padding:10px;"> 
<?php if ($s==1&&$g==1||$s==1&&$g=="") {//添加公告?>  
    <div style="margin-left:15px;margin-top:5px;">
    <div style="font-size:17;font-weight:bold;margin-bottom:5px;">添加公告</div>
    <form action="announcement_add_del.php" method="post">
    <div style="margin-bottom:5px;">公告标题：<input type="text" required name="title"></div>
    <div style="margin-bottom:5px;"><span style="float:left;">公告内容：</span><textarea style="width:550px;height:230px;resize:none;" name="content" id="" wrap="physical" required></textarea></div>
    <div><input class="btn btn-default" style="width:70px;margin-left:67px;margin-top:20px;" type="submit"></div>
    </form>
    </div> 	
<?php }?>
<?php if ($s==1&&$g==2) {//删除公告?>  
    <div style="margin-left:15px;margin-top:5px;">
    <div style="font-size:17;font-weight:bold;margin-bottom:5px;">删除公告</div>
    <div>
    	<table border="1px solid #ccc" style="width:750px;">
    		<tr>
    			<td>序号</td>
    			<td>标题</td>
    			<td>发布时间</td>
    			<td></td>
    		</tr>
<?php $xuhaogonggao=0;
while ($arow = mysql_fetch_assoc($adata)) {
    $xuhaogonggao=$xuhaogonggao+1?>
            <tr style="height:40px;">
    			<td><?php echo $xuhaogonggao;?></td>
    			<td><a href="../announcement.php?id=<?php echo $arow['announcement_id'];?>" style="color:#000"><?php echo $arow['announcement_name'];?></a></td>
    			<td><?php echo $arow['announcement_time'];?></td>
    			<td style="text-align:center;"><button onclick="del(<?php echo $arow['announcement_id'];?>)">删除</button></td>
    		</tr>
<?php }?>
    	</table>
    </div>
    </div> 	
<?php }?>


<?php if ($s==2&&$g==3||$s==2&&$g=="") {//删除帖子?>  
    <div style="margin-left:15px;margin-top:5px;">
    <div style="font-size:17;font-weight:bold;margin-bottom:5px;">删除帖子</div>
    <div class="pull-right"  style="margin-bottom:5px;">
<ul class="pagination" style="display:inline">
<?php include 'include_delpage.php';
 if ($page<$pagecount) {//下一页 ?> 
<li><a href="<?php $_SERVER['PHP_SELF'] ?>?s=2&g=3&p=<?php echo ($page+1)?>">下一页&raquo;</a></li>
   <?php }
   if ($pagecount>5) {?>
<li style ="float : right; margin-left :10px ">
<form name="forma" action="" method="get" onsubmit="return chk()"> 
    <input type="hidden" value="<?php echo $s ?>" name="s">
    <input type="hidden" value="<?php echo $g ?>" name="g"> 
    到第   <input type= "text" id ="toPage" name= "p" style=" width: 40px ;border-radius : 3px;" value="<?php echo $page ?>" >  页 
     
    <button class= "btn btn-default" type="submit" >确定 </button>
 </form>
   </li><?php }?>
   </ul>
</div>
    <div>
    	<table border="1px solid #ccc" style="width:750px;">
    		<tr>
    			<td>序号</td>
    			<td>类别</td>
    			<td>标题</td>
    			<td>作者</td>
    			<td>发布时间</td> 
    			<td>回复</td>
    			<td>查看</td>
    			<td></td>  			
    		</tr>
<?php $xuhaotiezi=0;
while ($row1 = mysql_fetch_assoc($data)) {
    $xuhaotiezi=$xuhaotiezi+1;?>
            <tr>
    			<td><?php echo $offset+$xuhaotiezi;?></td>
    			<td><?php echo $row1['post_theme'];?></td>
    			<td style="width:300px;"><a style="color:#000" href="../forum.php?id=<?php echo $row1['post_id'];?>&p=1"><?php echo $row1['post_title'];?></a></td>
    			<td><?php echo $row1['post_editor'];?></td>
    			<td style="width:90px;"><?php echo $row1['post_posttime'];?></td>
    			<td><?php echo $row1['post_replynum'];?></td>
    			<td><?php echo $row1['post_checknum'];?></td>
    			<td style="text-align:center;"><button onclick="deltie(<?php echo $row1['post_id'];?>)">删除</button></td>
    		</tr>
<?php }?>
    	</table>
    </div>
    </div>
<?php }?>
<?php if ($s==2&&$g==4) {//每页帖子数?>  
    <div style="margin-left:15px;margin-top:5px;">
    <div style="font-size:17;font-weight:bold;margin-bottom:5px;">主页上每页显示的帖子数</div>
    <div style="font-size:16">共 <span style="font-weight:bold;"><?php echo $num1;?></span> 条帖子</div>
    <div style="font-size:16">现在每页显示<span style="font-weight:bold;"><?php echo $row2['postnum_num']?></span>条数据</div>
    <form action="pagenum_update.php" method="post">
    <div style="font-size:16">你想每页显示<input name="ye" style="width:50px;" type="text" required>条帖子</div>
    <div><input class="btn btn-default" style="width:70px;margin-left:5px;margin-top:20px;" type="submit"></div></form>
    </div>	
<?php }?>



<?php if ($s==3) {?>  
    <div style="margin-left:15px;margin-top:5px;">
    <div style="font-size:17;font-weight:bold;margin-bottom:5px;">删除用户</div>
    <div>
    	<table border="1px solid #ccc" style="width:650px;">
    		<tr>
    			<td>序号</td>
    			<td>用户名</td>
    			<td>密码</td>
    			<td>性别</td>
    			<td></td>  			
    		</tr>
<?php $xuhao=-1;
 while ($row3 = mysql_fetch_assoc($datacount3)) {
    $xuhao=$xuhao+1;
    if ($row3['user_username']!="root") {?>
            <tr>
    			<td><?php echo $xuhao?></td>
    			<td><?php echo $row3['user_username'];?></td>
    			<td><?php echo $row3['user_password'];?></td>
    			<td><?php echo $row3['user_sex'];?></td>
    			<td style="text-align:center;"><button onclick="deluser(<?php echo $row3['user_id'];?>,'<?php echo $row3["user_username"];?>')">删除</button></td>
    		</tr>
<?php }}?>
    	</table>
    </div>
    </div>	
<?php }?>


<?php if ($s==4&&$g==5||$s==4&&$g=="") {//添加链接?>  
     <div style="margin-left:15px;margin-top:5px;">
    <div style="font-size:17;font-weight:bold;margin-bottom:5px;">添加链接</div>
    <div>
    	<table>
    		<tr >
    			<td style="border:1px solid #000">站点</td>
    			<td style="border:1px solid #000">网址</td>			
    		</tr>
            <form action="link_add_del.php" method="post">
            <tr>            
    			<td style="border:1px solid #000"><input required name="zhan" type="text"></td>
    			<td style="border:1px solid #000"><input required name="wang" type="text" value="http://"></td>
    		</tr>
    		<tr>            
    			<td><input class="btn btn-default" type="submit"></td>
    		</tr>
    		</form>
    	</table>
    </div>
    </div>
<?php }?>
<?php if ($s==4&&$g==6) {//删除链接?>  
    <div style="margin-left:15px;margin-top:5px;">
    <div style="font-size:17;font-weight:bold;margin-bottom:5px;">删除链接</div>
    <div>
    	<table border="1px solid #ccc" style="width:750px;">
    		<tr>
    			<td>序号</td>
    			<td>站点</td>
    			<td>网址</td>
    			<td style="width:60px;">发布时间</td>
    			<td style="width:50px;"></td>  			
    		</tr>
<?php $xuhaolink=0;
while ($row5 = mysql_fetch_assoc($datacount4)) {
    $xuhaolink=$xuhaolink+1;?>
            <tr>
    			<td><?php echo $xuhaolink;?></td>
    			<td><?php echo $row5['link_name'];?></td>
    			<td><?php echo $row5['link_www'];?></td>
    			<td><?php echo $row5['link_time'];?></td>
    			<td style="text-align:center;"><button onclick="dellink(<?php echo $row5['link_id'];?>)">删除</button></td>
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
function del(id){
       var rs=confirm("确定删除此条公告？")
  if (rs==true)
    {
  window.location.href="announcement_add_del.php?id="+id;
    }
  else
    {
    }
	
}
function deltie(id){
          var rs=confirm("确定删除此条帖子？")
  if (rs==true)
    {
  window.location.href="post_del.php?id="+id;
    }
  else
    {
    }
	
}
function deluser(id,ip){
          var rs=confirm("确定删除"+ip+"用户？")
  if (rs==true)
    {
  window.location.href="user_del.php?id="+id;
    }
  else
    {
    }
	
}
function dellink(id){
          var rs=confirm("确定删除此条链接？")
  if (rs==true)
    {window.location.href="link_add_del.php?id="+id;
    }
  else
    {
    }
	
}
function chk(){
    var a=$('#toPage').val();//判断跳转值是否满足条件，不满足跳转到首页   
       if (1<=a&&a<=<?php echo $pagecount;?>) {return true;}else{document.forma.toPage.value=1;document.forma.submit();}
  }
</script>
</body>
</html>