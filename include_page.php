<?php 
  //上一页
  if ($page!=1) {
?>
      <li><a href="<?php $_SERVER['PHP_SELF'] ?>?p=<?php echo ($page-1) ?>&sq=<?php echo $sq ?>&th=<?php echo $th ?>">&laquo;上一页</a></li>
<?php }
  //计算偏移量2
?>
<?php  
  $pageoffset=($showpage-1)/2;
  //初始化数据
  $start=1;
  $end=$pagecount;
  //页码逻辑
  if ($pagecount>$showpage) {//总页数大于要显示的页数时
    if ($page>$pageoffset+1) {//当前页大于偏移量加一时
?>
      <li><a href="<?php $_SERVER['PHP_SELF'] ?>?p=1&sq=<?php echo $sq ?>&th=<?php echo $th ?>">1</a></li>
      <li class="disabled"><span>...</span></li>
<?php      
    }
    if ($page>$pageoffset) {//当前页大于偏移量时
      $start=$page-$pageoffset;
      //总页数>当前页+偏移量？当前页+偏移量：最后一页
      $end=$pagecount>$page+$pageoffset?$page+$pageoffset:$pagecount;
    }else{
      $start=1;
      $end=$pagecount>$showpage?$showpage:$pagecount;
    }
    if ($page+$pageoffset>$pagecount) {
      $start=$start-($page+$pageoffset-$end);
    }
}?>
<?php //输出页码
   for($i=$start;$i<=$end;$i++){ 
?>
    <li><a href="<?php $_SERVER['PHP_SELF'] ?>?p=<?php echo $i ?>&sq=<?php echo $sq ?>&th=<?php echo $th ?>"><?php echo $i ?></a></li>
<?php }
?>
<?php
    //尾部省略
    if ($pagecount>$showpage&&$pagecount>$page+$pageoffset) {
?>
      <li class="disabled"><span>...</span></li>
      <li><a href="<?php $_SERVER['PHP_SELF'] ?>?p=<?php echo $pagecount ?>&sq=<?php echo $sq ?>&th=<?php echo $th ?>"><?php echo $pagecount ?></a></li>
<?php   }
    //显示页次 ?>
    <li class="disabled"><span><?php echo $page."/".$pagecount ?>页</span></li>
    
<?php   
//超出最大值
if (!(1<=$page&&$page<=$pagecount)) {
     echo "<script>window.location.href='".$_SERVER['PHP_SELF']."?p=1';</script>";
   }
?>


