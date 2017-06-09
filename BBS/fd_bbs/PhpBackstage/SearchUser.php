<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
</head>

<?php
	session_start();
	require_once 'Sql_handle.php';
	$sql=new SqlTool();
	
	$username=$_POST['username'];
	$delete_or_change=$_POST['delete_or_change'];
	//echo $delete_or_change;
	if($delete_or_change=="Delete")
	{
		//echo "<script type=\"text/html\"> alert(\"开始有句子了\")</script>";
		$sen="delete from user where name='".$username."'";
		//echo $sen;
		$boo=$sql->dml_handle($sen);
		if($boo==1)
		{
			echo "<script typt=\"text/javascript\"> alert(\"删除成功\");</script>";
			echo "<script typt=\"text/javascript\"> url=\"../faces/ChangeInfo_manager.php\";window.location.href=url;</script>";
		}
		else
		{
			echo "<script typt=\"text/javascript\"> alert(\"删除失败\");</script>";
			echo "<script typt=\"text/javascript\"> url=\"../faces/ChangeInfo_manager.php\";window.location.href=url;</script>";
		}
	}
	
	$sentence="select * from user where name='".$username."'";
	$res=$sql->dql_handle($sentence);
	$cols_num=mysql_num_fields($res);
	$row=mysql_fetch_row($res);
	if(mysql_num_rows($res)==0)
	{
		echo "<script typt=\"text/javascript\"> alert(\"用户名不存在\");</script>";
		echo "<script typt=\"text/javascript\"> url=\"../faces/ChangeInfo_manager.php\";window.location.href=url;</script>";
	}
	for($i = 0; $i < $cols_num; $i++)
	{
		$name = mysql_field_name ( $res, $i );
		switch ($name) {
			case 'name' :
				$_SESSION ['s_username'] = $row [$i];
				break;
			case 'password' :
				$_SESSION ['s_password'] = $row [$i];
				break;
			case 'sex' :
				$_SESSION ['s_sex'] = $row [$i];
				break;
			case 'email' :
				$_SESSION ['s_email'] = $row [$i];
				break;
			case 'grade' :
				$_SESSION ['s_grade'] = $row [$i];
				break;
			case 'pic' :
				$_SESSION ['s_pic'] = $row [$i];
				break;
			case 'useornot' :
				$_SESSION ['s_useornot'] = $row [$i];
				break;
			case 'whichPlate' :
				$_SESSION ['s_whichPlate'] = $row [$i];
				break;
		}
	}
	//echo "<script typt=\"text/javascript\"> alert(\"查找成功\");</script>";
	echo "<script typt=\"text/javascript\"> url=\"../faces/ChangeInfo_manager.php\";window.location.href=url;</script>";
?>
</html>