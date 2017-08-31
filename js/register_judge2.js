var http_request=false;
    function createRequest(url) {
  //初始化对象并发出XMLHttpRequest请求
  http_request = false;
  if (window.XMLHttpRequest) {                    //Mozilla等其他浏览器
    http_request = new XMLHttpRequest();
    if (http_request.overrideMimeType) {
      http_request.overrideMimeType("text/xml");
    }
  } else if (window.ActiveXObject) {                //IE浏览器
    try {
      http_request = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
      try {
        http_request = new ActiveXObject("Microsoft.XMLHTTP");
       } catch (e) {}
    }
  }
  if (!http_request) {
    alert("不能创建XMLHTTP实例!");
    return false;
  }
  http_request.onreadystatechange = alertContents;             //指定响应方法
  
  http_request.open("GET", url, true);                 //发出HTTP请求
  http_request.send(null);
}                             
function alertContents() {                         //处理服务器返回的信息
  if (http_request.readyState == 4) {
    if (http_request.status == 200) {
       document.getElementById('tiq').innerHTML=http_request.responseText;
    } else {
      alert('您请求的页面发现错误');
    }
  }
}
      function judge(){
        var uname=myform.username.value;
        createRequest('register_submit.php?username='+uname);
      }
 
 function confirm(){
  	var password = document.getElementById('password').value;
    var password1 = document.getElementById('password1').value;
    				if(password==password1){document.getElementById('tip').innerHTML="√";}
    					else{document.getElementById('tip').innerHTML="输入错误，请重新输入";
    				return  document.getElementById('password1').focus();
    			}
    			}
        

 function check(){
  var password = document.getElementById('password').value;
  var password1 = document.getElementById('password1').value;
  var panduan=document.getElementById('tiq').innerHTML;
    if(panduan=="此用户名可用"&&password1===password){
      return true;}else{
        if (panduan=="此用户名已被注册!") {alert('请重新填写用户名');myform.username.focus();return false;}
              if (password!=password1) {alert('请重新填写密码');myform.password1.focus();return false;}
       return false;}
    
}