<html>
<head>
<meta http-equiv="content-type"content="text/html;charset=utf-8"/>
<?php
	$plate_name=$_GET['plate_name'];
	echo $plate_name; 
	echo "<script>location.href=\"../faces/PlateHandle.php?plate_name=$plate_name\"</script>";
?>
</head>
</html>