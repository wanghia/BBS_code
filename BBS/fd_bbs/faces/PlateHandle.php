<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title>版块管理//版主跟管理员有权限
</title>
<link rel="shortcut icon" type="image/x-ico" href="../icon/1.ico"/>
<link rel="stylesheet" type="text/css" href="css/PlateHandle.css"/>

<script type="text/javascript">
	function cha(value)
	{
		//alert(value);
			/*document.getElementById('台球俱乐部').style.display="none";
			document.getElementById('开心乐园').style.display="none";
			document.getElementById('运动专栏').style.display="none";
			document.getElementById('竞赛交流区').style.display="none";
			document.getElementById('考研专区').style.display="none";
			document.getElementById('软件交流区').style.display="none";
			document.getElementById('心灵花园').style.display="none";
			document.getElementById('校园交易').style.display="none";
			document.getElementById('老乡会所').style.display="none";
			document.getElementById('华为俱乐部').style.display="none";
			document.getElementById('瑞芯开发').style.display="none";
			document.getElementById('腾讯俱乐部').style.display="none";
			document.getElementById(value).style.display="block";*/
		
			//alert("yes");
			location.href="../PhpBackstage/Plate_handle_back.php?plate_name="+value;
		
		//location.href="../PhpBackstage/Plate_handle_back.php?plate_name=value";
	}
</script>
</head>
<body>
<?php
	require_once '../PhpBackstage/CheckLogin.php'; 
	$grade=$_SESSION['grade'];
	$username=$_SESSION['username'];
	$whichPlate=$_SESSION['whichPlate'];
	$pic=$_SESSION['pic'];
	//echo $whichPlate;
	
	$plate_name=$_GET['plate_name'];
	
	//echo $plate_name;
	require_once '../PhpBackstage/Sql_handle.php';
	$sql=new SqlTool();
	$sentence_area="select theme,plate_name,auther,title_time,title_id from title where plate_name='".$plate_name."'";
	//echo $sentence_area;
	$res=$sql->dql_handle($sentence_area);
	$rows=mysql_num_rows($res);
	$cols=mysql_num_fields($res);
	
	$ct_shenghuo="select plate_name from plate";//这是是做选项的
	//echo $ct_shenghuo;
	$ress=$sql->dql_handle($ct_shenghuo);
	
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
			<li><a href="PlateHandle.php?plate_name=<?php echo $whichPlate;?>"title="版块帖子"><span>板块帖子</span></a></li>
			<li><a href="UserSpace.php" title="个人空间"><span>个人空间</span></a></li>
			</ul>
		</div>
		<div class="post_message"><a href="PostMessage.php"><span>发帖</span></a></div>
	</div><!-- ########################################## -->
	<div class="div3">
		<div class="theme">
			<span style="float:left;margin-left:45px;margin-right:12px;font-size:15px">版块:</span>
			<?php
				echo "<select onchange=\"cha(this.options[this.options.selectedIndex].value)\">";
				echo "<option value=\"\">请选择</option>";
				for($i=0;$i<$row=mysql_fetch_row($ress);$i++)
				{
					if($row[0]=="")
					{
						continue;
					}
					echo "<option value=\"$row[0]\">$row[0]</option>";
				}
				echo "</select>";
			?>
		</div>
		<div class="message">
		<?php 
			echo "<table style=\"table-layout:fixed;border:1px solid red;font-size:15px;width:1130px;display:block\">";
					echo "<tr>";
					for($i=-1;$i<=$cols;$i++)
					{
						/*$a=mysql_field_name($res_post,$i);
						echo "<td>$a</td>";*/
						switch($i)
						{
							case '-1':
								echo "<td style=\"width:40px;\">序号</td>";
								break;
							case '0':
								echo "<td style=\"width:386px;\">主题</td>";
								break;
							case '1':
								echo "<td style=\"width:73px;\">版块</td>";
								break;
							case '2':
								echo "<td style=\"width:40px;\">作者</td>";
								break;
							case '3':
								echo "<td style=\"width:168px;\">发帖时间</td>";
								break;
							case '4':
								{	
									if($grade=="管理员"||($whichPlate==$plate_name))
									{
										echo "<td style=\"width:100px;\">处理</td>";
										break;
									}
								}
						}
					}
					echo "</tr>";
					for($i=1;$i<=$row=mysql_fetch_row($res);$i++)
					{
						echo "<tr>";
						for($j=-1;$j<$cols;$j++)
						{
							
							if($j==-1)
							{
								echo "<td>$i</td>";
							}
							else if($j!=($cols-1))
							{
								if($j==0)
								{
									echo "<td style=\"overflow:hidden;white-space:nowrap;\">";
									echo "<a href=\"SomeMessage.php?id=$row[4]&page=0&numofpage=0&endnum=0\">$row[$j]</a>";
									echo "</td>";
								}
								else
								{
									echo "<td>$row[$j]</td>";
								}
							}
							else
							{
								if($grade=="管理员"||($grade=="版主"&&$whichPlate==$plate_name))
								{
									echo "<td><a href=\"../PhpBackstage/Self_info_handle.php?post_reply=1&id=$row[$j]\">删除</a>/
									<a href=\"Self_tiezi_change.php?post_reply=1&id=$row[$j]\">修改</a></td>";
								}
							}
						}
						echo "</tr>";
					}
					echo "</table>";
				?>
		</div>
	</div>
</div>
</body>
</html>