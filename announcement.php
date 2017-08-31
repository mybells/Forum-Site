<?php 
require_once('connect.php');
session_start();
$id=$_GET['id'];
$time=$_GET['time'];
$sqlannouncement1="select * from vb_announcement where announcement_id=$id";
$dataannouncement1=mysql_query($sqlannouncement1);
@$announcement1 = mysql_fetch_assoc($dataannouncement1);


$sqlannouncement2="select announcement_time from vb_announcement order by announcement_time desc";
$dataannouncement2=mysql_query($sqlannouncement2);
while ($announcement2 = mysql_fetch_assoc($dataannouncement2)) {
	 $arr[]=substr($announcement2['announcement_time'],0,10);	
}
 $ae=array_unique($arr);
 	//var_dump($ae);


$sqlannouncement3="select * from vb_announcement where mid(announcement_time,1,10)='$time' order by announcement_id desc";
$dataannouncement3=mysql_query($sqlannouncement3);


$sqlannouncement4="select announcement_id from vb_announcement order by announcement_id desc limit 1";
$dataannouncement4=mysql_query($sqlannouncement4);
$announcement4 = mysql_fetch_assoc($dataannouncement4);

$sqlcount4="select * from vb_link";
$datacount4=mysql_query($sqlcount4);
?>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>站内公告 - VB论坛</title>
    <!-- Bootstrap -->
    <link href="public/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/announcement.css" />
    <script src="public/jquery.min.js"></script>
    <script src="public/bootstrap/js/bootstrap.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>$(function(){
if($(".left").height() > $(".right").height()){
$(".right").css("height",$(".left").height()) 
}else{
$(".left").css("height",$(".right").height()+10)
}
})
function ch(){
$(".left").css("height",$(".right").height()+$(".de").height()+100)}
</script>
  </head>
<body style="  background: url(images/12.png) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
<?php include 'include_top.php';?>
<div class="z" style="height:35px;margin-top:-10px" >
        <a href="./" class="glyphicon glyphicon-home" title="首页"></a><em>&nbsp;»</em>
        <a href="announcement.php?id=<?php echo $announcement4['announcement_id'] ?>">公告</a>
        <button class= "btn btn-default" style="float:right; width:75px;" type="button" onclick="gobefore()" >返回列表</button>
</div>
<div class="bor" style="overflow:auto;width:100%;border:1px solid #e7e7e7; min-height:300px;max-height:1000px;height:500;">
    <div class="left" style="padding:10px;width:130px;background:#bddaef;height:100%;float:left">
    	<div style="border-bottom:1px solid #000;font-weight:bold;padding-bottom:3px;"><font size="4px">公告</font></div>

    	<?php foreach ($ae as $key => $value) {?>
    		<div style="border-bottom:1px solid #000;height:30px;text-align:center;padding-top:4px;"><font size="3px"><a href="announcement.php?time=<?php echo $value?>"><?php echo $value?></a></font></div>
         <?php }?>
    </div>


    <div class="right" style="float:left;padding:10px;">
        <?php if ($id) {?>
        	<details open>
          <summary><font size="3" style="font-weight:bold"><?php echo $announcement1['announcement_name']?></font><font size="1">(<?php echo $announcement1['announcement_time']?>)</font>
          </summary>
          作者：<?php echo $announcement1['announcement_editor']."<br>"
            .$announcement1['announcement_content']?>
        </details>
        <?php }?>



    <?php if($time){
    	while($announcement3 = mysql_fetch_assoc($dataannouncement3)){
        ?>
           <details onclick="ch()" class="de">
          <summary><font size="3" style="font-weight:bold"><?php echo $announcement3['announcement_name']?></font><font size="1">(<?php echo $announcement3['announcement_time']?>)</font>
          </summary>
          作者：<?php echo $announcement3['announcement_editor']."<br>"
            .htmlspecialchars_decode($announcement3['announcement_content'])?>
        </details>
       <?php }
       }?> 


    	
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
<script>function gobefore(){
            window.location.href='index.php?p=1';   
          }

</script>

</body>
</html>
