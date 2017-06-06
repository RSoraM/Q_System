<?php
/**
 * Created by PhpStorm.
 * User: rsora
 * Date: 2017/6/1
 * Time: 19:57
 */

session_start();

if ($_SESSION['loggedin'] != 1) {
    header("Location:/index.php");
    exit;
}

require '../config/dbconfig.php';

$dbc = null;
$dbc = dbc();

$query = "DELETE FROM t_qnu WHERE Q_ID = '" . $_GET['id'] . "' AND U_ID = '" . $_SESSION['login_ID'] . "';";
if ($result = $dbc->query($query) === TRUE) {

    $query = "DELETE FROM t_answer WHERE ID = '" . $_GET['id'] . "';";
    if ($dbc->query($query) === TRUE) {
        $query = "DELETE FROM t_questionnaire WHERE ID = '" . $_GET['id'] . "';";
        if ($dbc->query($query) === TRUE) {
            $dbc->close();
            header("Location:/index.php");
        }else{
            echo $dbc->error;
        }
    } else {
        echo $dbc->error;
        $dbc->close();
        header("Location:/index.php");
    }
} else {
    echo $dbc->error;
    $dbc->close();
    header("Location:/index.php");
    exit;
}
