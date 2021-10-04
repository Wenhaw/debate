<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DebateLink Register</title>
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/style.css" />
</head>
<body>
<!--top navigation bar-->
<div class="TNgvt_bar">
    <div class="main_bar_size">
        <!--左侧文字-->
        <div class="TNgvt_bar_w">
            <div class="in"><a href="index.php"><img src="../img/little TV white.png" class="in_i"/><p>ホーム</p></a></div>
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
                <img src="../img/head.jpg" class="head_img"/>
                <div class="alert_login">
                    ログインしてできること：
                    <!--弹幕动画部分-->
                    <div class="a_l_img">
                        <div id="demo">
                            <div id="indemo">
                                <div id="demo1">
                                    <img src="../img/danmu.png" border="0" />
                                    <img src="../img/danmu.png" border="0" />
                                    <img src="../img/danmu.png" border="0" />
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
                    <a href="login.php" ><div class="btn_login">
                        <p>ログイン</p>
                    </div></a>
                    <div class="register">初めて?<a href="register.php">こちらで登録</a></div>
                </div>
            </div>

            <!--历史部分-->

            <div class="history"><a href="#"><div class="htr_c">歴史</div></a></div>

            <!--投稿部分-->
            <div class="upload">
                <a href="up_video.php"><div class="ul_c">投稿</div></a>
            </div>

        </div>
    </div>
</div>
<!--<div class="banner_img"> </div>-->

<!--******mainBody******-->
<div class="rgt_mainBody">

    <div class="login_text">登録</div>
    <!--分割线*2-->
    <div class="rgt_line1"></div>
    <div class="rgt_line2"></div>

    <!--表单-->
    <form class="rgt_form" method="post" id="register" name="register" action="register2.php" enctype="multipart/form-data">
        <ul>
            <li><input type="text" name="userName" class="" placeholder="名前" /></li>
            <li><input type="password" name="userPassword" class="" placeholder="パスワード" /></li>
            <li>
                <select class="slc_country" name="useAddress">
                    <option value="日本">日本</option>
<!--                    <option value="中国香港">中国香港</option>-->
<!--                    <option value="中国台湾">中国台湾</option>-->
                    <option value="中国">中国</option>
                    <option value="アメリカ">アメリカ</option>
                </select>
                <input type="email" name="userEmail" class="in_phone_nub" placeholder="メールアドレス" />
            </li>
<!--            <a href="#" style="float: right;margin-top: 10px;">用邮箱登录></a>-->
            <li class="yzm">
                <a href="#" >icon(.jpg)</a>
                <input type="file" name="userIcon" id="userIcon" value="" />
            </li>
            <div class="xieyi">
                <input type="checkbox" name="I_agree" class="I_agree" value="1"/>
                <div >I agree<a href="#"> protocol</a> &<a href="#"> specification</a></div>
            </div>
            <li>
                <input type="submit" name="rgt_sbm" class="rgt_sbm" value="登録"/>
            </li>
            <a href="login.php" style="float: right; margin-top: 10px;">すでにアカウントをお持ちですか？ ここをクリックしてログイン></a>
        </ul>
    </form>

</div>
</body>
</html>