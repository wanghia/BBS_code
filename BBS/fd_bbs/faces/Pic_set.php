<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title>版块管理//版主跟管理员有权限
</title>
<link rel="shortcut icon" type="image/x-ico" href="../icon/1.ico"/>
<link rel="stylesheet" type="text/css" href="css/Pic_set.css"/>

</head>
<body>
<?php
	require_once '../PhpBackstage/CheckLogin.php'; 
	$grade=$_SESSION['grade'];
	$username=$_SESSION['username'];
	$whichPlate=$_SESSION['whichPlate'];
	$pic=$_SESSION['pic'];
	//echo $whichPlate;
	require_once '../PhpBackstage/Sql_handle.php';
	$sql =new SqlTool();
	
	$pic_tem=$_GET['pic_tem'];
	//echo $pic_tem;
	$pic_sentence="select pic_name from Pic";
	$res_pic=$sql->dql_handle($pic_sentence);
	
	$of_title="select title_id from title where auther='".$username."'";
	$of_replytitle="select reply_id from reply_title where reply_people='".$username."'";
	
	$res_numof_title=$sql->dql_handle($of_title);
	$res_numof_replytitle=$sql->dql_handle($of_replytitle);
	
	$numof_title=mysql_num_rows($res_numof_title);
	$numof_replytitle=mysql_num_rows($res_numof_replytitle);
?>
<div class="main">
	<div class="div1"><!-- 主页面头部 -->
		<div class="head_pic"></div>
		<div class="head_user">
			<div>
				<form action="../PhpBackstage/quit.php" method="post">
					<button  class="quit" title="返回登录">退出</button>
				</form>
			</div>
			<div class="user_pic"><a href="UserSpace.php">
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
			<div class="user_info">
				<div class="user_info1"><span>小头像　<a href="UserSpace.php"><?php echo "$username";?></a></span></div>
				<div class="user_info2"><span><a href="MainPage.php">刷新　</a></span><span>发帖数&nbsp;<?php echo $numof_title;?></span>
				<span>回帖数&nbsp;<?php echo $numof_replytitle;?>　</span><a href="UserSpace.php"><span>我的帖子</span></a></div>
			</div>
		</div>
	</div>
	<div class="div2"><!-- 横条部 -->
		<div class="trabecula">
			<ul>
			<li><a href="MainPage.php" title="首页"><span>BBS论坛</span></a></li>
			<li><a href="PlateHandle.php?plate_name=''"title="版块帖子"><span>板块帖子</span></a></li>
			<li><a href="UserSpace.php" title="个人空间"><span>个人空间</span></a></li>
			</ul>
		</div>
		<div class="post_message"><a href="PostMessage.php"><span>发帖</span></a></div>
	</div>
	<div class="div3">
		<div class="left_pic">
			<?php
				for($i=0;$i=$row=mysql_fetch_row($res_pic);$i++)
				{ 
					$pic=$row[0];
					echo "<div class=\"pic\">";
					echo "<a href=\"../PhpBackstage/Pic_tem.php?pic_tem=$pic\">";
					echo "<img src=\"$pic\"style=\"width:100%;height:100%\"/>";
					echo "</a></div>";
				}
			?>
		</div>
		<div class="right_ok">
			<div style="margin-left:23px;margin-top:12px;height:12px;">头像预览</div>
			<div class="pic">
				<?php 
				if($pic_tem=="")
				{
					if($pic=="no")
					{
						echo "<img src=\"../imges/1.jpg\" style=\"width:100%;height:100%\"/>";
					}
					else
					{
						echo "<img src=\"$pic\"style=\"width:100%;height:100%\"/>";
					}
				}
				else 
				{
					echo "<img src=\"$pic_tem\"style=\"width:100%;height:100%\"/>";
				}
			?>
			</div>
			<div class="text">
				<form action="../PhpBackstage/Pic_set_back.php?pic_tem=<?php echo $pic_tem;?>" method="post">
					<button type="submit" value="确认修改" style="width:89px;height:34px;margin-left:34px;margin-top:12px;">确认修改</button>
				</form>
			</div>
		</div>
	</div>
	</div>
	</body>
	</html>