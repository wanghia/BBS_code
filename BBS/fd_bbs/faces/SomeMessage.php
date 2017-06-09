<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title>帖子
</title>
<link rel="shortcut icon" type="image/x-ico" href="../icon/1.ico"/>
<link rel="stylesheet" type="text/css" href="css/SomeMessage.css"/>

<?php
	require_once '../PhpBackstage/CheckLogin.php';
	require_once '../PhpBackstage/Sql_handle.php';
	
	$whichPlate=$_SESSION['whichPlate'];
	$username=$_SESSION['username'];
	$pic=$_SESSION['pic'];
	
	$sql=new SqlTool();
	
	$id=$_GET['id'];
	$page=$_GET['page'];
	//echo $page."<br/>";
	//echo $id;
	$centence="select auther,theme,content,title_time,grade,whichPlate,pic from title,user where name=auther and title_id='".$id."'";
	$ct_huitie="select reply_people,grade,whichPlate,reply_time,reply_content,reply_id from title,user,
			reply_title where title.title_id=reply_title.title_id and reply_title.title_id=".$id." and reply_people=name order by reply_time asc limit ".$page.",6";
	$ct_pic="select pic from user,title where user.name=title.auther and title_id='".$id."'";
	$res_pic=$sql->dql_handle($ct_pic);
	
	$res=$sql->dql_handle($centence);
	//echo $ct_huitie."<br/>";
	$res_huitie=$sql->dql_handle($ct_huitie);
	
	$cols=mysql_num_fields($res);
	$cols_huitie=mysql_num_fields($res_huitie);
	
	$row_louzhu=mysql_fetch_row($res);
	
	$of_title="select title_id from title where auther='".$username."'";
	$of_replytitle="select reply_id from reply_title where reply_people='".$username."'";
	
	$res_numof_title=$sql->dql_handle($of_title);
	$res_numof_replytitle=$sql->dql_handle($of_replytitle);
	
	$numof_title=mysql_num_rows($res_numof_title);
	$numof_replytitle=mysql_num_rows($res_numof_replytitle);
	
?>
<script type="text/javascript">
/*function sub(str)
	{
		if(str==0)
		{
			document.getElementById('louzhu').style.display="none";
		}
		else
		{
			document.getElementById('louzhu').style.display="block";
		}
	}*/
	function subform()
	{
		var input1=document.getElementById('form1');
		var input2=document.getElementById('text_reply');
		if(input2.value=="")
		{
			alert("回复不能为空");
		}
		else
		{
			form1.action="../PhpBackstage/Reply_title.php?id=<?php echo $id;?>";
		}
	}
