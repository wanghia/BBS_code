<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title>论坛主页
</title>
<link rel="shortcut icon" type="image/x-ico" href="../icon/1.ico"/>
<link rel="stylesheet" type="text/css" href="css/MainPage.css"/>
</head>

<body>
<?php
	
	session_start();
	$username=$_SESSION['username'];
	$password=$_SESSION['password'];
	$whichPlate=$_SESSION['whichPlate'];
	$pic=$_SESSION['pic'];
	
	if($username==''||$password=='')
	{
		header('Location:../../login/login.php');
	}
	require_once '../PhpBackstage/Sql_handle.php';
	$sql=new SqlTool();
	
	$ct_1="select plate_name from plate where area_name='生活'";
	$ct_2="select plate_name from plate where area_name='学术研究'";
	$ct_3="select plate_name from plate where area_name='娱乐'";
	$ct_4="select plate_name from plate where area_name='社团'";
	
	$res_1=$sql->dql_handle($ct_1);
	$res_2=$sql->dql_handle($ct_2);
	$res_3=$sql->dql_handle($ct_3);
	$res_4=$sql->dql_handle($ct_4);
	
	$stnew_post="select theme,plate_name,auther,title_time,title_id from title order by title_time desc limit 0,15";
	$stnew_reply="select theme,auther,title_time,reply_time,reply_people,reply_title.title_id from reply_title,
			title where title.title_id=reply_title.title_id order by reply_time desc limit 0,15";
	
	$res_post_new=$sql->dql_handle($stnew_post);
	$res_reply_new=$sql->dql_handle($stnew_reply);
	
	$col_p=mysql_num_fields($res_post_new);
	$col_r=mysql_num_fields($res_reply_new);
	
	
	
	
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
			<li><a href="MainPage.php" title="首页"><span>论坛</span></a></li>
			<li><a href="PlateHandle.php?plate_name=<?php echo $whichPlate;?>"title="版块帖子"><span>板块帖子</span></a></li>
			<li><a href="UserSpace.php" title="个人空间"><span>个人空间</span></a></li>
			</ul>
		</div>
		<div class="post_message">
			<a href="PostMessage.php"><span>发帖</span></a></div>
	
	</div>
	<div class="div3"><!-- 帖子部 -->
	<div style="margin-left:18px;margin-top:8px;width:550px;float:left;font-weight:bold;font-size:14">最新帖子</div><div style="margin-left:14px;font-weight:bold;margin-top:8px;float:left">最新回复</div>
		<div class="message_new">
			<?php
				echo "<table style=\"table-layout:fixed;border:2px solid red;font-size:14px;width:554px\">";
				echo "<tr>";
				for($i=-1;$i<($col_p-1);$i++)
				{
					/*$a=mysql_field_name($res_post,$i);
					echo "<td>$a</td>";*/
					switch($i)
					{
						case '-1':
							echo "<td style=\"width:30px;\">序号</td>";
							break;
						case '0':
							echo "<td style=\"width:243px;\">主题</td>";
							break;
						case '1':
							echo "<td style=\"width:73px;\">版块</td>";
							break;
						case '2':
							echo "<td style=\"width:50px;\">作者</td>";
							break;
						case '3':
							echo "<td>发帖时间</td>";
							break;
					}
				}
				echo "</tr>";
				for($i=1;$i<=$row=mysql_fetch_row($res_post_new);$i++)
				{
					echo "<tr>";
					for($j=-1;$j<($col_p-1);$j++)
					{
						
						if($j==-1)
						{
							echo "<td>$i</td>";
						}
						else if($j!=$col_p)
						{
							if($j==0)
							{
								echo "<td class=\"td1\"><a href=\"SomeMessage.php?id=$row[4]&page=0&numofpages=0&endnum=0\">$row[$j]</a></td>";
							}
							else 
							{
								echo "<td style=\"overflow:hidden;white-space:nowrap;\">$row[$j]</td>";
							}
						}
					}
					echo "</tr>";
				}
				echo "</table>";
			?>
		</div>
		<div class="message_reply">
			<?php
				echo "<table style=\"table-layout:fixed;width:550px;border:2px solid red;font-size:14px;width:100%\">";
				echo "<tr>";
				for($i=-1;$i<$col_r;$i++)
				{
					switch($i)
					{
						case '-1':
							echo "<td style=\"width:30px;\">序号</td>";
							break;
						case '0':	
							echo "<td style=\"width:180px;\">主题</td>";
							break;
						case '1':
							echo "<td style=\"width:40px;\">作者</td>";
							break;
						case '2':
							echo "<td style=\"width:100px;\">发帖时间</td>";
							break;
						case '3':
							echo "<td style=\"width:125px;\">回帖时间</td>";
							break;
						case '4':
							echo "<td>回帖人</td>";
							break;
					}
				}
				echo "</tr>";
				for($i=1;$i<=$row=mysql_fetch_row($res_reply_new);$i++)
				{
					echo "<tr>";
					for($j=-1;$j<$col_r;$j++)
					{
						if($j==-1)
						{
							echo "<td>$i</td>";
						}
						else if($j!=($col_r-1))
						{
							if($j==0)
							{
								echo "<td class=\"td1\"><a href=\"SomeMessage.php?id=$row[5]&page=0&numofpages=0&endnum=0\">$row[$j]</a></td>";
							}
							else 
							{
								echo "<td style=\"overflow:hidden;white-space:nowrap;\">$row[$j]</td>";
							}
						}
					}
					echo "</tr>";
				}
				echo "</table>";
			?>
		</div>
	</div>
	<div class="div4"><!-- 区域块 -->
		<div>
			<div class="area"><!-- 区域1 -->
				<div style="float:left;height:auto;">
					<div class="piece_head">
						<div class="piece_head_first"><span>　生活</span></div>
						<div class="piece_head_next"></div>
					</div>
					<div class="piece_content">
						<?php
							for($i=0;$i<$row=mysql_fetch_row($res_1);$i++)
							{
								if($row[0]!="")
								{
									echo "<a href=\"PlateHandle.php?plate_name=$row[0]\"><div class=\"content_cl\">$row[0]</div></a>";
								}
							} 
						?>
					</div>
				</div>
			</div>
			<div class="area"><!-- 区域2 -->
			<div style="float:left;">
				<div class="piece_head">
					<div class="piece_head_first"><span>　学术研究</span></div>
					<div class="piece_head_next"></div>
				</div>
				<div class="piece_content">
					<?php
						for($i=0;$i<$row=mysql_fetch_row($res_2);$i++)
						{
							if($row[0]!="")
							{
								echo "<a href=\"PlateHandle.php?plate_name=$row[0]\"><div class=\"content_cl\">$row[0]</div></a>";
							}
						} 
					?>
				</div>
				</div>
			</div>
			<div class="area"><!-- 区域3 -->
			<div style="float:left;">
				<div class="piece_head">
					<div class="piece_head_first"><span>　娱乐</span></div>
					<div class="piece_head_next"></div>
				</div>
				<div class="piece_content">
					<?php
						for($i=0;$i<$row=mysql_fetch_row($res_3);$i++)
						{
							if($row[0]!="")
							{
								echo "<a href=\"PlateHandle.php?plate_name=$row[0]\"><div class=\"content_cl\">$row[0]</div></a>";
							}
						} 
					?>
				</div>
				</div>
			</div>
			<div class="area"><!-- 区域3 -->
			<div style="float:left;">
				<div class="piece_head">
					<div class="piece_head_first"><span>　社团</span></div>
					<div class="piece_head_next"></div>
				</div>
				<div class="piece_content">
					<?php
						for($i=0;$i<$row=mysql_fetch_row($res_4);$i++)
						{
							if($row[0]!="")
							{
								echo "<a href=\"PlateHandle.php?plate_name=$row[0]\"><div class=\"content_cl\">$row[0]</div></a>";
							}
						} 
					?>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
