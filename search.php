<?php 
require_once('connect.php');
session_start();
$ser=$_POST['ser'];
$query = mysql_query("select * from vb_post where post_title like '%$ser%'");
$num=mysql_num_rows($query);//获取记录
if ($num) {
	# code...
}else{$num=0;}

//var_dump($data);
//
$sqlcount4="select * from vb_link";
$datacount4=mysql_query($sqlcount4);
?>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>搜索 - VB论坛</title>
    <!-- Bootstrap -->

    <link href="public/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/search.css" />
    <script src="public/jquery.min.js"></script>
    <script src="public/bootstrap/js/bootstrap.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
      </head>
<body>
<?php include 'include_top.php';?>
<div style="min-height:250px;">
	<div style="height:30px;line-height:30px;background:#f5f5f5;border-bottom:1px solid #ccc;padding-left:7px;">
		<span style="font-weight:bold;">结果: 找到 “<?php echo $ser?>” 相关内容 <?php echo $num?> 个</span>
	</div>

<?php
if ($num!=0) {
while($data = mysql_fetch_assoc($query)){
$content1=htmlspecialchars_decode($data['post_content']);
               $content2=strip_tags($content1);
               if (strlen($content2)>200) {
                  $con=mb_substr($content2,0,200)."...";
               }else{$con=$content2;}?>
	<div style="margin-top:10px;">
    <div style="font-size:18px;">
       <a href="forum.php?id=<?php echo $data['post_id']?>&p=1" style="color:#0000cc" target="_blank">
        <?php echo $new=str_replace($ser, '<font color=red>'.$ser.'</font>',$data['post_title']);//把搜索内容标红?>
       </a>
    </div>
    <div style="font-size:13px;color:#999999">
       <?php echo $data['post_replynum']?>次回复-<?php echo $data['post_checknum']?>次查看
    </div>
    <div style="font-size:14px;">
       <?php echo $con;?>
    </div>
    <div><span style="font-size:13px;color:#999999">
       <?php echo $data['post_posttime']?></span>-<span style="font-size:13px;color:#999999"><?php echo $data['post_editor']?></span>-<a href="index.php?p=1&sq=&th=where post_theme='<?php echo $data['post_theme']?>'" style="font-size:13px;color:#999999"><?php echo $data['post_theme']?></a>
    </div>
	</div>
<?php }}else{echo '<div style="padding:20px;"><span style="font-size:13px;color:#999999">对不起，没有找到匹配结果。</span></div>';}?>
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

</body>