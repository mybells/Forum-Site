<?php 
require_once('connect.php');
session_start();
$sqlcount4="select * from vb_link";
$datacount4=mysql_query($sqlcount4);
?>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>发帖 - VB论坛</title>
    <!--<script>window.UEDITOR_HOME_URL = "/chat/ueditor/";</script>-->
    <!-- Bootstrap -->
    <link href="public/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/post.css" />
    <script src="public/jquery.min.js"></script>
   <!-- <link type="text/css" rel="stylesheet" href="ueditor/third-party/video-js/video-js.css"/>
    <script src="http://api.html5media.info/1.1.4/html5media.min.js"></script>

<script language="javascript" type="text/javascript" src="ueditor/third-party/video-js/video.js"></script>-->
   
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
  background-size: cover;s">
<?php include 'include_top.php';?>
        <!--路径-->
        <div class="z" style="height:20px;margin-top:-10px;margin-bottom:10px;" >
            <a href="./" class="glyphicon glyphicon-home" title="首页"></a><em>&nbsp;»</em>
            <a href="">发帖</a>
        </div>
 <div>
    <ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="#"><strong>发帖</strong></a></li>
</ul>
</div>


<form name="example" method="post" action="post_submit.php" onsubmit="return check1();">
<div class="pbt">
<div class="ftid">
       <select class="down" name="zhuti" id="zhuti">
        <option>选择主题分类</option>
        <option>源码分享</option>
        <option>图文教程</option>
        <option>视频教程</option>
        <option>相关工具</option>
        <option>VB练习题</option>
        <option>问题求助</option>
        <option>交流区</option>
        </select>
</div>
<div class="z">
<span><input type="text" placeholder="请填写标题名称" name="title" id="title" class="px"  style="width: 25em"></span>
</div>
</div>
    <textarea id="container" name="content" type="text/plain"></textarea>
    
    <input class="btn btn-default" type="submit" name="button" value="发表" style="width:70px;background-color:#255dad;color:#fff;border-color:#255dad;margin-top:15px;margin-bottom:5px;" /> (提交快捷键: Ctrl + Enter)</hr>
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
<script>
function check1(){
var q=$('#zhuti option:selected').val();
var w=$('#title').val();
var e=UE.getEditor('container').getContent();
if (q!="选择主题分类"&&w!=""&&e!=""&&r!="") {return true;}
else if (q=="选择主题分类") {alert('请选择主题分类！');return false;}
else if (w=="") {alert('标题名称不能为空！');return false;}
else if (e=="") {alert('编辑内容不能为空！');return false;}
}
    </script>
</body>
</html>
