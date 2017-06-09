<html>
<head>
<meta http-equiv="content-type"content="text/html;charset=utf-8"/>
<?php
	session_start();
	require_once 'Sql_handle.php';
	$sql=new SqlTool();
	
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sex=$_POST['sex'];
	$email=$_POST['email'];
	$grade=$_POST['grade'];
	$whichPlate=$_POST['whichPlate'];
	$useornot=$_POST['useornot'];
	if($grade!="版主")
	{
		$whichPlate="";
	}
	
	$sentence="update user set name='".$username."',password='".$password."',
			sex='".$sex."',email='".$email."',grade='".$grade."',whichPlate='".$whichPlate."',useornot='".$useornot."'
					where name='".$username."'";
	$b=$sql->dql_handle($sentence);

	if($sql->affected())
	{
		echo "<script type=\"text/javascript\"> alert(\"修改成功\"); </script>";
		echo "<script>url=\"../faces/ChangeInfo_manager.php\";window.location.href=url;</script>";
	}
	else if($b==1)
	{
		echo "<script type=\"text/javascript\"> alert(\"没有修改\"); </script>";
		echo "<script>url=\"../faces/ChangeInfo_manager.php\";window.location.href=url;</script>";
	}
	else
	{
		echo "<script type=\"text/javascript\"> alert(\"修改失败\"); </script>";
		echo "<script>url=\"../faces/ChangeInfo_manager.php\";window.location.href=url;</script>";
	}
?>
</head>
</html>