<?php
/**
 * Created by PhpStorm.
 * User: rsora
 * Date: 2017/6/2
 * Time: 5:15
 */

function questionnaireStatus($id){
    require '../config/dbconfig.php';
    $dbc=null;
    $dbc = dbc();
    $query = "SELECT status FROM t_questionnaire WHERE ID = '" . $id . "';";
    $result = $dbc->query($query);
    $result = mysqli_fetch_row($result);
    $result = $result[0];

    return $result;
}