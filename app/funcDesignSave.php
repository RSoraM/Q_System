<?php
/**
 * Created by PhpStorm.
 * User: rsora
 * Date: 2017/5/23
 * Time: 23:09
 */

//JSON数据展示参考

session_start();

require '../app/methodQuestion.php';

if ($_SESSION['loggedin'] != 1) {
    header("Location:/index.php");
    exit;
}

require '../config/dbconfig.php';

if (!($raw = file_get_contents("php://input"))) {
    echo "error!!!";
    header("Location:/index.php");
} else {
//    echo "get data";
}

$json = toJSONQuestion($raw);
$jArray = toArrayQuestion($json);
//print ("<h1>JSON</h1><br><pre>");
//print_r($json);
//print ("</pre><br><br>");

//print ("<h1>Array</h1><br><pre>");
//print_r($jArray);
//print ("</pre><br><br>");

$dbc = null;
$dbc = dbc();

$query = "INSERT INTO t_questionnaire (title, String, question, status) VALUES ('" . $jArray["questionnaire_titel"] . "','" . $jArray["stringquestionnaire_string"] . "','" . $json . "',0);";

if ($dbc->query($query) === TRUE) {
//    echo "done...";
    $id = $dbc->insert_id;
    $query = "INSERT INTO t_qnu(Q_ID, U_ID) VALUE ('" . $id . "','" . $_SESSION['login_ID'] . "');";
    if ($dbc->query($query) === TRUE) {
        echo "done...";
        $dbc->close();
        header("Location:/index.php");
    } else {
        echo $dbc->error;
    }
} else {
    echo $dbc->error;
}

