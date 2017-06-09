<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>更改用户信息//管理员</title>
<link rel="shortcut icon" type="image/x-ico" href="../icon/1.ico" />
<link rel="stylesheet" type="text/css" href="css/ChangeInfo_manager.css" />
<script type="text/javascript">
	function sub()
	{
		var input1=document.getElementById('form1');
		form1.action="../PhpBackstage/ChangeInfo_manager_back.php?id="+input1;
		
		var input2=document.getElementById('username');
		var input3=document.getElementById('password');
		var input4=document.getElementById('email');
		if(input2.value=="")
		{
			alert("用户名不能为空");
			form1.action="../faces/ChangeInfo_manager.php?id="+input1;
		}
		else if(input3.value=="")
		{
			alert("密码不能为空");
			form1.action="../faces/ChangeInfo_manager.php?id="+input1;
		}
		else if(input4.value=="")
		{
			alert("邮箱不能为空");
			form1.action="../faces/ChangeInfo_manager.php?id="+input1;
		}
		else
		{
			form1.action="../PhpBackstage/ChangeInfo_manager_back.php?id="+input1;
		}
	}
	function cha(str)
	{
		if(str=="版主")
		{
			document.getElementById('bankuai').style.display="block";
		}
		else
		{
			document.getElementById('bankuai').style.display="none";
		}
	}
</script>
</head>
<body>
<?php
	require_once '../PhpBackstage/CheckLogin.php'; 
	$username=$_SESSION['username'];
	$pic=$_SESSION['pic'];
	require_once '../PhpBackstage/Sql_handle.php';
	$sql=new SqlTool();
	
	$ban_centence="select distinct plate_name from plate where plate_name not in(select whichPlate from user where grade='版主')";//这个用于查询没有被选择的版块
	$res_bankuai=$sql->dql_handle($ban_centence);
?>
<div class="main">
		<div class="div1">
			<!-- 主页面头部 -->
			<div class="head_pic"></div>
			<div class="head_user">
				<div>
					<form action="../PhpBackstage/quit.php" method="post">
						<button class="quit" title="返回登录">退出</button>
					</form>
				</div>
				<div class="user_pic">
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
				<div class="user_info">
					<div class="user_info1">
						<span>小头像 <a href="UserSpace.php"><?php echo $username; ?></a></span>
					</div>
					<div class="user_info2">
						<span><a href="ChangeInfo_manager.php">刷新 </a></span><span>发帖数&nbsp;</span>
						<span>回帖数&nbsp;</span><a href="UserSpace.php"><span>我的帖子</span></a>
					</div>
				</div>
			</div>
		</div>
		<div class="div2">
			<!-- 横条部 -->
			<div class="trabecula">
				<ul>
					<li><a href="MainPage.php" title="首页"><span>BBS论坛</span></a></li>
					<li><a href="PlateHandle.php?plate_name=''"title="版块帖子"><span>板块帖子</span></a></li>
					<li><a href="UserSpace.php" title="个人空间"><span>个人空间</span></a></li>
				</ul>
			</div>
			<div class="post_message">
				<a href="PostMessage.php"><span>发帖</span></a>
			</div>
		</div>
		<!-- ########################################## -->
		<div class="div3">
			<div class="left">
				<div style="margin: 23px; border: 1px solid red">
					<span class="text">输入查找的用户名</span>
					<form action="../PhpBackstage/SearchUser.php" method="post">
						<input type="text" name="username"
							style="width: 120px; height: 23px; margin: 12px 23px 12px 38px" />

						<select style="width: 120px; margin-left: 38px"
							name="delete_or_change">
							<option value="Change" selected="selected">查看用户</option>
							<option value="Delete">删除用户</option>
						</select>
						<button class="search_btn" type="submit">确认</button>
					</form>
				</div>
			</div>
			<div class="right">
				<form method="post" action="#" onsubmit="sub();" id="form1">
					<div class="name">
						<span>用户名</span> 
						<input type="text" name="username"value="<?php echo$_SESSION['s_username'];?>" id="username"/>
					</div>
					<div class="password">
						<span>密码</span> 
						<input type="password" name="password" value="<?php echo$_SESSION['s_password'];?>" id="password"/>
					</div>
					<div class="sex">
						<span>性别</span>
						<?php 
							if($_SESSION['s_sex']=="男")
							{
								echo "<input type=\"radio\" value=\"男\" name=\"sex\" id=\"sex\" checked/>男"; 
								echo "<input type=\"radio\" value=\"女\" name=\"sex\" id=\"sex\"/>女"; 
							}
							else 
							{
								echo "<input type=\"radio\" value=\"男\" name=\"sex\" id=\"sex\"/>男";
								echo "<input type=\"radio\" value=\"女\" name=\"sex\" id=\"sex\"checked/>女";
							}
						?>
					</div>
					<div class="email">
						<span>邮箱</span>
						<input type="text" name="email" id="email" value="<?php echo$_SESSION['s_email'];?>" />
					</div>
					<div class="grade">
						<div style="float:left;">
						<span>级别</span>
						<?php 
							echo "<select name=\"grade\" id=\"grade\" onChange=\"cha(this.options[this.options.selectedIndex].value)\">";
							if($_SESSION['s_grade']=="民工")
							{
								echo "<option value=\"民工\" id=\"mingong\" selected>民工</option>";
								echo "<option value=\"版主\" id=\"banzhu\">版主</option>";
								echo "<option value=\"管理员\" id=\"guanliyuan\">管理员</option>";
							}
							else if($_SESSION['s_grade']=="版主")
							{
								echo "<option value=\"民工\" id=\"mingong\">民工</option>";
								echo "<option value=\"版主\" id=\"banzhu\" selected>版主</option>";
								echo "<option value=\"管理员\" id=\"guanliyuan\">管理员</option>";
								echo "<span>　　版块为：</span>".$_SESSION['s_whichPlate'];
							}
							else
							{
								echo "<option value=\"民工\" id=\"mingong\">民工</option>";
								echo "<option value=\"版主\" id=\"banzhu\">版主</option>";
								echo "<option value=\"管理员\" id=\"guanliyuan\" selected>管理员</option>";
							}
							echo "</select>";
						?>
						</div>
						<div style="float:left">
						<select id="bankuai" style="display: none;margin-top:4px;" name="whichPlate">
							<?php
							for($i=0;$i<$row=mysql_fetch_row($res_bankuai);$i++)
							{
								if($row[0]!="")
								{
									echo "<option value=\"$row[0]\">$row[0]</option>";
								}
							} 
							?>
						</select>
						</div>
						<div style="float:left;">
							<?php
							if($_SESSION['s_grade']=='版主')
							{
								echo "　".$_SESSION['s_whichPlate']."版"."版主";
							} 
							?>
						</div>
					</div>
					<div class="useornot">
						<span>被禁否</span> 
						<?php 
							if($_SESSION['s_useornot']=="1")
							{
								echo "<input id=\"useornot\" type=\"radio\" name=\"useornot\" value=\"0\" />禁止"; 
								echo "<input id=\"useornot\" type=\"radio\" name=\"useornot\" value=\"1\" checked/>启用"; 
							}
							else 
							{
								echo "<input id=\"useornot\" type=\"radio\" name=\"useornot\" value=\"0\" checked/>禁止";
								echo "<input id=\"useornot\" type=\"radio\" name=\"useornot\" value=\"1\" />启用";
							}
						?>
					</div>
					<div class="submit">
						<button class="submit_btn" type="submit">确认修改并提交</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>