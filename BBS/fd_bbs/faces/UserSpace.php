<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title>个人空间
</title>
<link rel="shortcut icon" type="image/x-ico" href="../icon/1.ico"/>
<link rel="stylesheet" type="text/css" href="css/UserSpace.css"/>
<?php
	require_once '../PhpBackstage/CheckLogin.php'; 
	$username=$_SESSION['username'];
	$grade=$_SESSION['grade'];
	$pic=$_SESSION['pic'];
	$whichPlate=$_SESSION['whichPlate'];
	require_once '../PhpBackstage/Sql_handle.php';
	$sql=new SqlTool();
	
	$sentence_post="select theme,plate_name,auther,title_time,title_id from title where auther='".$username."'";
	$sentence_reply="select theme,auther,title_time,reply_time,reply_id,reply_title.title_id from reply_title,title where title.title_id=reply_title.title_id and reply_people='".$username."'";
	
	$res_post=$sql->dql_handle($sentence_post);
	$res_reply=$sql->dql_handle($sentence_reply);
	
	$rows_post=mysql_num_rows($res_post);
	$rows_replyt=mysql_num_rows($res_reply);
	$cols_post=mysql_num_fields($res_post);
	$cols_reply=mysql_num_fields($res_reply);
	/*echo$rows_post;
	echo$cols_post;
	echo$rows_replyt;
	echo$cols_reply;*/
?>
<script type="text/javascript">
	function cha(value)
	{
		document.getElementById('reply').style.display="none";
		document.getElementById('post').style.display="none";
		//if(value=="post")
		//{
			//alert("post1");
			//document.getElementById('reply').style.display="none";
			//document.getElementById('post').style.display="block";
			//document.getElementById(value).style.display="block";
		//}
		//else
		//{
			//alert("reply2");
			//document.getElementById('post').style.display="none";
			//document.getElementById('reply').style.display="block";
			document.getElementById(value).style.display="block";
		//}
	}
</script>

</head>
<body>
<script type="text/javascript">

	function check1()
	{
		<?php if($grade=='管理员')//修改用户信息
		{
			echo"window.location.href=\"ChangeInfo_manager.php\";";
		}
		?>
	}
	function check2()//板块处理
	{
		<?php 
			echo "window.location.href=\"PlateHandle.php?plate_name=\"\"\";";
		?>
	}
	function check3()//创建讨论区
	{
		<?php if($grade=='管理员')
		{
			echo"window.location.href=\"CreateDiscussion.php\";";
		}
		?>
	}
