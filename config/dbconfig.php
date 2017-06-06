<?php
/**
 * Created by PhpStorm.
 * User: rsora
 * Date: 2017/5/23
 * Time: 23:42
 */

//db config
function dbc()
{
//    设计重载配置权限...
//    if ($_SESSION['loggedin'] != 1) {
//        header("Location:index.php");
//        exit;
//    }

    $dbc = new mysqli('localhost', 'root', 'sorasama', 'Q_System');

    if ($dbc->connect_error) {
        $_SESSION['errmsg'] = "连接失败";
        header("Location:/index.php");
        exit;
    }
    return $dbc;
    exit;
}