<?php
if (!session_id()) session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>内网穿透测试</title>
	<link rel="stylesheet" href="../../css/reset.css" />
	<link rel="stylesheet" href="../../css/style.css" />
	<?php
    include_once('../conn.php');
    global $con;
    if(!$con){
        die('Could not connect: '.$con->connect_error);
	}
	$userId = $_SESSION["userId"];
  $themeId = $_GET["themeId"];//获取当前主题id
	?>
</head>
<body style="background-image:radial-gradient(circle at 20% 20%, #99CCCC, #7171B7);">

<!--top navigation bar-->
<div class="TNgvt_bar">
	<div class="main_bar_size">
		<!--左侧文字-->
		<div class="TNgvt_bar_w">
			<div class="in"><a href="../index.php"><img src="../../img/little TV white.png" class="in_i"/><p>ホーム</p></a></div>
			<ul>
				<a href="#"><li>探索</li></a>
				<a href="#"><li>登録チャンネル</li></a>
				<!--<a href="#"><li>游戏中心</li></a>
                <a href="#"><li>直播</li></a>
                <a href="#"><li>会员购</li></a>
                <a href="#"><li>漫画</li></a>-->
				<a href="#"><li>APPをダンロード</li></a>
			</ul>
			<!--            <div class="download"><a href="#"><img src="../img/phone white.png" class="dl_i" /><p>下载APP</p></a> <img src="img/download app.png" class="alert_dl_i"/></div>-->
		</div>

		<!--右侧登录等信息-->
		<div class="TNgvt_bar_l">
			<!--头像部分-->
			<div class="head">
				<?php
						$sql = "select * from user where user_id = '$userId' ";
						$result = mysqli_query($con,$sql);
                        //$num = mysqli_num_rows($result);
						$row = mysqli_fetch_array($result);
						if($row[4])
						echo "<img src=../../".$row[4]." class='head_img'/>";
				else
				echo "<img src='../../img/head.jpg' class='head_img'/>";
				?>


				<!--弹出登录界面-->
				<?php if(!$row)
						{  //如果未登录，弹出：
						?>
				<div class="alert_login">
					ログインしてできること：
					<!--弹幕动画部分-->
					<div class="a_l_img">
						<div id="demo">
							<div id="indemo">
								<div id="demo1">
									<img src="../../img/danmu.png" border="0" />
									<img src="../../img/danmu.png" border="0" />
									<img src="../../img/danmu.png" border="0" />
								</div>
								<div id="demo2"></div>
							</div>
						</div>
						<script>
							var speed=10; //数字越大速度越慢
							var tab=document.getElementById("demo");
							var tab1=document.getElementById("demo1");
							var tab2=document.getElementById("demo2");
							tab2.innerHTML=tab1.innerHTML;
							function Marquee(){
								if(tab2.offsetWidth-tab.scrollLeft<=0)
									tab.scrollLeft-=tab1.offsetWidth
								else{
									tab.scrollLeft++;
								}
							}
							var MyMar=setInterval(Marquee,speed);
							tab.onmouseover=function() {clearInterval(MyMar)};
							tab.onmouseout=function() {MyMar=setInterval(Marquee,speed)};
						</script>
					</div>
					<a href="../login.php" ><div class="btn_login">
						<p>ログイン</p>
					</div></a>
					<div class="register">初めて?<a href="../register.php">こちらで登録</a></div>
				</div>
				<?php }
						else { //如果登录，弹出：
						?>
				<div class="alert_login">
					いらっしゃい：<?php echo $row[2]; ?>
					<!--弹幕动画部分-->
					<div class="a_l_img">
						<div id="demo">
							<div id="indemo">
								<div id="demo1">
									<img src="../../img/danmu.png" border="0" />
									<img src="../../img/danmu.png" border="0" />
									<img src="../../img/danmu.png" border="0" />
								</div>
								<div id="demo2"></div>
							</div>
						</div>
						<script>
							var speed=10; //数字越大速度越慢
							var tab=document.getElementById("demo");
							var tab1=document.getElementById("demo1");
							var tab2=document.getElementById("demo2");
							tab2.innerHTML=tab1.innerHTML;
							function Marquee(){
								if(tab2.offsetWidth-tab.scrollLeft<=0)
									tab.scrollLeft-=tab1.offsetWidth
								else{
									tab.scrollLeft++;
								}
							}
							var MyMar=setInterval(Marquee,speed);
							tab.onmouseover=function() {clearInterval(MyMar)};
							tab.onmouseout=function() {MyMar=setInterval(Marquee,speed)};
						</script>
					</div>
					<a href="../logout.php" ><div class="btn_login">
						<p>ログアウト</p>
					</div></a>
					<div class="register"><a href="../edit.php">プライバシー</a></div>
				</div>
				<?php
						}
							?>

			</div>

			<!--历史部分-->

			<div class="history"><a href="#"><div class="htr_c">歴史</div></a></div>

			<!--投稿部分-->
			<div class="upload">
				<a href="../themeUp.php"><div class="ul_c">投稿</div></a>
			</div>

		</div>
	</div>
