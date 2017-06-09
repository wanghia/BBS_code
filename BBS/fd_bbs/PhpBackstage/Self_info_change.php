<html>
<head>
<meta http-equiv="content-type"content="text/html;charset=utf-8"/>
<?php
	$id=$_GET['id'];
	$text=$_POST['text'];
	$post_reply=$_GET['post_reply'];
	require_once 'Sql_handle.php';
	$sql=new SqlTool();
	
	if($post_reply==1)//这是发表的
	{
		$centence1="update title set content='".$text."' where title_id='".$id."'";
	}
	else//这是回复的
	{
		$centence1="update reply_title set reply_content='".$text."' where reply_id='".$id."'";
	}
	$b=$sql->dql_handle($centence1);
	echo $b;
	if($sql->affected())
	{
		echo "<script type=\"text/javascript\"> alert(\"修改成功\"); </script>";
		echo "<script>url=\"../faces/UserSpace.php\";window.location.href=url;</script>";
	}
	else if($b==1)
	{
		echo "<script type=\"text/javascript\"> alert(\"没有修改\"); </script>";
		echo "<script>url=\"../faces/UserSpace.php\";window.location.href=url;</script>";
	}
	else
	{
		echo "<script type=\"text/javascript\"> alert(\"修改失败\"); </script>";
		echo "<script>url=\"../faces/UserSpace.php\";window.location.href=url;</script>";
	}
?>
</head>
</html>