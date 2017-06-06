<?php
/**
 * Created by PhpStorm.
 * User: rsora
 * Date: 2017/5/26
 * Time: 0:08
 */

//问卷属于用户返回title else 返回 false;

if ($_SESSION['loggedin'] != 1) {
    header("Location:/index.php");
    exit;
}

require '../config/dbconfig.php';
$dbc = dbc();
$query = "SELECT status FROM t_questionnaire WHERE ID='".$_SESSION['questionnairePTR']."';";
$result = $dbc->query($query);
//    结果解析
$row = mysqli_fetch_row($result);
$count = $row[0];

if ($count == 1) {
    header("Location:/page/manage.php");
    exit;
}else{
    $query = "SELECT COUNT(*)FROM t_qnu WHERE Q_ID = '". $_SESSION['questionnairePTR'] ."' AND U_ID = '".$_SESSION['login_ID']."';";

    $result = $dbc->query($query);

//    结果解析
    $row = mysqli_fetch_row($result);
    $count = $row[0];

    if ($count > 0) {
        $query = "SELECT title FROM t_questionnaire WHERE ID = '".$_SESSION['questionnairePTR']."';";

        $result = $dbc->query($query);
        if (!$result) {
        } else {
            $row = mysqli_fetch_row($result);
            $_SESSION['title']=$row[0]." - ".$_SESSION['username'].'\'s Q_System';
        }

    } else {
        header("Location:/page/design.php?id=new");
        exit;
    }
}


