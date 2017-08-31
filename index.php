<?php 
require_once('connect.php');
session_start();
$page=$_GET['p'];
//排序
$sq=$_GET['sq'];
if ($sq) {
}else{
  $sq="order by post_id desc";
}

$th=$_GET['th'];
if ($th) {
}else{
  $th="";
}
// echo $s;

$sqlcount5="select * from vb_postnum";
$datacount5=mysql_query($sqlcount5);
$ann = mysql_fetch_assoc($datacount5);
if($ann['postnum_num']){
    $pagesize=$ann['postnum_num'];
}else{
  $pagesize=20;//每页显示几条数据
}
$showpage=5;//显示五个页码    

$offset=($page-1)*$pagesize;//每页的起始
$sql = "select * from vb_post $th $sq limit $offset,$pagesize";
$data = mysql_query($sql); //执行sql
$sqlcount="select * from vb_post $th";
$datacount=mysql_query($sqlcount);
$num=mysql_num_rows($datacount); //获取记录数
$pagecount=ceil($num/$pagesize);//总页数

$sqlcount4="select * from vb_link";
$datacount4=mysql_query($sqlcount4);

$sqlannouncement="select * from vb_announcement order by announcement_id desc limit 1";
$dataannouncement=mysql_query($sqlannouncement);
$announcement = mysql_fetch_assoc($dataannouncement);

?>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>VB论坛</title>
    <!-- Bootstrap -->
    <link href="public/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <script src="public/jquery.min.js"></script>
    <script src="public/bootstrap/js/bootstrap.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
