<?php
/**
 * Created by PhpStorm.
 * User: tanisha
 * Date: 2017/6/4
 * Time: 02:26
 */

function checkRelation($q_id, $u_id)
{
//    include '../config/dbconfig.php';

    $dbc = dbc();
    $query = "SELECT COUNT(*) FROM t_qnu WHERE Q_ID = '" . $q_id . "' AND U_ID = '" . $u_id . "';";

    $result = $dbc->query($query);
    $result = $result->fetch_row();

    if ($result[0] > 0) {
        $query = "SELECT title FROM t_questionnaire WHERE ID = '" . $q_id . "';";

        $result = $dbc->query($query);
        $result = $result->fetch_row();

        $_SESSION['title']=$result[0]." - ".$_SESSION['username'].'\'s Q_System';

    } else {
        header("Location:/index.php");
        return "fuck";
    }
}