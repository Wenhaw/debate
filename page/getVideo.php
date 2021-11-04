<?php
        //链接当前用户
        if (!session_id()) session_start();
        $userId = $_SESSION["userId"];
        //本次教训： 在session_start()前不能有任何html元素，例如<?php>前的回车，空格等。
        $themeId = $_GET["themeId"];
        $team = $_GET["team"];//获取当前队伍信息
        $pst = $_GET["pst"];//获取当前位置信息


		//连接数据库
		include_once('conn.php');
		global $con;
        if(!$con){
            die('Could not connect: '.$con->connect_error);
        }


		//存储视频
        if ($_FILES["file"]["error"] > 0)
        {
            echo "错误：" . $_FILES["file"]["error"] . "<br>";
        }
        else
        {
            echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
            echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
            echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
            echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"];
        }
       /* $name = $_FILES["file"]["name"];
        // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
        while (file_exists("../upload/" . $name))
        {
            echo $name . " 文件已经存在。 ";
			$n = 1;
			$name = $n + $name;
			$n++;
        }
		$res = rename($_FILES["file"]["name"],$name);*/
            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
            move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/" . $_FILES["file"]["name"]);
            echo "文件存储在: " . "upload/" . $_FILES["file"]["name"];

		//提取时间
		ini_set('date.timezone','Asia/Tokyo');
		$d_time=date("Y-m-d G:i:s",time());

		//写入数据库
		$video_path= "../upload/" . $_FILES["file"]["name"];//获取视频地址

		$sql="insert into video (user_id, video_path, theme_id ,video_team , video_pst , video_time) values('$userId','$video_path','$themeId','$team','$pst','$d_time')";
		mysqli_query($con,$sql);
		$num=mysqli_affected_rows($con);

		if($num>0){
		  echo "\n视频上传成功！";
		 }else{
			 echo"\n视频上传失败";
		 }
		?>
	</body>
</html>