.disabled a:hover{font-weight: normal !important;}
.shi a:hover{border:1px solid #b2b2b2 !important;}
.hui a:hover{border:1px solid #b2b2b2 !important;}
.cha a:hover{border:1px solid #b2b2b2 !important;}
    </style>
  </head>
<body>
<?php include 'include_top.php';?>
<?php if ($th=="where post_theme='源码分享'") {
        $er="源码分享";
 }else if ($th=="where post_theme='图文教程'") {
        $er="图文教程";
 }else if ($th=="where post_theme='视频教程'") {
        $er="视频教程";
 }else if ($th=="where post_theme='相关工具'") {
        $er="相关工具";
 }else if ($th=="where post_theme='VB练习题'") {
        $er="VB练习题";
 }else if ($th=="where post_theme='问题求助'") {
        $er="问题求助";
 }else if ($th=="where post_theme='交流区'") {
        $er="交流区";
 }else{$er="首页";
  }?>
        <div class="z" style="height:20px;margin-top:-10px;margin-bottom:10px;" >
            <a href="index.php" class="glyphicon glyphicon-home" title="首页"></a><em>&nbsp;»</em>
            <a href="index.php?p=1&sq=<?php echo $sq ?>&th=<?php echo $th ?>"><?php echo $er ?></a>
        </div>

<div id="ptz" style="height:43px;">
        <div class="pull-left">
        <a href="javascript:void(0);" onclick="postck()" id="newspecial" style="" title="发新帖"><img src="images/push.png" alt="发新帖"></a>
        </div>
<div class="pull-right">
<ul class="pagination" style="display:inline;">
<?php include 'include_page.php';
 if ($page<$pagecount) {//下一页 ?> 
<li><a href="<?php $_SERVER['PHP_SELF'] ?>?p=<?php echo ($page+1)?>&sq=<?php echo $sq ?>&th=<?php echo $th ?>">下一页&raquo;</a></li>
   <?php }
   if ($pagecount>5) {?>
<li style ="float : right; margin-left :10px ">
<form name="forma" action="" method="get" onsubmit="return chk()"> 
    到第   <input type= "text" id ="toPage" name= "p" style=" width: 40px ;border-radius : 3px;" value="<?php echo $page ?>" >  页   
    <input type="hidden" value="<?php echo $sq ?>" name="sq">
       <input type="hidden" value="<?php echo $th ?>" name="th">
    <button class= "btn btn-default" type="submit" >确定 </button>
 </form>
   </li>
   <?php }?>
   </ul>
</div>
</div>


<div id="threadlist" class="listall">
    <table style="" class="table table-condensed table-hover table-bordered" >
        <tbody class="first">
            <tr>
       <td class="the" style="height:25px;">&nbsp;&nbsp;&nbsp; 
            <ul  class="pagination" style="">  
                <li class="disabled"><a style="color:#000;background:#f5f5f5;border-radius:0px;">排序:</a></li>  
                <li class="shi"><a href="index.php?p=1&sq=order by post_posttime DESC&th=<?php echo $th ?>" style="color:#000;background:#f5f5f5;">发帖时间</a></li>  
                <li class="hui"><a href="index.php?p=1&sq=order by post_replynum DESC&th=<?php echo $th ?>" style="color:#000;background:#f5f5f5;">回复数</a></li>  
                <li class="cha"><a href="index.php?p=1&sq=order by post_checknum DESC&th=<?php echo $th ?>" style="color:#000;background:#f5f5f5;border-radius:0px;">查看数</a></li>  
            </ul>          
        </td>
        <td class="editor">作者</td>
        <td class="back">回复</td>
        <td class="look">查看</td>
        <!-- <td class="push">最后发表</td>-->
            </tr>
        </tbody>
        <tbody>
            <tr>               
                <td class="the">&nbsp;&nbsp;<img src="images/common.gif" alt="公告"><strong class="common">&nbsp;&nbsp;&nbsp;公告: <a href="announcement.php?id=<?php echo $announcement['announcement_id']?>" target="_blank"><font color="#0000ff"><?php echo $announcement['announcement_name']?></font></a></strong></td>
                <td class="editor" style="width:170px;">
                    <cite><a href="" style="color: #000000;"><?php echo $announcement['announcement_editor']?></a></cite>
                    <span><?php echo $announcement['announcement_time']?></span>
                </td>
                <td class="reply" style="width:100px;">&nbsp;</td>
                <td class="look" style="width:100px;">&nbsp;</td>
                <!--<td class="lasttime">&nbsp;</td>-->
            </tr>
        </tbody>
<?php while($row = mysql_fetch_assoc($data)){ ?>
        <tbody id="list_1">
            <tr> 
                <td class="the">
                    &nbsp;<a href="checkupdate.php?id=<?php echo $row['post_id']?>" style="text-decoration:none;" title="新窗口打开" target="_blank">
                    <img src="images/folder_common.gif">&nbsp;&nbsp;</a>[<a href="index.php?p=1&sq=order by post_id desc&th=where post_theme='<?php echo $row["post_theme"] ?>'"><font color="#005DC3"><?php echo $row['post_theme']?></font></a>]
                    <a href="checkupdate.php?id=<?php echo $row['post_id']?>" class="text"><?php echo $row['post_title']?></a>
                </td>
                <td class="editor">
                    <cite>
                         <?php echo $row['post_editor']?>
                    </cite>
                    <span><?php echo $row['post_posttime']?></span>
                </td>
                <td class="reply"><em><?php echo $row['post_replynum']?></em></td>
                <td class="look"><em><?php echo $row['post_checknum']?></em></td>
            </tr>
        </tbody>
        <?php }?>
    </table>
</div>


<?php if ($page<$pagecount) {//下一页 ?>      
 <div class="next_page">
<a href="<?php $_SERVER['PHP_SELF'] ?>?p=<?php echo $page+1;?>&sq=<?php echo $sq ?>&th=<?php echo $th ?>" class="btn btn-default nex" role="button">下一页 &raquo;</a>
</div>
<?php }else{?>
<div class="next_page">
<a href="<?php $_SERVER['PHP_SELF'] ?>?p=<?php echo $page-1;?>&sq=<?php echo $sq ?>&th=<?php echo $th ?>" class="btn btn-default nex" role="button">&laquo; 上一页</a>
</div>
<?php }?>

<div id="ptz" style="height:43px;">
        <div class="pull-left">
        <a href="javascript:void(0);" onclick="postck()" id="newspecial" style="" title="发新帖"><img src="images/push.png" alt="发新帖"></a>
        </div>
<div class="pull-right">
<ul class="pagination" style="display:inline">
<?php include 'include_page.php';?>
<?php if ($page<$pagecount) {//下一页 ?> 
<li><a href="<?php $_SERVER['PHP_SELF'] ?>?p=<?php echo ($page+1)?>&sq=<?php echo $sq ?>&th=<?php echo $th ?>">下一页&raquo;</a></li>
   <?php }
   if ($pagecount>5) {?>
<li style ="float : right; margin-left :10px ">
<form name="formb" action="" method="get" onsubmit="return chk2()"> 
到第   <input type= "text" id ="toPage2" name="p" style=" width: 40px ;border-radius : 3px;" value="<?php echo $page ?>" >  页
       <input type="hidden" value="<?php echo $sq ?>" name="sq">
       <input type="hidden" value="<?php echo $th ?>" name="th">
       <button class= "btn btn-default" type="submit" >确定 </button>
</form>
   </li>
   <?php }?>
   </ul>
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
<h5>© 2017 VB论坛</h5><h5 id="er">联系邮箱:435541908@qq.com</h5></div></div>
<script type="text/javascript">
  function chk2(){
    var b=$('#toPage2').val();//判断跳转值是否满足条件，不满足跳转到首页   
       if (1<=b&&b<=<?php echo $pagecount;?>) {return true;}else{document.formb.toPage2.value=1;document.formb.submit();}
  }
  function chk(){
    var a=$('#toPage').val();//判断跳转值是否满足条件，不满足跳转到首页   
       if (1<=a&&a<=<?php echo $pagecount;?>) {return true;}else{document.forma.toPage.value=1;document.forma.submit();}
  }
  function postck () {
    var ses="<?=$_SESSION['username'];?>";
    if (ses=="") {alert("发帖前请先登录账号");}else{
      window.location.href="post.php";
    }
  }
 $(function(){
var nav=$(".ztr"); //得到导航对象
var win=$(window); //得到窗口对象
var sc=$(document);//得到document文档对象。
win.scroll(function(){
  if(sc.scrollTop()>=35){
    nav.addClass("fixednav"); 
  }else{
   nav.removeClass("fixednav");
  }
})  
})
</script>
</body>
</html>
