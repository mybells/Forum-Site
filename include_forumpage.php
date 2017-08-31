
<ul class="pagination" style="margin-top:0px;margin-bottom:0px;">
  <?php 

    if ($page!=1) {
        echo "<li><a href=".$_SERVER['PHP_SELF']."?id=".$id."&p=".($page-1).">&laquo;上一页</a></li>";
        }
    //计算偏移量2
    $pageoffset=($showpage-1)/2;
    //初始化数据
	$start=1;
	$end=$pagecount;
	//页码逻辑
	if ($pagecount>$showpage) {//总页数大于要显示的页数时
		if ($page>$pageoffset+1) {//当前页大于3时
			echo "<li><a href=".$_SERVER['PHP_SELF']."?id=".$id."&p=1>1</a></li>";
			echo '<li class="disabled"><span>...</span></li>';
		}
		if ($page>$pageoffset) {//当前页大于2时
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
	}
    //输出页码
	for($i=$start;$i<=$end;$i++){
		echo "<li><a href=".$_SERVER['PHP_SELF']."?id=".$id."&p=".$i.">".$i."</a></li>";
	}
    //尾部省略
    if ($pagecount>$showpage&&$pagecount>$page+$pageoffset) {
    	echo '<li class="disabled"><span>...</span></li>';
    	echo "<li><a href=".$_SERVER['PHP_SELF']."?id=".$id."&p=".$pagecount.">".$pagecount."</a></li>";
    }
    //显示页次 
    if ($pagecount) {
    	echo '<li class="disabled"><span>'.$page."/".$pagecount."页</span></li>";
    }else{
    	echo '<li><a herf="">返回列表</a></li>';
    }
    
	//下一页
   if ($page<$pagecount) {
   	    echo "<li><a href=".$_SERVER['PHP_SELF']."?id=".$id."&p=".($page+1).">下一页&raquo;</a></li>";
   }
    if (!(1<=$page&&$page<=$pagecount)) {
     echo "<script>window.location.href='".$_SERVER['PHP_SELF']."?id=".$id."&p=1';</script>";
   }
   //跳转页码
   if ($pagecount>5) {?>

<li style ="float : right; margin-left :1px;height:20px;margin-right :1px;">
           <input type= "hidden" id ="to" value="<?php echo $id ?>" >
    到第   <input type= "text" id ="toPage" name= "p" style=" width: 40px ;border-radius : 3px;" value="<?php echo $page ?>" >  页   
    <button class= "btn btn-default"  onclick="chk()">确定 </button>
   </li>
   <?php }?>
   </ul>
<script>
	function chk(){
	    var q=$('#toPage').val();//判断跳转值是否满足条件，不满足跳转到首页
		var w=$('#to').val();
	    window.location.href='forum.php?id='+w+'&p='+q;
	}
</script>