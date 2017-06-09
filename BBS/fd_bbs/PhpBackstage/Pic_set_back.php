<?php
	
	$pic=$_GET['pic_tem'];
	session_start();
	
	$user=$_SESSION['username'];
	
	require_once 'Sql_handle.php';
	$sql=new SqlTool();
	
	$sentence="update user set pic='".$pic."' where name='".$user."'";
	
	$b=$sql->dql_handle($sentence);
	if($sql->affected())
	{
		$_SESSION['pic']=$pic;
		//echo "<script type=\"text/javascript\"> alert(\"修改成功\"); </script>";
		echo "<script>url=\"../faces/Pic_set.php?pic_tem=$pic\";window.location.href=url;</script>";
	}
	else if($b==1)
	{
		//echo "<script type=\"text/javascript\"> alert(\"修改失败\"); </script>";
		echo "<script>url=\"../faces/Pic_set.php?pic_tem=$pic\";window.location.href=url;</script>";
	}
	else
	{
		//echo "<script type=\"text/javascript\"> alert(\"修改失败\"); </script>";
		echo "<script>url=\"../faces/Pic_set.php?pic_tem=$pic\";window.location.href=url;</script>";
	}
?>