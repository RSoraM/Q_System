<?php
/**
 * Created by PhpStorm.
 * User: rsora
 * Date: 2017/6/2
 * Time: 4:19
 */

session_start();

if ($_SESSION['loggedin'] != 1) {
    header("Location:/index.php");
    exit;
}
$_SESSION['questionnairePTR'] = $_GET['id'];

require '../config/dbconfig.php';
$dbc = dbc();
$query = "SELECT COUNT(*)FROM t_qnu WHERE Q_ID = '" . $_SESSION['questionnairePTR'] . "' AND U_ID = '" . $_SESSION['login_ID'] . "';";
$result = $dbc->query($query);

//    结果解析
$result = mysqli_fetch_row($result);
$count = $result[0];
if ($count > 0) {
    $query = "SELECT status FROM t_questionnaire WHERE ID = '" . $_SESSION['questionnairePTR'] . "';";
    $result = $dbc->query($query);
    $result = mysqli_fetch_row($result);
    $result = $result[0];
    if ($result == 0) {
        $query = "DELETE FROM t_answer WHERE Q_ID ='" . $_SESSION['questionnairePTR'] . "';";
        $dbc->query($query);

        $query = "UPDATE t_questionnaire SET status=1 WHERE ID = '" . $_SESSION['questionnairePTR'] . "';";
        if ($dbc->query($query) === TRUE) {
            echo "done...";
            header("Location:/index.php");
            exit;
        }

    } else {
        $query = "UPDATE t_questionnaire SET status=0 WHERE ID = '" . $_SESSION['questionnairePTR'] . "';";
        if ($dbc->query($query) === TRUE) {
            echo "done...";
            header("Location:/index.php");
            exit;
        }
    }

} else {
    header("Location:/index.php");
    exit;
}
