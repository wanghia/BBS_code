<?php
	$id=$_GET['id'];
	$page=$_GET['page'];
	$next_before=$_GET['next_before'];
	
	$tiao_num=$_GET['tiao_num'];
	
	require_once 'Sql_handle.php';
	$sql =new SqlTool();
	//echo $id;
	$sentence="select * from reply_title where title_id=".$id."";
	//echo $sentence."<br/>";
	$res=$sql->dql_handle($sentence);
	$row_num=mysql_num_rows($res);
	
	//echo $row_num."<br/>";
	$numofpages=floor($row_num/6)+1;
	$endnum=$row_num%6;
	if($endnum==0)
	{
		$numofpages-=1;
	}
	if($numofpages==0)
	{
		$numofpages=1;
	}
	///echo $numofpages."<br/>";
	//echo $endnum."<br/>";
	
	if($next_before==0)
	{
		$page=0;
	}
	else if($next_before==1)
	{
		$page+=6*$tiao_num;
	}
	else if($next_before==2)
	{
		$page-=6;
	}
	//echo $row_num."<br/>";
	//echo $numofpages."<br/>";
	//echo $endnum."<br/>";
	echo "<script>location.href=\"../faces/SomeMessage.php?id=$id&page=$page&numofpages=$numofpages&endnum=$endnum\"</script>";
?>