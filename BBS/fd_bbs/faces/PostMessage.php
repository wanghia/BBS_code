<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title>发帖
</title>
<link rel="shortcut icon" type="image/x-ico" href="../icon/1.ico"/>
<link rel="stylesheet" type="text/css" href="css/PostMessage.css"/>
<script type="text/javascript">
	function sub()
	{
		var input1=document.getElementById('form1');
		var input2=document.getElementById('plate');
		var input3=document.getElementById('theme');
		var input4=document.getElementById('text');
		
		if(input2.value=="")
		{
			alert("请选择版块");
			form1.action="../faces/PostMessage.php";
		}
		else if(input3.value=="")
		{
			alert("主题不能为空");
			form1.action="../faces/PostMessage.php";
		}
		else if(input4.value=="")
		{
			alert("内容不能为空");
			form1.action="../faces/PostMessage.php";
		}
		else 
		{
			form1.action="../PhpBackstage/PostMessage_back.php";
		}
	}
</script>
</head>

<body>
<?php
	require_once '../PhpBackstage/CheckLogin.php';
	$username=$_SESSION['username'];
	$pic=$_SESSION['pic'];
	$whichPlate=$_SESSION['whichPlate'];
	require_once '../PhpBackstage/Sql_handle.php';
	
	$sql=new SqlTool();
	$ct_plate="select * from plate";
	$res_plate=$sql->dql_handle($ct_plate);
	$cols=mysql_num_fields($res_plate);
	
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
			<li><a href="UserSpace.php"title="个人空间"><span>个人空间</span></a></li>
			</ul>
		</div>
		<div class="post_message"><a href="PostMessage.php"><span>发帖</span></a></div>
	</div><!-- ########################################## -->
	
	<div class="div3"><!-- 下面发帖部分 -->
		<form onsubmit="sub();" method="post" id="form1">
			<div class="area">
				<span>论坛导航</span>
				<?php 
					echo "<select class=\"navi2\" name=\"plate\" id=\"plate\">";
					echo "<option value=\"\">请选择版块</option>";
					for($i=1;$i<=$row=mysql_fetch_row($res_plate);$i++)
					{
						if($row[1]=="")
						{
							continue;
						}
						echo "<option value='".$row[1]."'>$row[1]</option>";
					}
					echo "</select>";
				?>
			</div>
			<div class="theme">
				<span class="text">主题</span>
				<input type="text" name="theme" class="theme_area" id="theme"/>
				<span ></span>
			</div>
			<div class="text">
				<div class="theme">内容</div>
				<textarea rows="10" cols="170" name="text" class="text_content" id="text"></textarea>	
			</div>
			<div class="submit">
				<button class="tijiao" type="submit">发表</button>
			</div>
		</form>
	</div>
</div>
</body>
</html>

