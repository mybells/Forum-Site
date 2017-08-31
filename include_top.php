<div class="top" style="padding:8px;height:35px;width:100%;position:absolute;top:0px;left:0px;background-color:#f8f8f8;border-bottom:0.5px solid #cad9ea;">
<span class="top_left">欢迎来到<a href="index.php" style="color:#000;">VB论坛!</a></span>
<?php if ($_SESSION['username']) {?>
       <span class="top_right" style="float:right">欢迎您  
       <a href="userCenter.php"><?php echo $_SESSION['username']; ?></a>&nbsp;丨&nbsp;<a href="session_stop.php">退出</a></span>
<?php }else{ ?>
<span class="top_right" style="float:right"><a href="login.php">登录</a>&nbsp;丨&nbsp;<a href="register.php">注册</a></span>
<?php }?>
</div>
<div><a href="index.php"><img src="images/vb.png" style="position:absolute;left:35px;top:20px;width:130px;height:115px;opacity:0.8" alt="首页"></a></div>
  <div id="zt" class="navbar navbar-default ztr" role="navigation"style="background-color:#2770C0;">
        <!--导航-->
       <ul class="nav navbar-nav" >
        <li id="zt_1"><a href="index.php" title="Home page" style="color:#fff"><strong>首页</strong></a></li>
        <li id="zt_2"><a href="index.php?p=1&sq=<?php echo $sq ?>&th=where post_theme='源码分享'" title="Source code" style="color:#fff"><strong>源码分享</strong></a></li>
        <li id="zt_3"><a href="index.php?p=1&sq=<?php echo $sq ?>&th=where post_theme='图文教程'" title="Picture and Text" style="color:#fff"><strong>图文教程</strong></a></li>
        <li id="zt_4"><a href="index.php?p=1&sq=<?php echo $sq ?>&th=where post_theme='视频教程'" title="Video" style="color:#fff"><strong>视频教程</strong></a></li>
        <li id="zt_5"><a href="index.php?p=1&sq=<?php echo $sq ?>&th=where post_theme='相关工具'" title="Tool" style="color:#fff"><strong>相关工具</strong></a></li>
        <li id="zt_6"><a href="index.php?p=1&sq=<?php echo $sq ?>&th=where post_theme='VB练习题'" title="VB Examination" style="color:#fff"><strong>VB练习题</strong></a></li>
        <li id="zt_7"><a href="index.php?p=1&sq=<?php echo $sq ?>&th=where post_theme='问题求助'" title="Help" style="color:#fff"><strong>问题求助</strong></a></li>
        <li id="zt_8"><a href="index.php?p=1&sq=<?php echo $sq ?>&th=where post_theme='交流区'" title="Exchange" style="color:#fff"><strong>交流区</strong></a></li>
       </ul>
    <form action="search.php" target="_blank" method="post" name="sa" class="navbar-form navbar-left" rol="search" onsubmit="return ck()">
        <div class="form-group">
           <input type="text" name="ser" class="form-control" placeholder="请输入帖子关键词" />
        </div>
        <button type="submit" class="btn btn-default" style="color:#2770C0"><strong>搜索</strong></button>
    </form>
    <script>
    function ck () {
    var qwe=$('.form-control').val();
     if (qwe=="") {
     alert('你要搜索的关键字不能为空!');return false;}else{return true;}
  }</script>
  </div>