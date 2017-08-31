<?php 
require_once('connect.php'); 
session_start();
$id=$_GET['id'];
$sqlcount1="select * from vb_post";
$datacount1=mysql_query($sqlcount1);
$num1=mysql_num_rows($datacount1); //获取记录数
$selectsql="select * from vb_post where post_id=$id";
$selectdata=mysql_query($selectsql);
$selectrow=mysql_fetch_array($selectdata);
 if (!$selectrow['post_title']) {
      echo "<script>window.history.go(-1)</script>";
   }

$page=$_GET['p'];
$showpage=5;//显示五个页码    
$pagesize=20;//每页显示几条回复数据
$offset=($page-1)*$pagesize;//每页的起始
$replypostsql="select * from vb_replypost where replypost_parentid=$id order by replypost_id ASC limit $offset,$pagesize ";
$replypostdata=mysql_query($replypostsql);
$sqlcount="select * from vb_replypost where replypost_parentid=$id order by replypost_id ASC";
$datacount=mysql_query($sqlcount);
$num=mysql_num_rows($datacount); //获取记录数

$sqlcount4="select * from vb_link";
$datacount4=mysql_query($sqlcount4);

$pagecount=ceil($num/$pagesize);//总页数
// if ($pagecount==0) {
//     echo "<script>window.location.href='forum.php?id=$id';</script>";
//     }
// if ($page==1) {
//   $lou=1;
// }else{$lou=$page*2-1;}
$lou=($page-1)*20+1;

$op=$_GET['local'];
if ($op) {
  $loucen=$lou+$op;
}
?>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title><?php echo $selectrow['post_title'];?></title>
    <!-- Bootstrap -->
    <link href="public/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/forum.css" />
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
      var aa="<?=$loucen?>";
      if (aa) {
      var at= document.getElementById(aa).offsetTop;
      window.scrollTo(0,at);
   }});
    
// function get(){
//   var aa="<?=$loucen?>";
//    if (aa) {
//     var at= document.getElementById(aa).offsetTop;
//     window.scrollTo(0,at);
//    }
// }</script>
  </head>
<body>
<?php include 'include_top.php';
$tt="where post_theme='".$selectrow['post_theme']."'";?>

        <!--路径-->
<div class="z" style="height:20px;margin-top:-10px;margin-bottom:10px;" >
            <a href="./" class="glyphicon glyphicon-home" title="首页"></a><em>&nbsp;»</em>
            <a href="index.php?p=1&sq=&th=<?php echo $tt ?>"><?php echo $selectrow['post_theme'];?></a><em>›</em>
            <a href=""><?php echo $selectrow['post_title'];?></a>
</div>


<div id="ptz" style="height:43px;">
        <!--页跳转-->
        <div class="pull-left"style="float:left;">
        <a href="javascript:void(0);" onclick="postck()" id="newspecial" style="" title="发新帖"><img src="images/push.png" alt="发新帖"></a>
        <a href="javascript:void(0);" onclick="replyck()" id="newreply" style="" title="回复"><img src="images/pn_reply.png" alt="回复"></a>
        </div>
      <div class="pull-right" style="float:right;">
<?php if ($pagecount>1) { 
  echo '<button class= "btn btn-default" style="text-align:center;float:right; width:45px;padding-left:7px;" type="button" onclick="gobefore()" >返回</button>';
  include 'include_forumpage.php';
      }else{
        echo '<button class= "btn btn-default" style="text-align:center;float:right; width:45px;padding-left:7px;" type="button" onclick="gobefore()" >返回</button>';}?>
      </div>
</div>


<div class="alltable" style="width:100%;border:1px solid #cdcdcd;">
   <table cellpadding="0"  cellspacing="0"style="display:inline">
   <tbody>
    <tr style="">
      <td style="text-align:center;width:159px;font-size:12px;padding-top:10px;padding-bottom:10px;background:#e5edf2;">查看：<?php echo $selectrow['post_checknum'];?>&nbsp;|&nbsp;回复：<?php echo $selectrow['post_replynum'];?></td>
      <td style="width:800px;padding-top:10px;padding-bottom:10px;padding-left:20px;"><strong style="font-size:16px;">[<a href="" style="font-size:16px;color:#000;"><?php echo $selectrow['post_theme'];?></a>]&nbsp;<a href="forum.php?id=<?php echo $id;?>" style="font-size:16px;color:#000;"><?php echo $selectrow['post_title'];?></a></strong></td>
    </tr>
   </tbody>
   </table>
   <?php if ($page==1||$pagecount==1||$pagecount==0) {//在第一回复页显示帖子内容或者没有回复时显示帖子内容  ?>
    <div style="background:#e5edf2;overflow:hidden">
      <div class="left_table" style="width:157px;float:left;background:#e5edf2;border-top:1.8px dotted #000;">
       <div style="margin:10px auto 10px 20px;"><span><?php echo $selectrow['post_editor'];?></span></div>
       <div style="text-align:center;margin-bottom:50px"><img style="height:125px;width:125px;" src="images/user.gif"></div>
      </div>
      <div class="right_table" style="border-top:1.8px dotted #000;width:800px;float:right;background:#fff;padding-left:20px;">
         <div style="font-size:12px;padding-bottom:5px;padding-top:5px;<!-- border:1px solid #000; -->">发表于 <?php echo $selectrow['post_posttime'];?><span style="float:right;margin-right:10px;">1楼</span>
         </div>
         <div class="content" style="padding-bottom:5px;padding-top:5px;<!-- border:1px solid #000; -->">
         <?php echo htmlspecialchars_decode($selectrow['post_content']);?>
            <!-- <textarea name="content2" style="width:700px;height:200px;"><?php echo htmlspecialchars($selectrow['post_content']); ?></textarea> -->
         </div>
         <div class="bottom" style="padding-bottom:22px;padding-top:5px;margin-top:100px;">
            <span><a href="javascript:void(0);" onclick="replyck()" style="color:#000;"><img src="images/fastreply.gif" alt="回复">回复</a></span>
         </div>
      </div>
    </div>
<?php }$nun=0;?>

