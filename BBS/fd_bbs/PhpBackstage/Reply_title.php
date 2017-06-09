<html>
<head>
<meta http-equiv="content-type"content="text/html;charset=utf-8"/>
<?php
	session_start();
	$text_content=$_POST['text_reply'];
	$id=$_GET['id'];
	
	$time=date('Y-m-d H:i:s',mktime(date("H")+8,date("i"),date("s"),date("m"),date("d"),date("Y")));
	$username=$_SESSION['username'];
	
	require_once 'Sql_handle.php';
	$sql=new SqlTool();
	
	$centence="insert into reply_title(title_id,reply_time,reply_content,reply_people) 
			value('".$id."','".$time."','".$text_content."','".$username."')";
	//echo $id;
	//echo $text_content;
	$boo=$sql->dml_handle($centence);
	if($boo==1)
	{
		//echo "<script typt=\"text/javascript\"> alert(\"回复成功\");</script>";
		echo "<script typt=\"text/javascript\"> url=\"../faces/SomeMessage.php?id=$id&page=0&numofpages=0&endnum=0\";window.location.href=url;</script>";
	}
	else 
	{
		echo "<script typt=\"text/javascript\"> alert(\"抱歉，回复失败\");</script>";
		echo "<script typt=\"text/javascript\"> url=\"../faces/SomeMessage.php?id=$id&page=0&numofpages=0&endnum=0\";window.location.href=url;</script>";
	}
?>
</head>
</html>