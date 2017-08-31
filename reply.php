<?php 
require_once('connect.php');
//不清空表单，如同没使用session一般
session_start();

$replyid=$_GET['id'];
$con=$_GET['con'];
$user=$_GET['user'];
$tm=$_GET['tm'];
$sqlcount2="select * from vb_post";
$datacount2=mysql_query($sqlcount2);
$num2=mysql_num_rows($datacount2); //获取记录数

$replysql="select * from vb_post where post_id=$replyid";
$replydata=mysql_query($replysql);
$replyrow=mysql_fetch_array($replydata);
 if (!$replyrow['post_title']) {
      echo "<script>window.history.go(-1)</script>";
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
    <title>回复 - VB论坛</title>

    <!-- Bootstrap -->
    <link href="public/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/reply.css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body style="  background: url(images/12.png) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
<?php include 'include_top.php';?>
        <!--路径-->
        <div class="z" style="height:20px;margin-top:-10px;margin-bottom:10px;" >
            <a href="./" class="glyphicon glyphicon-home" title="首页"></a><em>&nbsp;»</em>
            <a href="./"><?php echo $replyrow['post_theme'];?></a><em>›</em>
            <a href="./"><?php echo $replyrow['post_title'];?></a><em>›</em>
            <a href="reply.php?id=<?php echo $replyid;?>">回复</a>
        </div>

<div style="margin-bottom:10px">RE: <?php echo $replyrow['post_title'];?></div>
<?php if ($con) {?>
<div style="margin-bottom:10px"><blockquote><font size="2"><a href="" target="_blank">
<font color="#999999"><?php echo $user."&nbsp".$tm ?></a></font><br><?php echo $con;?></font></blockquote></div><?php }?>

<form name="example" method="post" action="reply_submit.php?id=<?php echo $replyid;?>&con=<?php echo $con;?>&user=<?php echo $user;?>&tm=<?php echo $tm;?>" onsubmit="return check1();">
    <textarea id="container" name="replycontent" type="text/plain"></textarea>   
    <input class="btn btn-default" type="submit" name="button" value="回复" style="width:70px;background-color:#255dad;color:#fff;border-color:#255dad;margin-top:15px;margin-bottom:5px;" /> (提交快捷键: Ctrl + Enter)</hr>
    <input type="hidden" name="replytitle" value="<?php echo $replyrow['post_title'];?>"> 
    <input type="hidden" name="replyparentid" value="<?php echo $replyrow['post_id'];?>"> 
</form>

<script type="text/javascript" src="ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
<script type="text/javascript" src="ueditor/ueditor.all.js"></script>
<script type="text/javascript" charset="utf-8" src="ueditor/9fm/9fm.v1.js"></script>
   <!--  实例化编辑器 -->
<script type="text/javascript" src="ueditor/ueditor.parse.js"></script>
<script type="text/javascript">
        var ue = UE.getEditor('container', {
    toolbars: [[
            'fullscreen', 'source', '|', 'undo', 'redo', '|','fontfamily', 'fontsize', '|',
            'bold', 'italic', 'underline', 'fontborder',  'superscript', 'subscript', 'removeformat', 'autotypeset', '|', 
            'forecolor', 'backcolor', 'insertorderedlist','insertframe'    
            ],
            ['link',  '|','horizontal', 'spechars', '|','insertcode','template','inserttable','map',
            '|','justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|',
            'print', 'preview', 'searchreplace','|','simpleupload',  'emotion', 'scrawl', 'attachment','insertvideo',
            
        ]],
   initialFrameWidth:960  //初始化编辑器宽度,默认1000
   ,initialFrameHeight:400  //初始化编辑器高度,默认320
   //打开右键菜单功能
   ,enableContextMenu: false
});
        function check1(){
          var e=UE.getEditor('container').getContent();
          if (e!="") {return true}else{alert("编辑内容不能为空！");return false}
        }
</script>

<div style="border-top:1px solid #ccc;margin-top:10px;margin-bottom:50px;text-align:center;">
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
<script src="public/jquery.min.js"></script>
<script src="public/bootstrap/js/bootstrap.js"></script>
</body>
</html>