<?php while(@$replypostrow=mysql_fetch_array($replypostdata)){ 
$lou=$lou+1;?>
    <div style="background:#e5edf2;overflow:hidden">
      <div class="left_table" style="width:157px;float:left;background:#e5edf2;border-top:1.8px dotted #000;">
       <div style="margin:10px auto 10px 20px;"><span><?php echo $replypostrow['replypost_username'];?></span></div>
       <div style="text-align:center;margin-bottom:50px"><img style="height:125px;width:125px;" src="images/user.gif"></div>
      </div>
      <div class="right_table" style="border-top:1.8px dotted #000;width:800px;float:right;background:#fff;padding-left:20px;">
         <div id="tie" style="font-size:12px;padding-bottom:5px;padding-top:5px;">发表于 <?php echo $replypostrow['replypost_replytime'];?><span id="<?php echo $lou;?>" style="float:right;margin-right:10px;">
         <?php echo $lou;?>楼
            </span>
         </div>
         <div class="content" style="padding-bottom:5px;padding-top:5px;<!-- border:1px solid #000; -->">

         <?php   if ($replypostrow['replypost_replytocon']) {
                 $content3=strip_tags($replypostrow['replypost_replytousertm']);
                $con1=substr($content3,-20,20);//取出来的数据
                //echo $nu."ss";
while ($row=mysql_fetch_array($datacount)) {//全部的与parent_id相等的数据
   $arr[]=$row['replypost_replytime'];}
   //var_dump($arr);

   foreach ($arr as $key => $value) {
    //echo $key."=>".$value."<br>";
    $q=0;
     if (trim($con1)==trim($value)) {
       $nu=ceil(($key+1)/$pagesize);
       $lo=(1+$key)%$pagesize;
     }
   } 

   if ($nu=="") {
    $nu="kong";
    $lo="kong";
}                                        //  10%2=0  最后一条数据
//          if(in_array(trim($con1),$arr)){  
// }else{  
//     echo "<script>alert('抱歉，没有找到相关帖子！');window.history.back();</script>";  
// }    

           //10 page=ceil(10/$pagesize)=5 第5页      
         echo '<blockquote><font size="2"><a href="javascript:void(0);" onclick="tiezicheck('.$replypostrow['replypost_parentid'].','."'".$nu."'".','."'".$lo."'".')"><font color="#999999">'.$replypostrow['replypost_replytousertm'].'</a></font><br>'.$replypostrow['replypost_replytocon'].'</font></blockquote>';
        }
         echo $content1=htmlspecialchars_decode($replypostrow['replypost_content']);
               $content2=strip_tags($content1);
               if (strlen($content2)>10) {
                  $con=mb_substr($content2,0,10,"utf-8")."...";
               }else{$con=$content2;}
              $us=$replypostrow['replypost_username'];
             $tim=$replypostrow['replypost_replytime'];
                ?>
         </div>
         <div class="bottom" style="padding-bottom:22px;padding-top:5px;margin-top:100px;">
            <span><a href="reply.php?id=<?=$id?>&con=<?=$con?>&user=<?=$us?>&tm=发表于 <?=$tim?>" onclick="return userreplyck()" style="color:#000;"><img src="images/fastreply.gif" alt="回复">回复</a></span>
            <script>
                </script>
         </div>
      </div>
    </div>
<?php 
      }?>
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
<script>

  function gobefore(){
            window.location.href='index.php?p=1';   
          }
  function postck () {
    var ses="<?=$_SESSION['username'];?>";
    if (ses=="") {alert("发帖前请先登录账号");}else{
      window.location.href="post.php";
    }}
    function replyck () {
    var ses1="<?=$_SESSION['username'];?>";
    if (ses1=="") {alert("回复前请先登录账号");}else{
      window.location.href='reply.php?id=<?=$id?>';
    }}
    function userreplyck () {
    var ses1="<?=$_SESSION['username'];?>";
    if (ses1=="") {alert("回复前请先登录账号");return false;}else{return true;}}
  // forum.php?id='.$replypostrow['replypost_parentid'].'&p='.$nu.'&local='.$lo.'
   function tiezicheck (q,w,e) {
 if (q&&w&&e) {window.location.href='forum.php?id='+q+'&p='+w+'&local='+e;}
    if (e=="kong") {alert('抱歉，没有找到相关评论！');window.history.go(0);}
}
</script>
</body>
</html>
