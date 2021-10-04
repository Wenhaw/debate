<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
		$con = new mysqli("127.0.0.1","root","mdr013418");
		if(!$con){
		    die('Could not connect: '.$con->connect_error);
        }
		$con->select_db("debate");
		$con->query("set names uft8");
?>
</body>
</html>