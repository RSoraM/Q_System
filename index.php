<?php
/**
 * Created by PhpStorm.
 * User: rsora
 * Date: 2017/5/23
 * Time: 17:27
 */

$_SESSION['errmsg']="";
$_SESSION['title'];
$_SESSION['username'];
$_SESSION['login_ID'];
$_SESSION['questionnaireJSON'];
$_SESSION['questionnairePTR'];

session_start();

//1.登陆判定
if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==1)
{
    header("Location:/page/manage.php");
    exit;
}else{
    $_SESSION['errmsg']=" ";
    header("Location:/page/login.php");
    exit;
}

