<?php
if (!session_id()) session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>时间自动登录测试</title>
	<link rel="stylesheet" href="../../css/reset.css" />
	<link rel="stylesheet" href="../../css/style.css" />
	<?php
    include_once('../conn.php');
    global $con;
    if(!$con){
        die('Could not connect: '.$con->connect_error);
	}
	$userId = $_SESSION["userId"];
	?>
</head>
<body style="background-image:radial-gradient(circle at 20% 20%, #99CCCC, #7171B7);">

<!--top navigation bar-->
<div class="TNgvt_bar">
	<div class="main_bar_size">
		<!--左侧文字-->
		<div class="TNgvt_bar_w">
			<div class="in"><a href="index.php"><img src="../../img/little TV white.png" class="in_i"/><p>ホーム</p></a></div>
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
                        $num = mysqli_num_rows($result);
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
				<a href="../video.php"><div class="ul_c">投稿</div></a>
			</div>

		</div>
	</div>
</div>
<div class="main_chat_body">
	<div class="container">
		<div class="main_chat_Theme">
			<span >时间自动登录测试</span>
		</div>
		<div class="main_chat_room">
			<div class="main_chat_video_R">
				<video src="#" controls="controls" id="js-stream-red1" class="main_chat_video_RC" ></video>
				<video id="js-stream-red2" class="main_chat_video_RC" ></video>
				<video id="js-stream-red3" class="main_chat_video_RC" ></video>
				<video id="js-stream-red4" class="main_chat_video_RC" ></video>
			</div>
			<div class="main_chat_video_B">
				<video id="js-stream-blue1" class="main_chat_video_BC"></video>
				<video id="js-stream-blue2" class="main_chat_video_BC"></video>
				<video id="js-stream-blue3" class="main_chat_video_BC"></video>
				<video id="js-stream-blue4" class="main_chat_video_BC"></video>
			</div>
		</div>
		<div>
		</div>
	</div>
</div>
</body>

</html>