</script>
<div class="main">
	<div class="head"><!-- 顶部 -->
		<div class="title">
			<ul>
				<li><a href="Mainpage.php" title="BBS首页"><span>BBS首页</span></a></li>
				<li><a href="UserSpace.php" title="个人空间"><span>个人空间</span></a></li>
				<li><a href="PostMessage.php"title="发帖"><span>发帖</span></a></li>
				<li><a href="../PhpBackstage/quit.php" title="返回登录"><span>退出</span></a></li>
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
			</a>
			</div>
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
				<?php 
					if($grade=="管理员")
					{
						echo "<li><a href=\"CreateDiscussion.php\" title=\"管理员权限\"\"><span>新建讨论区</span></a></li>";
						echo "<li><a href=\"ChangeInfo_manager.php\" title=\"管理员权限\"\"><span>修改用户信息</span></a></li>";
					}
				?>
					<li><a href="PlateHandle.php?plate_name=<?php echo $whichPlate;?>"><span>版块帖子</span></a></li>
					<li><a href="ChangeInfo.php" title="个人权限"><span>修改个人信息</span></a></li>
				</ul>
			</div>
			<div class="post_message"><a href="PostMessage.php"><span>　发帖</span></a></div><!-- 这里是发帖的按钮 -->
		</div>
		<div class="right_down"><!-- 右部的下部 -->
			<div class="down_table">　　查看　
				<select onchange="cha(this.options[this.options.selectedIndex].value)">
					<option value="" selected="selected">请选择</option>
					<option value="post">发的帖子</option>
					<option value="reply">回复的帖子</option>
				</select>
				<div id="post" style="display:none;height:230px;"><!-- 这里是发帖的地方 -->
				<?php
				echo "<table style=\"table-layout:fixed;font-size:15px;width:799px;display:block\">";
					//echo "<table style=\"border:1px solid red;width:100%\">";
					echo "<tr>";
					for($i=-1;$i<=$cols_post;$i++)
					{
						/*$a=mysql_field_name($res_post,$i);
						echo "<td>$a</td>";*/
						switch($i)
						{
							case '-1':
								echo "<td style=\"width:30px;\">序号</td>";
								break;
							case '0':
								echo "<td style=\"width:359px;\">主题</td>";
								break;
							case '1':
								echo "<td style=\"width:80px;\">版块</td>";
								break;
							case '2':
								echo "<td style=\"width:50px;\">作者</td>";
								break;
							case '3':
								echo "<td style=\"width:150px;\">发帖时间</td>";
								break;
							case '4':
								echo "<td style=\"width:80px;\">处理</td>";
								break;
						}
					}
					echo "</tr>";
					for($i=1;$i<=$row=mysql_fetch_row($res_post);$i++)
					{
						echo "<tr>";
						for($j=-1;$j<$cols_post;$j++)
						{
							
							if($j==-1)
							{
								echo "<td>$i</td>";
							}
							else if($j!=($cols_post-1))
							{
								if($j==0)
								{
									echo "<td style=\"overflow:hidden;white-space:nowrap;\">";
									echo "<a href=\"SomeMessage.php?id=$row[4]&page=0&numofpage=0&endnum=0\">$row[$j]</a></td>";
								}
								else
								{
									echo "<td>$row[$j]</td>";
								}
							}
							else
							{
								echo "<td><a href=\"../PhpBackstage/Self_info_handle.php?post_reply=1&id=$row[4]\">删除</a>/
								<a href=\"Self_tiezi_change.php?post_reply=1&id=$row[4]\">修改</a></td>";
							}
						}
						echo "</tr>";
					}
					echo "</table>";
				?>
				</div>
				<div id="reply" style="display:none;width:100%;height:250px;"><!-- 这里是回复的地方 -->
					<?php
						echo "<table style=\"table-layout:fixed;font-size:15px;width:799px;display:block\">";
						echo "<tr>";
						for($i=-1;$i<($cols_reply-1);$i++)
						{
							switch($i)
							{
								case '-1':
									echo "<td style=\"width:30px;\">序号</td>";
									break;
								case '0':
									echo "<td style=\"width:329px;\">主题</td>";
									break;
								case '1':
									echo "<td style=\"width:50px;\">作者</td>";
									break;
								case '2':
									echo "<td style=\"width:140px;\">发帖时间</td>";
									break;
								case '3':
									echo "<td style=\"width:140px;\">回帖时间</td>";
									break;
								case '4':
									echo "<td style=\"width:80px;\">处理</td>";
									break;
							}
						}
						echo "</tr>";
						for($i=1;$i<=$row=mysql_fetch_row($res_reply);$i++)
						{
							echo "<tr>";
							for($j=-1;$j<($cols_reply-1);$j++)
							{
								if($j==-1)
								{
									echo "<td>$i</td>";
								}
								else if($j!=($cols_reply-2))
								{
									if($j==0)
									{
										echo "<td style=\"overflow:hidden;white-space:nowrap;\">";
										echo "<a href=\"SomeMessage.php?id=$row[5]&page=0&numofpages=0&endnum=0\">$row[$j]</a></td>";
									}
									else
									{
									
										echo "<td>$row[$j]</td>";
									}
								}
								else
								{
									echo "<td><a href=\"../PhpBackstage/Self_info_handle.php?post_reply=2&id=$row[4]\">删除</a>/
									<a href=\"Self_tiezi_change.php?post_reply=2&id=$row[4]\">修改</a></td>";
								}
							}
							echo "</tr>";
						}
						echo "</table>";
					?>
				</div>
			</div>
		</div >
	</div>
</div>
</body>
</html>
