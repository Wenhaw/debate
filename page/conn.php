<?php
		$con = new mysqli("127.0.0.1","root","mdr013418");
		if(!$con){
		    die('Could not connect: '.$con->connect_error);
        }
		$con->select_db("debate");
		$con->query("set names uft8");
?>