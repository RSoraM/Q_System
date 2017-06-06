<?php
/**
 * Created by PhpStorm.
 * User: rsora
 * Date: 2017/5/23
 * Time: 22:47
 */

//1.接受过滤参数
//2.判断
//3.插入
//4.跳转


session_set_cookie_params(3600);
session_start();

require '../config/dbconfig.php';

if (isset($_POST['login_ID'])) {

    $username = $_POST['username'];
    $login_ID = $_POST['login_ID'];
    $passWD = md5($_POST['password']);
    $passWD1 = md5($_POST['password1']);

    $dbc = dbc();
    $query;

//    0 check empty
    foreach ($_POST as $item => $value) {
        $val = trim($value);
        if (empty($val)) {
            $_SESSION['errmsg'] = "非法输入";
            header("Location:/page/login.php");
            exit;
        }
    }

//    1 check login_ID
//      1.1
    if (filter_var("$login_ID", FILTER_VALIDATE_EMAIL)) {
    } else {
        $_SESSION['errmsg'] = "非法邮箱格式";
        header("Location:/page/login.php");
        exit;
    }

//      1.2
    $query = "SELECT COUNT(*) FROM t_user WHERE login_ID = '" . $login_ID . "'";

    $result = mysqli_query($dbc, $query);
    if (!$result) {
        $_SESSION['errmsg'] = "查询失败";
        header("Location:/page/login.php");
        exit;
    }

    $row = mysqli_fetch_row($result);
    $count = $row[0];

    if ($count > 0) {
        $_SESSION['errmsg'] = "邮箱已被使用";
        header("Location:/page/login.php");
        exit;
    }

//    2, check password
//      2.1 length
    if (strlen($_POST['password']) < 6) {
        $_SESSION['errmsg'] = "密码长度应大于 6 位";
        header("Location:/page/login.php");
        exit;
    }

//      2.2 repeat
    if ($passWD != $passWD1) {
        $_SESSION['errmsg'] = "两次输入密码不一致";
        header("Location:/page/login.php");
        exit;
    }

//    3, username
    if (!checkString($username)) {
        $_SESSION['errmsg'] = "用户名含有非法字符";
        header("Location:/page/login.php");
        exit;
    }

//    4，db
    $query = "INSERT INTO t_user (login_ID, password, username) VALUES ('" . $login_ID . "','" . $passWD . "','" . $username . "');";
    if ($dbc->query($query) === TRUE) {
        echo "done...";

        $_SESSION['username'] = $username;
        $_SESSION['login_ID'] = $login_ID;
        $_SESSION['errmsg'] = null;

//        5, jump
        $_SESSION['loggedin'] = 1;
        header("Location:/index.php");
    } else {
        echo $dbc->error;
    }

} else {
    $_SESSION['errmsg'] = "请输入邮箱";
    header("Location:/page/login.php");
}

//function

//check string match num cn&enCharacter -&_
function checkString($str)
{
    $rel = '((?:[a-z-][a-z0-9_]*))';

    if ($c = preg_match_all("/" . $rel . "/is", $str, $matches)) {
        $txtCheck = "";
        foreach ($matches[0] as $match) {
            $txtCheck = $txtCheck . "" . $match;
        }
    }

    if ($txtCheck != $str) {
        return FALSE;
    }
    return TRUE;
}