<html>
<head>
<meta http-equiv="content-type"content="text/html;charset=utf-8"/>
<?php
	session_start();
	$plate=$_POST['plate'];
	$theme=$_POST['theme'];
	$text=$_POST['text'];
	$username=$_SESSION['username'];
	$useornot=$_SESSION['useornot'];
	if($useornot==1)
	{
		require_once 'Sql_handle.php';
		
		$time=date('Y-m-d H:i:s',mktime(date("H")+8,date("i"),date("s"),date("m"),date("d"),date("Y")));
	
		$sql=new SqlTool();
		$sentence="insert into title(plate_name,auther,theme,content,title_time)
				values ('".$plate."','".$username."','".$theme."','".$text."','".$time."')";
		$boo=$sql->dml_handle($sentence);
		if($boo==1)
		{
			echo "<script typt=\"text/javascript\"> alert(\"发表成功\");</script>";
			echo "<script typt=\"text/javascript\"> url=\"../faces/PostMessage.php\";window.location.href=url;</script>";
		}
		else 
		{
			echo "<script typt=\"text/javascript\"> alert(\"抱歉，发表失败\");</script>";
			echo "<script typt=\"text/javascript\"> url=\"../faces/PostMessage.php\";window.location.href=url;</script>";
		}
	}
	else
	{
		echo "<script typt=\"text/javascript\"> alert(\"抱歉，您的号已经被封，禁止发言\");</script>";
		echo "<script typt=\"text/javascript\"> url=\"../faces/PostMessage.php\";window.location.href=url;</script>";
	}
?>
</head>
</html>