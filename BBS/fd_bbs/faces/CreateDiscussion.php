<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title>板块添加//管理员
</title>
<link rel="shortcut icon" type="image/x-ico" href="../icon/1.ico"/>
<link rel="stylesheet" type="text/css" href="css/CreateDiscussion.css"/>
</head>

<body>
<?php
	require_once '../PhpBackstage/CheckLogin.php'; 
	$username=$_SESSION['username'];
	$grade=$_SESSION['grade'];
	$whichPlate=$_SESSION['whichPlate'];
	$pic=$_SESSION['pic'];
?>
<div class="main">
	<div class="head"><!-- 顶部 -->
		<div class="title">
			<ul>
				<li><a href="Mainpage.php" title="BBS首页"><span>BBS首页</span></a></li>
				<li><a href="UserSpace.php" title="个人空间"><span>个人空间</span></a></li>
				<li><a href="PostMessage.php"title="发帖"><span>发帖</span></a></li>
				<li><a href="../../login/login.php" title="返回登录"><span>退出</span></a></li>
			</ul>
		</div>
	</div>
	<div class="left"><!-- 左部部 -->
		<div>
			<div class="left_pic"><a href="UserSpace.php">
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
			</a></div>
			<div class="info">
				<span class="chenghao">级别:<span><?php echo $grade;?></span></span>
				<?php
					if($grade=="版主") 
					{
						echo "<span class=\"chenghao\" >版块:　<span>" .$whichPlate."</span></span>";
					}
				?>
			</div>
		</div>
	</div>
	<div class="right"><!-- 右部 -->
		<div class="right_up"><!-- 右部的上部 -->
			<div class="up_pic"><a href="UserSpace.php">
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
			</a></div>
			<div class="info">
				<div class="gerenziliao"><a href="UserSpace.php">个人资料</a></div>
				<span class="mingzi">名字:<span>&nbsp;<?php echo $username;?></span></span>
				<span class="sex">男</span>
			</div>
		</div>
		<div class="right_mid"><!-- 右部的中部 -->
			<div class="right_mid_left">
				<ul>
					<li><a href="ChangeInfo_manager.php" title="管理员权限"><span>修改用户信息</span></a></li>
					<li><a href="PlateHandle.php?plate_name=''"title="版块帖子"><span>板块帖子</span></a></li>
					<li><a href="ChangeInfo.php" title="个人权限"><span>修改个人信息</span></a></li>
				</ul>
			</div>
			<div class="post_message"><a href="PostMessage.php"><span>　发帖</span></a></div><!-- 这里是发帖的按钮 -->
		</div>
		
		<div class="right_down"><!-- 右部的下部 -->
			<div class="down_table">
				<form action="../PhpBackstage/CreateDis_back.php" method="post" style="disply:block">
				<span style="margin-left:34px;margin-top:23px;">请选择区域</span>
					<select style="width:78px;height:20px;margin-left:12px;margin-top:12px" name="area">
						<option value="生活">生活</option>
						<option value="学术研究">学术研究</option>
						<option value="娱乐">娱乐</option>
						<option value="社团">社团</option>
					</select>
					<div style="margin-left:34px;margin-top:12px;">请输入新的讨论区</div>
					<input type="text" name="new_plate" style="margin-left:34px;margin-top:12px;width:164px"/>
				<button style="margin-left:90px;margin-top:10px;width:60px;height:30px" type="submit">确认</button>
				</form>
			</div>
		</div >
	</div>
</div>
</body>
</html>
