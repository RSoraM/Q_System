<?php
/**
 * Created by PhpStorm.
 * User: rsora
 * Date: 2017/6/2
 * Time: 5:18
 */

session_start();

require '../app/funcQuestionnaireStatus.php';

if (questionnaireStatus($_GET['id'])) {
//    header("Location:/index.php");
} else {
    require '../config/dbconfig.php';

    $dbc = dbc();
    $query = "SELECT question FROM t_questionnaire WHERE ID = '" . $_GET['id'] . "';";

    $result = $dbc->query($query);
    if (!$result) {
        header("Location:/index.php");
    } else {
        $row = mysqli_fetch_row($result);
        $jsonArray = json_decode($row[0], true);
        $_SESSION['title'] = $jsonArray['questionnaire_titel'] . " - Q_System";

    }
    require '../config/htmlComponent/htmlHeader.php';

}
