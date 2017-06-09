<html>
<head>
<meta http-equiv="content-type"content="text/html;charset=utf-8"/>
<?php
session_start();
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/png")))
 {
 	if($_FILES["file"]["size"] < 40000000)
 	{
		  if ($_FILES["file"]["error"] > 0)
		   {
		    	//echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
		    	//echo "<script typt=\"text/javascript\"> alert(\".$_FILES\[\"file\"][\"error\"].\"); </script>";
		    	echo "<script typt=\"text/javascript\"> url=\"../faces/ChangeInfo.php\";window.location.href=url;</script>";
		   }
		  else
	  	  {
			   // echo "Upload: " . $_FILES["file"]["name"] . "<br />";
			   // echo "Type: " . $_FILES["file"]["type"] . "<br />";
			    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
			   // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
			    if (file_exists("../imges/" . $_FILES["file"]["name"]))
			     {
				      //echo $_FILES["file"]["name"] . " already exists. ";
				      echo "<script typt=\"text/javascript\"> alert(\"上传失败，图片已存在\");</script>";
				      echo "<script typt=\"text/javascript\"> url=\"../faces/ChangeInfo.php\";window.location.href=url;</script>";
			     }
			    else
			    {
				      move_uploaded_file($_FILES["file"]["tmp_name"],
				      "../imges/" . $_FILES["file"]["name"]);
				      //echo "Stored in: " . "../imges/" . $_FILES["file"]["name"];
				      $pic="../imges/" . $_FILES["file"]["name"];
				      
				      require_once 'Sql_handle.php';
				      $sql=new SqlTool();
				      $username=$_SESSION['username'];
				      $ct="update user set pic='".$pic."' where name='".$username."'";
				      $inser_pic="insert into Pic(pic_name) values ('".$pic."')";
				      //echo $inser_pic;
				     // echo "<br/>".$ct."<br/>";
				      $bo=$sql->dql_handle($ct);
				      $sql->dml_handle($inser_pic);
				      
				      if($sql->affected())
				      {
					      	$_SESSION['pic']=$pic;
					      //	echo $pic;
					      	//echo "<script type=\"text/javascript\"> alert(\"修改成功\"); </script>";
					      	echo "<script>url=\"../faces/ChangeInfo.php\";window.location.href=url;</script>";
				      }
				      else if($bo==1)
				      {
					      	echo "<script type=\"text/javascript\"> alert(\"修改失败\"); </script>";
					      	echo "<script>url=\"../faces/ChangeInfo.php\";window.location.href=url;</script>";
				      }
			 	      else
				      {
					      	echo "<script type=\"text/javascript\"> alert(\"修改失败\"); </script>";
					        echo "<script>url=\"../faces/ChangeInfo.php\";window.location.href=url;</script>";
				      }
				      //echo $_SESSION['pic'];
				      echo "<script typt=\"text/javascript\"> alert(\"上传成功\");</script>";
				      echo "<script typt=\"text/javascript\"> url=\"../faces/ChangeInfo.php\";window.location.href=url;</script>";
		     	  }
			 }
 	}
 	else 
 	{
 		echo "<script typt=\"text/javascript\"> alert(\"上传失败，文件不能大于2M\");</script>";
 		echo "<script typt=\"text/javascript\"> url=\"../faces/ChangeInfo.php\";window.location.href=url;</script>";
 	}
}
else
{
  	echo "<script typt=\"text/javascript\"> alert(\"上传失败，不合法的文件\");</script>";
  	echo "<script typt=\"text/javascript\"> url=\"../faces/ChangeInfo.php\";window.location.href=url;</script>";
}
 
?>
</head>
</html>