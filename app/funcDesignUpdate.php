<?php
/**
 * Created by PhpStorm.
 * User: rsora
 * Date: 2017/6/1
 * Time: 21:19
 */

require '../app/methodQuestion.php';

session_start();

if ($_SESSION['loggedin'] != 1 && $_SESSION['questionnairePTR'] != false) {
    header("Location:/index.php");
    exit;
}

if (!($raw = file_get_contents("php://input"))) {
    echo "error!!!";
    header("Location:/index.php");
} else {
//    echo "get data";
}

$json = toJSONQuestion($raw);
$jArray = toArrayQuestion($json);

require '../config/dbconfig.php';
$dbc = dbc();

$query = "UPDATE t_questionnaire SET title='" . $jArray["questionnaire_titel"] . "', String='" . $jArray["stringquestionnaire_string"] . "', question='" . $json . "', status=0 WHERE ID = '" . $_SESSION['questionnairePTR'] . "';";

if ($dbc->query($query) === TRUE) {
    $dbc->close();
    header("Location:/page/design.php?id=".$_SESSION['questionnairePTR']);
} else {
    echo $dbc->error;
}


