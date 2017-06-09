<html>
<head>
<meta http-equiv="content-type"content="text/html;charset=utf-8"/>
<?php
	require_once 'Sql_handle.php';
	$sql=new SqlTool();
	
	$id=$_GET['id'];
	$post_reply=$_GET['post_reply'];
	if($post_reply==1)//这是发表的
	{
		$centence1="delete from title where title_id=".$id."";
	}
	else//这是回复的
	{
		$centence1="delete from reply_title where reply_id=".$id."";
		echo $centence1;
	}
	$boo=$sql->dml_handle($centence1);
	if($boo==1)
	{
		//echo "<script type=\"text/javascript\"> alert(\"删除成功\"); </script> ";
		echo "<script>url=\"../faces/UserSpace.php\";window.location.href=url;</script>";
	}
	else
	{
		echo "<script type=\"text/javascript\"> alert(\"删除失败\"); </script> ";
		echo "<script>url=\"../faces/UserSpace.php\";window.location.href=url;</script>";
	}
?>
</head>
</html>