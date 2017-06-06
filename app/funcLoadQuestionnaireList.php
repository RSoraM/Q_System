<?php
/**
 * Created by PhpStorm.
 * User: rsora
 * Date: 2017/5/25
 * Time: 23:36
 */

if ($_SESSION['loggedin'] != 1) {
    header("Location:index.php");
    exit;
}

require '../config/dbconfig.php';

$dbc = dbc();
$query = "SELECT Q_ID,creat_date FROM t_qnu WHERE U_ID = '" . $_SESSION['login_ID'] . "'";

$result = $dbc->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $questionnaireID = $row['Q_ID'];
        $questionnaireDate = strtok($row['creat_date'], " ");

        $query = "SELECT title,String,status FROM t_questionnaire WHERE ID = '" . $row["Q_ID"] . "'";

        $resultInQuestionnaire = $dbc->query($query);
        $rowInQuestionnaire = $resultInQuestionnaire->fetch_assoc();

        $questionnaireTitle = urldecode($rowInQuestionnaire['title']);
        $questionnaireString = urldecode($rowInQuestionnaire['String']);
        $rowInQuestionnaire['status'] != 0 ? $questionnaireButtonStatus = true : $questionnaireButtonStatus = false;
        $rowInQuestionnaire['status'] != 0 ? $questionnaireStatus = "uk-card-primary" : $questionnaireStatus = "uk-card-secondary";

        $query = "SELECT count(*) FROM t_answer WHERE Q_ID='" . $row["Q_ID"] . "'";
        $questionnaireAnswerNum = $dbc->query($query);
        $questionnaireAnswerNum = $questionnaireAnswerNum->fetch_row();
        $questionnaireAnswerNum = $questionnaireAnswerNum[0];

        include '../config/htmlComponent/questionnaireList.php';
    }
} else {
}