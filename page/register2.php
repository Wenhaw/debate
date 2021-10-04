<?php 
	if (($_FILES["userIcon"]["type"] == "image/gif")
|| ($_FILES["userIcon"]["type"] == "image/jpeg")
|| ($_FILES["userIcon"]["type"] == "image/pjpeg")
|| ($_FILES["userIcon"]["type"] == "image/png"))
  {
  if ($_FILES["userIcon"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["userIcon"]["error"] . "<br />";
    }
  else
    {
    echo "文件名: " . $_FILES["userIcon"]["name"] . "<br />";
    echo "文件类型: " . $_FILES["userIcon"]["type"] . "<br />";
    echo "文件大小: " . ($_FILES["userIcon"]["size"] / 1024) . " Kb<br />";
    echo "文件暂存地址: " . $_FILES["userIcon"]["tmp_name"] . "<br />";

    if (file_exists("img/head/" . $_FILES["userIcon"]["name"]))
      {
      echo $_FILES["userIcon"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["userIcon"]["tmp_name"],
      "../img/head/" . $_FILES["userIcon"]["name"]);
      echo "文件存储路径: " . "img/head/" . $_FILES["userIcon"]["name"]."<br><br>";
      }
    }
  }
else
  {
  	global $wrong1;
  	$wrong1="3";
  echo "头像上传失败，可能是格式错误";
  }
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>

  
  
<?php
include_once('conn.php');
global $con;
global $wrong1;
if($wrong1==3)
echo "<script>alert('头像上传失败！');location='register.php'</script>";
else{
$head_path= "img/head/" . $_FILES["userIcon"]["name"];//读取头像地址
if($_POST['userEmail']){
	$sql="select * from user where user_email ='$_POST[userEmail]'";
	mysqli_query($con,$sql);
	$num=mysqli_affected_rows($con);
	if($num>0)
	  echo "<script>alert('此手机号已被注册，请更换手机号！');location='register.php';</script>";
	  else
	  {
	  	$ig="$_POST[I_agree]";
	  	if($ig!=1)
	  	echo "<script>alert('请仔细阅读协议！');location='register.php';</script>";
	  	else
	  	{
	  $i="insert into user (user_email,user_name,user_password,user_icon,user_address) values('$_POST[userEmail]','$_POST[userName]','$_POST[userPassword]','$head_path','$_POST[userAddress]')";
	  mysqli_query($con,$i);
	  $num=mysqli_affected_rows($con);
	  if($num>0)
	    echo "登録成功！<a href='login.php'>ログイン</a>";
	  else
	    echo "用户注册失败！";}
	   }
	}
else
  echo "输入为空！";
}
?>
</body>
</html>