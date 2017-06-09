<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title>
论坛登录
</title>
<link rel="shortcut icon" type="image/x-ico" href="../../fd_bbs/icon/1.ico"/>
<link rel="stylesheet" style="text/css" href="../fd_bbs/faces/css/login.css"/>

<script type="text/javascript">
function getCookie(c_name)
{
if (document.cookie.length>0)
  {
  c_start=document.cookie.indexOf(c_name + "=")
  if (c_start!=-1)
    { 
    c_start=c_start + c_name.length+1 
    c_end=document.cookie.indexOf(";",c_start)
    if (c_end==-1) c_end=document.cookie.length
    return unescape(document.cookie.substring(c_start,c_end))
    } 
  }
return ""
}

function setCookie(c_name,value,expiredays)
{
var exdate=new Date()
exdate.setDate(exdate.getDate()+expiredays)
document.cookie=c_name+ "=" +escape(value)+
((expiredays==null) ? "" : ";expires="+exdate.toGMTString())
}

function checkCookie()
{

var pic_count=getCookie('pic_count');
 
if (pic_count!=null && pic_count!="")
  {
	  pic_count++;
	  if(pic_count==5)
	  {
		  pic_count=0;
	 }
	  setCookie('pic_count',pic_count,365)
		return pic_count;
  }
else 
  {
    setCookie('pic_count',0,365)
    checkCookie();
  }
  
}
</script>

<script type="text/javascript">
	<!--
		function haha(){
			window.open("../fd_bbs/faces/RegistPage.php?show=false","_self");
		} 
	-->
  
	
	function change()
	{
		//alert("hello");
		var obj_1=document.getElementById('chg');
		var pic_path_0="url(../fd_bbs/imges/background.jpg)";
		var pic_path_1="url(../fd_bbs/imges/background1.jpg)";
		var pic_path_2="url(../fd_bbs/imges/background2.jpg)";
		var pic_path_3="url(../fd_bbs/imges/background3.jpg)";
		var pic_path_4="url(../fd_bbs/imges/background4.jpg)";
		//alert(pic_path);
		var pic_count=checkCookie();
		//alert(pic_count);
		switch(pic_count)
		{
		case 0:obj_1.style.backgroundImage=pic_path_0;break;
		case 1:obj_1.style.backgroundImage=pic_path_1;break;
		case 2:obj_1.style.backgroundImage=pic_path_2;break;
		case 3:obj_1.style.backgroundImage=pic_path_3;break;
		case 4:obj_1.style.backgroundImage=pic_path_4;break;
		default:break;
		}
		}
</script>
<?php
	setcookie('show','true'); 
?>
</head>
<body onload="change()">
<div class="main">
	<div class="head">
	</div>
	<div id="chg" class="div1" style="background-image: url(../fd_bbs/imges/background4.jpg);">
		<div  class="div2">
			<form action="../fd_bbs/PhpBackstage/login_Back.php" method="post">
				<div class="user_input">
					<div class="user_num">账号<input class="input_css" type="text" name="user" /></div>
					<div class="user_card">密码<input class="input_css" type="password" name="password"></div>
				</div>
				<div class="login">
					<button type="submit" class="log_regis_btn">登　录</button>
				</div>
			</form>
			<div class="regist">
				<button class="log_regis_btn" onClick="haha()">注　册</button>
			</div>
		</div>
	</div>
	
	<div class="tail">
	</div>
</div>
</body>
</html>
