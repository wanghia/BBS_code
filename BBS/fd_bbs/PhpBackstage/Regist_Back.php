<html>
<head>
<meta http-equiv="content-type"content="text/html;charset=utf-8"/>

<?php
	require_once 'Sql_handle.php';
	$sql=new SqlTool();
	
	$username=$_POST['username'];
	$centence1="select * from user where name='".$username."'";
	$res=$sql->dql_handle($centence1);
	if(mysql_num_rows($res)==1)
	{
		echo "<script type=\"text/javascript\"> alert(\"该用户名已存在\"); </script>";
		echo "<script>url=\"../faces/RegistPage.php\";window.location.href=url;</script>";
	}
	$password=$_POST['password'];
	$sex=$_POST['sex'];
	$email=$_POST['email'];
	$grade="民工";
	$pic="no";
	$useornot=1;
	$whichPlate="";
	$sql_centence="insert into user(name,password,sex,email,grade,pic,useornot,whichPlate) values 
			('".$username."','".$password."','".$sex."','".$email."','".$grade."','".$pic."','".$useornot."','".$whichPlate."')";
	$boo=$sql->dml_handle($sql_centence);
	if($boo==1)
	{
		echo "<script type=\"text/javascript\"> alert(\"注册成功，请登录\"); </script>";
		echo "<script>url=\"../../login/login.php\";window.location.href=url;</script>";
	}
	else 
	{
		echo "<script type=\"text/javascript\"> alert(\"注册失败\"); </script>";
		echo "<script>url=\"../../login/login.php\";window.location.href=url;</script>";
	}
?>
</head>
</html>