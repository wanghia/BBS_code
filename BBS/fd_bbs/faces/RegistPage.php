<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title>论坛注册</title>
<link rel="shortcut icon" type="image/x-ico" href="../icon/1.ico"/>
<link rel="stylesheet" type="text/css" href="css/RegistPage.css"/>

<script type="text/javascript">
<!--
	function check()  
	{  
		var input1=document.getElementById('password');
		var input2=document.getElementById('next_password');
		if(input1.value!=input2.value)   
		{  
			 document.getElementById("see").style.visibility="visible";
			 input2.value=""; 
		}
		else
		{
			document.getElementById("see").style.visibility="hidden";
		}
	}
	function sub()
	{
		var input1=document.getElementById('form1');
		///form1.action="../PhpBackstage/Regist_Back.php?id="+input1;
		
		var input2=document.getElementById('password');
		var input3=document.getElementById('next_password');
		var input4=document.getElementById('email');
		var input5=document.getElementById('username');
		if(input5.value=="")
		{
			alert("用户名不能为空");
			form1.action="../faces/RegistPage.php?id="+input1;
		}
		else if(input2.value=="")
		{
			alert("密码不能为空");
			form1.action="../faces/RegistPage.php?id="+input1;
		}
		else if(input3.value=="")
		{
			alert("确认密码不能为空");
			form1.action="../faces/RegistPage.php?id="+input1;
		}
		else if(input4.value=="")
		{
			alert("邮箱不能为空");
			form1.action="../faces/RegistPage.php?id="+input1;
		}
		else
		{
			form1.action="../PhpBackstage/Regist_Back.php?id="+input1;
		}
	}
-->
</script>
</head>
<body>
<div class="main"><!-- 主框架 -->
	<div class="head"><!-- 注册页面的上面部分 -->
		
	</div>
	<div class="middle"><!-- 注册页面的中间部分 -->
		<ul>
		<li><a href="../../login/login.php" title="返回登录"><span style="letter-spacing:3px">返回登录</span></a></li>
		</ul>
	</div>
	<div class="tail"><!-- 注册页面的下面部分 -->
		<div class="regist">
			<form onsubmit="sub();" method="post" id="form1" style="width:100%;heigth:300px;margin-top:45px;">
				<div class="name">
					<span class="user">用户名</span>
					<input type="text" name="username" id="username"/>
					<span style="color:red">*<span id="again_name" style="visibility:hidden"></span></span></div>
				<div class="password">
					<span>密码</span>
					<input type="password" id="password" name="password"/>
					<span style="color:red">*</span>
				</div>
				<div class="config">
					<span>确认密码</span>
					<input type="password" id="next_password" onBlur="check()"/>
					<span style="color:red ">*<span style="visibility: hidden" id="see">密码不一致</span></span>
				</div>
				<div class="sex">
					<span>性别</span>
					<input type="radio" value="男" name="sex" >男
					<input type="radio" value="女" name="sex"/>女
				</div>
				<div class="email">
					<span>邮箱</span>
					<input type="text" name="email" id="email"/>
					<span style="color:red">*</span>
				</div>
				<div class="submit"><button class="submit_btn" id="sub_btn">提交</button></div>
			</form>
		</div>
	</div>
</div>
</body>
</html>
