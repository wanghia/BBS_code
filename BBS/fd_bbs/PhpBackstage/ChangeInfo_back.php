<html>
<head>
<meta http-equiv="content-type"content="text/html;charset=utf-8"/>
<?php
	session_start();
	require_once 'Sql_handle.php';
	$sql=new SqlTool();
	
	$username=$_SESSION['username'];
	$oldpassword=$_SESSION['password'];
	$password=$_POST['oldpassword'];
	if($oldpassword!=$password)
	{
		echo "<script type=\"text/javascript\"> alert(\"密码输入错误\"); </script>";
		echo "<script>url=\"../faces/ChangeInfo.php\";window.location.href=url;</script>";
	}
	
	$newpassword=$_POST['newpassword'];
	$sex=$_POST['sex'];
	$email=$_POST['email'];
	$sentence="update user set password='".$newpassword."',sex='".$sex."',email='".$email."' where name='".$username."'";
	
	$b=$sql->dql_handle($sentence);
	
	if($sql->affected())
	{
		$_SESSION['password']=$newpassword;
		echo "<script type=\"text/javascript\"> alert(\"修改成功\"); </script>";
		echo "<script>url=\"../faces/UserSpace.php\";window.location.href=url;</script>";
	}
	else if($b==1)
	{
		echo "<script type=\"text/javascript\"> alert(\"修改失败了哈哈\"); </script>";
		echo "<script>url=\"../faces/ChangeInfo.php\";window.location.href=url;</script>";
	}
	else
	{
		echo "<script type=\"text/javascript\"> alert(\"修改失败\"); </script>";
		echo "<script>url=\"../faces/ChangeInfo.php\";window.location.href=url;</script>";
	}
?>
</head>
</html>