<?php
/**
 * Created by PhpStorm.
 * User: rsora
 * Date: 2017/5/23
 * Time: 22:43
 */

session_start();

$logout = @$_GET['logout'];
if ($logout == 1) {
    $_SESSION['loggedin'] = 0;
}

if ($_SESSION['loggedin'] != 1) {
    header("Location:/index.php");
    exit;
}

require '../app/methodAnswer.php';
require '../app/methodQuestion.php';

$page = @$_GET['page'];
if ($page < 1) {
    $page = 1;
    header("Location:/page/count.php?id=" . $_GET['id'] . "&page=" . $page);
} else {
    $answerNum = getAnswerNum($_GET['id']);
    if ($page > $answerNum) {
        $page = $answerNum;
        header("Location:/page/count.php?id=" . $_GET['id'] . "&page=" . $page);
    }
}

getJSONQuestion($_GET['id']);

$_SESSION['questionnairePTR'] = null;
$_SESSION['questionnairePTR'] = $_GET['id'];

$JArray = json_decode(urldecode($_SESSION['questionnaireJSON']), true);

require '../config/htmlComponent/htmlHeader.php';

?>
<body>
<div class="uk-offcanvas-content">
    <!--head-->
    <?php require '../config/htmlComponent/headerLoggedin.php' ?>

    <!--session-->
    <div class="uk-section uk-section-default">
        <div class="uk-container uk-container-small uk-position-relative uk-panel">

            <?php
            $_SESSION['pagePTR'] = $page;
            require '../app/funcLoadCountPage.php' ?>
            <br>
            <?php require '../app/funcLoadCountChart.php' ?>

        </div>
    </div>
</div>
</body>