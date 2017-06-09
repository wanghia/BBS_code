<html>
<head>
<meta http-equiv="content-type"content="text/html;charset=utf-8"/>
<?php
	class SqlTool
	{
		private $conn;
		private $host="localhost";
		private $user="root";
		private $password="";
		private $db="fd_bbs";
		public function SqlTool()
		{
			$this->conn=mysql_connect($this->host,$this->user,$this->password);
			if(!$this->conn)
			{
				die("连接数据库失败".mysql_error());
			}
			mysql_select_db($this->db,$this->conn);
			mysql_query("set names utf8");
		}
		public function dql_handle($sql)
		{
			$res=mysql_query($sql,$this->conn);
			return $res;
		}
		public function dml_handle($sql)
		{
			$boo=mysql_query($sql,$this->conn);
			if(!$boo)
			{
				echo mysql_error();
				return 0;//失败
			}
			else 
			{
				if(mysql_affected_rows($this->conn)>0)
				{
					return 1;//成功
				}
				else 
				{
					return 2;//没有影响
				}
			}
		}
		public function __destruct()
		{
			mysql_close($this->conn);
		}
		public function affected()
		{
			return mysql_affected_rows($this->conn);
		}
	}
?>
</head>
</html>
