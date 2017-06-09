<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title>信息更改</title>
<link rel="shortcut icon" type="image/x-ico" href="../icon/1.ico"/>
<link rel="stylesheet" type="text/css" href="css/ChangeInfo.css"/>
<script type="text/javascript">
	function check()
	{
		var input1=document.getElementById('newpassword');
		var input2=document.getElementById('confirmpassword');
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
		form1.action="../PhpBackstage/ChangeInfo_back.php?id="+input1;
		
		var input2=document.getElementById('oldpassword');
		var input3=document.getElementById('newpassword');
		var input4=document.getElementById('confirmpassword');
		var input5=document.getElementById('email');
		if(input2.value=="")
		{
			alert("旧密码不能为空");
			form1.action="../faces/ChangeInfo.php?id="+input1;
		}
		else if(input3.value=="")
		{
			alert("新密码不能为空");
			form1.action="../faces/ChangeInfo.php?id="+input1;
		}
		else if(input4.value=="")
		{
			alert("确认密码不能为空");
			form1.action="../faces/ChangeInfo.php?id="+input1;
		}
		else if(input5.value=="")
		{
			alert("邮箱不能为空");
			form1.action="../faces/ChangeInfo.php?id="+input1;
		}
		else
		{
			form1.action="../PhpBackstage/ChangeInfo_Back.php?id="+input1;
		}
		
	}
</script>
</head>
<body>
<?php
	require_once '../PhpBackstage/CheckLogin.php'; 
	$pic=$_SESSION['pic'];
?>
<div class="main"><!-- 主框架 -->
	<div class="head"><!-- 注册页面的上面部分 -->
	</div>
	
	<div class="middle"><!-- 注册页面的中间部分 -->	
		<ul>
			<li><a href="MainPage.php" title="BBS首页"><span>BBS首页</span></a></li>
			<li><a href="UserSpace.php" title="个人空间"><span>个人空间</span></a></li>
			<li><a href="PostMessage.php" title="发帖"><span>发帖</span></a></li>
		</ul>
	</div>
	<div class="tail"><!-- 注册页面的下面部分 -->
		<div class="left">
			<div style="width:250px;margin-left:10px;margin-top:10px;height:290px;border:1px solid red;">
				<div class="pic">
				<a href="UserSpace.php">
				<?php 
					if($pic=="no")
					{
						echo "<img src=\"../imges/1.jpg\" style=\"width:100%;height:100%\"/>";
					}
					else
					{
						echo "<img src=\"$pic\"style=\"width:100%;height:100%\"/>";
					}
				?>
				</a>
				</div>
				<div class="upload">
		        	<!-- <form action="../PhpBackstage/Upload_pic.php" method="post"enctype="multipart/form-data"> -->
						<form action="../PhpBackstage/Upload_pic.php" method="post"enctype="multipart/form-data">
							<input type="file" name="file" id="file"  class="upload_touxiang"/> 
							<input type="submit" name="submit" value="确认上传" />
						</form>
				</div>
				<span style="margin-left:34px;float:left">接收gif/jpg/png格式</span>
			</div>
			<a href="Pic_set.php?pic_tem=" >
				<div class="select_pic_havedone">
					<span style="margin-left:45px;">选择已存在图像</span>
				</div>
			</a>
		</div>
			<div class="regist">
				<div style="margin-top:64px;">
				<form  method="post" onsubmit="sub();" id="form1">
					<div class="name">
						<span class="oldpassword">旧密码</span>
						<input type="password" name="oldpassword" id="oldpassword"/>
						<span style="color:red">*</span>
					</div>
					<div class="newpassword">
						<span>新密码</span>
						<input type="password" id="newpassword" name="newpassword"/>
						<span style="color:red">*</span>
					</div>
					<div class="config">
						<span>确认密码</span>
						<input type="password" id="confirmpassword" onBlur="check()"/>
						<span style="color:red ">*<span style="visibility: hidden" id="see">密码不一致</span></span>
					</div>
					<div class="sex">
						<span>性别</span>
						<input type="radio" value="男" name="sex" checked="checked"/>男
						<input type="radio" value="女" name="sex"/>女
					</div>
					<div class="email">
						<span>邮箱</span>
						<input type="text" name="email" id="email"/>
						<span style="color:red">*</span>
					</div>
					<div class="submit"><button class="submit_btn">保存</button></div>
				</form>
				</div>
			</div>
	</div>
</div>
</body>
</html>
