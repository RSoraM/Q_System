<?php
/**
 * Created by PhpStorm.
 * User: rsora
 * Date: 2017/5/23
 * Time: 22:46
 */

//1.接受过滤参数
//2.查询
//3.跳转

session_set_cookie_params(3600);
session_start();

require '../config/dbconfig.php';

if(isset($_POST['login_ID'])){
    $login_ID=$_POST['login_ID'];
    $password=md5($_POST['password']);


//    检查邮箱格式
    if(!filter_var($login_ID,FILTER_VALIDATE_EMAIL)){
        $_SESSION['errmsg'] = "邮箱格式有误";
        header("Location:/page/login.php");
        exit;
    }

//    连接数据库并查询
    $dbc=dbc();
    $query="SELECT COUNT(*),username FROM t_user WHERE login_ID = '".$login_ID."' AND password = '".$password."'";

    $result=mysqli_query($dbc,$query);

    if(!$result){
        $_SESSION['errmsg'] = "查询失败";
        header("Location:/page/login.php");
        exit;
    }

//    结果解析
    $row = mysqli_fetch_row($result);
    $count = $row[0];

    if($count>0){
        $_SESSION['loggedin']=1;
        $_SESSION['username']=$row[1];
        $_SESSION['errmsg']=null;

        $_SESSION['login_ID']=$login_ID;

        header("Location:/index.php");
        exit;
    }else{
        $_SESSION['errmsg'] = "用户密码错误";
        header("Location:/page/login.php");
        exit;
    }
}else{
    $_SESSION['errmsg'] = "请输入邮箱";
    header("Location:/page/login.php");
    exit;
}