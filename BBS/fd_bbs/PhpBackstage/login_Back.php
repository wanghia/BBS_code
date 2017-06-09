<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
</head>
<?php
	require_once 'Sql_handle.php';
	session_start();
	$username=$_POST['user'];
	$password=$_POST['password'];
	
	//echo $username;
	//echo $password;
	
	$sql=new SqlTool();
	$sentence_sql=("select * from user where name='".$username."' and password='".$password."'");
	//echo $sentence_sql;
	$res=$sql->dql_handle($sentence_sql);

	$rows_num=$sql->affected();
	$cols_num=mysql_num_fields($res);
	$row=mysql_fetch_row($res);
	if (mysql_num_rows ( $res ) == 1) 
	{
		$_SESSION ['username'] = $username;
		$_SESSION ['password'] = $password;
		
		for($i = 0; $i < $cols_num; $i ++) 
		{
			$name = mysql_field_name ( $res, $i );
			switch ($name) {
				case 'name' :
					$_SESSION ['username'] = $row [$i];
					break;
				case 'password' :
					$_SESSION ['password'] = $row [$i];
					break;
				case 'sex' :
					$_SESSION ['sex'] = $row [$i];
					break;
				case 'email' :
					$_SESSION ['email'] = $row [$i];
					break;
				case 'grade' :
					$_SESSION ['grade'] = $row [$i];
					break;
				case 'pic' :
					$_SESSION ['pic'] = $row [$i];
					break;
				case 'useornot' :
					$_SESSION ['useornot'] = $row [$i];
					break;
				case 'whichPlate' :
					$_SESSION ['whichPlate'] = $row [$i];
					break;
			}
		}
		header ( 'Location:../faces/MainPage.php' );
	}
	 else 
	{
		//echo mysql_num_rows ( $res );
		//echo $res;
		echo "<script type=\"text/javascript\"> alert(\"输入有误，请重新登录\"); </script>";
		echo "<script>url=\"../../login/login.php\";window.location.href=url;</script>";
	}
	$_SESSION['s_username']="";
	$_SESSION['s_password']="";
	$_SESSION['s_sex']="";
	$_SESSION['s_email']="";
	$_SESSION['s_grade']="";
	$_SESSION['s_pic']="";
	$_SESSION['s_useornot']="";
	$_SESSION['s_whichPlate']="";
	
	
	
?>
</html>