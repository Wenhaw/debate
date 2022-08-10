<?php
if (!session_id()) session_start();
header("content-type:text/html;charset=utf-8");
//引用连接数据库文件
require_once("conn.php");
global $con;

//获取当前用户id
$userId = $_SESSION["userId"];

//获取表单数据
$theme = $_POST["theme"];
/*$describe = $_POST["themeDsc"];
$image = $_POST["themeImg"];
$privacy = $_POST["themePrv"];*/

//读取当前数据库中 主题id最大值 存入$num
$sql_search="SELECT MAX(theme_id) FROM theme;";
$result = mysqli_query($con,$sql_search);
$themeId = mysqli_fetch_array($result);

$themeId[0]++;

//获取page路径
$extend = ".php";
$path = "theme/".$themeId[0].$extend;

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
    echo "<script>alert('画像アップロード失敗');location='themeUp.php'</script>";
else{
    $img_path= "user/themeImg/" . $_FILES["themeImg"]["name"];//读取封面地址
    if($_POST['theme']){
                $sql="insert into theme (theme_id,theme_name,theme_dsc,theme_img,theme_privacy,theme_path,uploader) values('$themeId[0]','$_POST[theme]','$_POST[themeDsc]','$img_path','$privacy','$path','$userId')";
                mysqli_query($con,$sql);
                $num_d=mysqli_affected_rows($con);
                if($num_d>0)
                    echo "提出成功！<a href=$path?themeId=$themeId[0]>テーマへ</a>";
                else
                    echo "失败！";
    }
    else
        echo "テーマを入力してください！";
}
//主题id
echo "主题id是：".$themeId[0];

//开始替换
//打开html模板
$handle=fopen("contentMod.php","rb");

//读取模板内容
$str=fread($handle,filesize("contentMod.php"));

//替换 str_replace("被替换的"，"替换成"，"在哪替换")
//为什么在$str里替换?因为上面我们才读取的模板内容，肯定在模板里换撒
$str=str_replace("{theme}", $theme, $str);
//$str=str_replace("{news_contents}",$content,$str);
fclose($handle);

//把替换的内容写进生成的html文件
$handle=fopen($path,"wb");
fwrite($handle,$str);
fclose($handle);


?>