</script>
</head>
<body>
<?php
	$numofpages=$_GET['numofpages'];
	$endnum=$_GET['endnum'];
	if($numofpages==0)
	{
		echo "<script>location.href=\"../PhpBackstage/FenYe.php?id=$id&page=$page&next_before=-1&tiao_num=0\"</script>";
	}
	//echo $numofpages."<br/>";
	//echo $endnum;
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
			<li><a href="PlateHandle.php?plate_name=<?php echo $whichPlate;?>" title="版块帖子"><span>板块帖子</span></a></li>
			<li><a href="UserSpace.php" title="个人空间"><span>个人空间</span></a></li>
			</ul>
		</div>
		<div class="post_message"><a href="PostMessage.php"><span>发帖</span></a></div>
	</div>
	<div class="div3">
		<div class="title"><!-- 这一块用于帖子跟回帖的显示 -->
			<div style="width:100%;height:400px;margin-top:10px;display:block" class="louzhu" id="louzhu" ><!-- 这一块用于楼主的帖子的显示 -->
				<div class="left">
					<div class="pic"><!-- 放照片 -->
					<?php
						$row_pic=mysql_fetch_row($res_pic);
						if($row_pic[0]=="no")
						{
							echo "<img src=\"../imges/1.jpg\" style=\"width:100%;height:100%\"/>";
						}
						else
						{
							//echo $row_pic[0];
							echo "<img src=\"$row_pic[0]\"style=\"width:100%;height:100%\"/>";
						} 
					?>
					</div>
					<div class="grade"><!-- 放等级 -->
						<?php
							echo "<div>名字：$row_louzhu[0]</div>";
							echo "<div>级别：$row_louzhu[4]</div>";
							if($row_louzhu[4]=="版主") 
							{
								echo "<div class=\"chenghao\" >版块：<span>" .$row_louzhu[5]."</span></div>";
							}
						?>
					</div>
				</div>
				<div class="right">
					<div class="theme"><!-- 主题的显示 -->
						<span style="font-weight:bold;font-size:17px;">主题：</span>
						<span><?php echo "$row_louzhu[1]";?></span>
					</div>
					<div class="louceng">
						<span style="width:300px;float:left"><span style="font-weight:bold">发表时间:　</span><?php echo "$row_louzhu[3]";?></span><!-- 发表时间 -->
						<span style="width:60px;float:right;">楼主</span><!-- 楼层 -->
					</div>
					<div class="content">
					<?php echo "$row_louzhu[2]";?>
					</div>
				</div>
			</div>
			<?php
				if($page!=0)
				{
					echo "<script type=\"text/javascript\"> document.getElementById('louzhu').style.display=\"none\";</script>";
				} 
				
				for($i=$page+1;($i-$page)<=$row_huitie=mysql_fetch_row($res_huitie);$i++)
				{
					echo "<div class=\"huitie\"><!-- 这一块用于回帖的显示 -->";
						echo "<div class=\"left\">";
							echo "<div class=\"pic\"><!-- 放照片 -->";
							
							$ct_pic="select pic from user,reply_title where user.name=reply_title.reply_people and reply_id='".$row_huitie[5]."'";
							$res_pic=$sql->dql_handle($ct_pic);
							//echo $ct_pic;
							$row_pic=mysql_fetch_row($res_pic);
							//echo $row_pic[0];
							if($row_pic[0]=="no")
							{
								echo "<img src=\"../imges/1.jpg\" style=\"width:100%;height:100%\"/>";
							}
							else
							{
								//echo $row_pic[0];
								echo "<img src=\"$row_pic[0]\"style=\"width:100%;height:100%\"/>";
							} 
							echo "</div>";
							echo "<div class=\"grade\"><!-- 放等级 -->";
								echo "<div>名字：$row_huitie[0]</div>";
								echo "<div>级别：$row_huitie[1]</div>";
								if($row_huitie[1]=="版主")
								{
									echo "<div class=\"chenghao\" >版块：<span>" .$row_huitie[2]."</span></div>";
								}
							echo "</div>";
						echo "</div>";
						echo "<div class=\"right\">";
							echo "<div class=\"louceng\">";
								echo "<span style=\"width:300px;float:left\">";
									echo "<span style=\"font-weight:bold\">发表时间：$row_huitie[3]</span><!-- 发表时间 --></span>";
									echo "<span style=\"width:60px;float:right;\">第<span>$i</span>楼</span><!-- 楼层 -->";
							echo "</div>";
							echo "<div class=\"content\">$row_huitie[4]</div>";
						echo "</div>";
					echo "</div>";
				}
			?>
		</div>
		<div style="width:100%;height:30px;border:1px solid #AFAFAF"><!-- 表示分页的页数 -->
			<span style="float:right;margin-right: 45px;">
				<span>
					<a href="../PhpBackstage/FenYe.php?next_before=0&id=<?php echo $id;?>&page=<?php echo $page;?>&numofpages=0&endnum=0">首页</a>
					<?php
						if($page!=0)
						{	
							echo "<a href=\"../PhpBackstage/FenYe.php?next_before=2&id=$id&page=$page&tiao_num=0;\">&lt;上一页&gt;</a>";
						}
						else
						{
							echo "<span>&lt;上一页&gt;</span>";
						}
					?>
					<?php
						for($i=1;$i<=$numofpages;$i++)
						{
							$tiao_num=($i-(floor($page/6)+1));
							echo "<a href=\"../PhpBackstage/FenYe.php?next_before=1&id=$id&page=$page&tiao_num=$tiao_num\">$i</a> ";
						}
					
						if($endnum==0||(floor($page/6)+1==$numofpages))
						{
							echo "<span>&lt;下一页&gt;</span>";
						}
						else
						{
							echo "<a  href=\"../PhpBackstage/FenYe.php?next_before=1&id=$id&page=$page&tiao_num=1;\">&lt;下一页&gt;</a>";
						}
					?>
				</span>
			</span> 
		</div>
		<div class="reply"><!-- 这一块用于回复的框的显示 -->
			<div class="left">
				<div class="pic">
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
				</div>
			</div>
			<div class="right">
				<form action="#" method="post" onsubmit="subform()" id="form1">
					<div class="reply_content">
						<textarea rows="6" cols="145" name="text_reply" style="margin-left:7px;margin-top:6px;resize:none" id="text_reply"></textarea>	
					</div>
					<div class="reply_ok">
						<button type="submit" style="height:34px;">发表回复</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>
