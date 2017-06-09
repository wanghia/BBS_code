<html>
<head>
<meta http-equiv="content-type"content="text/html;charset=utf-8"/>
<?php
	require_once 'Sql_handle.php';
	$sql=new SqlTool();
	$area=$_POST['area'];
	$new_plate=$_POST['new_plate'];
	if($new_plate=="")
	{
		echo "<script typt=\"text/javascript\"> alert(\"新版块不能为空\");</script>";
		echo "<script typt=\"text/javascript\"> url=\"../faces/CreateDiscussion.php\";window.location.href=url;</script>";
	}
	$sentence1="select * from plate where plate_name='".$new_plate."'";
	$res=$sql->dql_handle($sentence1);
	if(mysql_num_rows($res)!=0)
	{
		echo "<script typt=\"text/javascript\"> alert(\"抱歉，此版块已存在\");</script>";
		echo "<script typt=\"text/javascript\"> url=\"../faces/CreateDiscussion.php\";window.location.href=url;</script>";
	}
	
	$sentence="insert into plate(area_name,plate_name) values ('".$area."','".$new_plate."')";
	$boo=$sql->dml_handle($sentence);
	if($boo==1)
	{
		echo "<script typt=\"text/javascript\"> alert(\"建立成功\");</script>";
		echo "<script typt=\"text/javascript\"> url=\"../faces/CreateDiscussion.php\";window.location.href=url;</script>";
	}
	else 
	{
		echo "<script typt=\"text/javascript\"> alert(\"建立失败\");</script>";
		echo "<script typt=\"text/javascript\"> url=\"../faces/CreateDiscussion.php\";window.location.href=url;</script>";
	}
?>
</head>
</html>