</div>

<!--主题主体部分-->
<div class="main_chat_body">
	<div class="container">
		<div class="main_chat_Theme">
			<span >内网穿透测试</span>
		</div>
		<div class="main_chat_room">
			<div class="main_chat_video_B">
				<a href="../video.php?team=1&pst=1&themeId=<?php echo $themeId; ?>" style="display:block;" id="js-streamA-11" class="main_chat_video_BC" ></a>
				<video id="js-streamV-11" class="main_chat_video_BC" controls="controls" style="display:none;"></video>
				<a href="../video.php?team=1&pst=2&themeId=<?php echo $themeId; ?>" style="display:block;" id="js-streamA-12" class="main_chat_video_BC" ></a>
				<video id="js-streamV-12" class="main_chat_video_BC" controls="controls" style="display:none;"></video>
				<a href="../video.php?team=1&pst=3&themeId=<?php echo $themeId; ?>" style="display:block;" id="js-streamA-13" class="main_chat_video_BC" ></a>
				<video id="js-streamV-13" class="main_chat_video_BC" controls="controls" style="display:none;"></video>
				<a href="../video.php?team=1&pst=4&themeId=<?php echo $themeId; ?>" style="display:block;" id="js-streamA-14" class="main_chat_video_BC" ></a>
				<video id="js-streamV-14" class="main_chat_video_BC" controls="controls" style="display:none;"></video>
			</div>
			<div class="main_chat_video_R">
				<a href="../video.php?team=0&pst=1&themeId=<?php echo $themeId; ?>" style="display:block;" id="js-streamA-01" class="main_chat_video_RC" ></a>
				<video id="js-streamV-01" class="main_chat_video_RC" controls="controls" style="display:none;"></video>
				<a href="../video.php?team=0&pst=2&themeId=<?php echo $themeId; ?>" style="display:block;" id="js-streamA-02" class="main_chat_video_RC" ></a>
				<video id="js-streamV-02" class="main_chat_video_RC" controls="controls" style="display:none;"></video>
				<a href="../video.php?team=0&pst=3&themeId=<?php echo $themeId; ?>" style="display:block;" id="js-streamA-03" class="main_chat_video_RC" ></a>
				<video id="js-streamV-03" class="main_chat_video_RC" controls="controls" style="display:none;"></video>
				<a href="../video.php?team=0&pst=4&themeId=<?php echo $themeId; ?>" style="display:block;" id="js-streamA-04" class="main_chat_video_RC" ></a>
				<video id="js-streamV-04" class="main_chat_video_RC" controls="controls" style="display:none;"></video>
			</div>
		</div>
		<?php //要一个for循环
		$sql = "SELECT * FROM video WHERE theme_id = '$themeId'";
		$result = mysqli_query($con,$sql);
		$num = mysqli_num_rows($result);
		if($num>0){
					while($row_t = mysqli_fetch_array($result) ){
				?>
				<script>
						var team = "<?php echo $row_t[4]; ?>";
						var pst = "<?php echo $row_t[5]; ?>";
						var video_path = "../<?php echo $row_t[2]; ?>"
						document.getElementById('js-streamA-'+team+''+pst).style.display = "none";
						document.getElementById('js-streamV-'+team+''+pst).style.display = "block";
						document.getElementById('js-streamV-'+team+''+pst).setAttribute("src", video_path);
				</script>
				<?php
			}
		}
		?>
		<div>
		</div>
	</div>
</div>
</body>

</html>
