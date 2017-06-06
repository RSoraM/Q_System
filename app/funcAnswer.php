<?php
/**
 * Created by PhpStorm.
 * User: tanisha
 * Date: 2017/6/3
 * Time: 19:36
 */

session_start();

require '../app/methodAnswer.php';

require '../config/dbconfig.php';

$raw = file_get_contents("php://input");

if ($_POST['json']==null){
    header("Location:/index.php");
}
$json = toJSONAnswer($_POST['json']);

//echo $json;
//
//print ("<pre>");
//print_r(json_decode($json,true));
//print ("</pre>");

$JSONArray = json_decode($json, true);

$num = strtok($raw, "&");
$rawArray = null;

$i = 0;
while ($num != false) {
    $rawArray[$i] = $num;
    $num = strtok("&");
    $i++;
}

foreach ($rawArray as $value) {
//    get key
    $num = strtok($value, "=");

    if ($num == "json"){
        continue;
    }

    if ($JSONArray['que'][$num]['type'] != "简答题") {
        $JSONArray['que'][$num]['option'][strtok("=")] = 1;
    } else {
        $txt = strtok("=");
        $JSONArray['que'][$num]['option'][$txt] = 1;

    }
}

$jsonAnswer = json_encode($JSONArray);

$dbc = dbc();

$query = "INSERT INTO t_answer (Q_ID,answer) VALUES ('".$_GET['id']."','".$jsonAnswer."');";

if ($dbc->query($query) === TRUE) {
    echo "done...";
    header("Location:/index.php");
} else {
    echo $dbc->error;
}