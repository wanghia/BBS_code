<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title>帖子修改
</title>
<link rel="shortcut icon" type="image/x-ico" href="../icon/1.ico"/>
<link rel="stylesheet" type="text/css" href="css/MainPage.css"/>
</head>

<body>
<?php
	
	session_start();
	$username=$_SESSION['username'];
	$password=$_SESSION['password'];
	$pic=$_SESSION['pic'];
	if($username==''||$password=='')
	{
		header('Location:../../login/login.php');
	}
	/////////////////////////////
	require_once '../PhpBackstage/Sql_handle.php';
	$sql=new SqlTool();
	
	$id=$_GET['id'];
	$post_reply=$_GET['post_reply'];
	if($post_reply==1)//发帖
	{
		$ct_1="select content from title where title_id='".$id."'";
	}
	else//回复
	{
		$ct_1="select reply_content from reply_title where reply_id='".$id."'";
	}
	$res=$sql->dql_handle($ct_1);
	$row=mysql_fetch_row($res);
	
	
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
				<div class="user_info2"><span><a href="MainPage.php">刷新　</a></span><span>发帖数&nbsp;</span>
				<span>回帖数&nbsp;</span><a href="UserSpace.php"><span>我的帖子</span></a></div>
			</div>
		</div>
	</div>
	<div class="div2"><!-- 横条部 -->
		<div class="trabecula">
			<ul>
			<li><a href="MainPage.php" title="首页"><span>论坛</span></a></li>
			<li><a href="PlateHandle.php?plate_name=''"title="版块帖子"><span>板块帖子</span></a></li>
			<li><a href="UserSpace.php" title="个人空间"><span>个人空间</span></a></li>
			</ul>
		</div>
		<div class="post_message"><a href="PostMessage.php"><span>发帖</span></a></div>
	</div>
	<div class="div3">
		<div style="width:100px;height:23px;margin-left:23px;font-size:15px;margin-top:13px;">修改</div>
		<form action="../PhpBackstage/Self_info_change.php?id=<?php echo $id;?>&post_reply=<?php echo $post_reply;?>"  method=post >
			<textarea name="text"rows="10" cols="180" style="margin-left:12px;"><?php echo$row[0];?>
			</textarea>
			<button style="width:100px;height: 39px;margin-left:12px;" type="submit">确认修改提交</button>
		</form>
		
	</div>
</div>
</body>
</html>