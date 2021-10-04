<?php
if (!session_id()) session_start();
include_once "conn.php";
global $con;
//验证
if($_POST['userEmail']){
    $sql = "select * from user where user_email = '$_POST[userEmail]' and user_password = '$_POST[userPassword]'";
    $result = mysqli_query($con,$sql);
    $num = mysqli_num_rows($result);//或者：$num=mysql_affected_row();
    if($num>0){
        $row = mysqli_fetch_array($result);	//将数据以索引方式储存在数组中
        echo "<p style='text-align:center'>".$row[2]."さん,こんにちは！"."<br/>";
        //echo "<p align='center'>"."请确认电话为：".$row[3]."<br/><br/>";
        echo "<a href='index.php'>Click me to back to homepage</a>";


        $_SESSION["userId"]=$row[0];
    }
    /*if($_POST['_un']){
        $sql = "select * from db_user where username = '$_POST[_un]' and password = '$_POST[_pw]'";
        $result = mysql_query($sql);
        $num = mysql_num_rows($result);//或者：$num=mysql_affected_row();
        if($num>0){
         $row = mysql_fetch_array($result);	//将数据以索引方式储存在数组中
         echo "<p align='center'>".$row[0].",你好！"."<br/>";
         echo "<p align='center'>"."请确认电话为：".$row[3]."<br/><br/>";
         echo "<a href='edit1.php'>用户编辑</a>";
        }*/
    else
        echo "<script>alert('手机号码或密码错误！请重新登录！');location='login.php'</script>";
}
else
    echo "输入为空！";
?>