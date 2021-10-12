<?php
header("content-type:text/html;charset=utf-8");
//引用连接数据库文件
require_once("conn.php");
global $con;

//获取表单数据
$theme = $_POST["theme"];
$describe = $_POST["themeDsc"];
$image = $_POST["themeImg"];
$privacy = $_POST["themePrv"];

//读取当前数据库中 主题id最大值 存入$num
$sql_search="SELECT MAX(theme_id) FROM theme;";
$result = mysqli_query($con,$sql_search);
$num = mysqli_fetch_array($result);

$num[0]++;

//获取page路径
$extend = ".php";
$path = "theme".$num[0].$extend;

//获取封面
if (($_FILES["themeImg"]["type"] == "image/gif")
    || ($_FILES["themeImg"]["type"] == "image/jpeg")
    || ($_FILES["themeImg"]["type"] == "image/pjpeg")
    || ($_FILES["themeImg"]["type"] == "image/png"))
{
    if ($_FILES["themeImg"]["error"] > 0)
    {
        echo "Return Code: " . $_FILES["themeImg"]["error"] . "<br />";
    }
    else
    {
        echo "文件名: " . $_FILES["themeImg"]["name"] . "<br />";
        echo "文件类型: " . $_FILES["themeImg"]["type"] . "<br />";
        echo "文件大小: " . ($_FILES["themeImg"]["size"] / 1024) . " Kb<br />";
        echo "文件暂存地址: " . $_FILES["themeImg"]["tmp_name"] . "<br />";

        if (file_exists("user/themeImg/" . $_FILES["themeImg"]["name"]))
        {
            echo $_FILES["themeImg"]["name"] . " already exists. ";
        }
        else
        {
            move_uploaded_file($_FILES["themeImg"]["tmp_name"],
                "../user/themeImg/" . $_FILES["themeImg"]["name"]);
            echo "文件存储路径: " . "user/themeImg/" . $_FILES["themeImg"]["name"]."<br><br>";
        }
    }
}
else
{
    global $wrong1;
    $wrong1="3";
    echo "头像上传失败，可能是格式错误";
}

//隐私判断
$privacy = 0;
if($_POST["themePrv"])
    $privacy = 1;


//插入数据
global $wrong1;
if($wrong1==3)
    echo "<script>alert('头像上传失败！');location='themeUp.php'</script>";
else{
    $img_path= "user/themeImg/" . $_FILES["themeImg"]["name"];//读取封面地址
    if($_POST['theme']){
                $sql="insert into theme (theme_id,theme_name,theme_dsc,theme_img,theme_privacy) values('$num[0]','$_POST[theme]','$_POST[themeDsc]','$img_path','$privacy')";
                mysqli_query($con,$sql);
                $num=mysqli_affected_rows($con);
                if($num>0)
                    echo "提出成功！<a href='index.php'>ホームページ</a>";
                else
                    echo "失败！";
    }
    else
        echo "テーマを入力してください！";
}




?>