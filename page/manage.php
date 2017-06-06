<?php
/**
 * Created by PhpStorm.
 * User: rsora
 * Date: 2017/5/23
 * Time: 22:40
 */

//1.登陆判断
//2.加载问卷表

session_start();

$logout = @$_GET['logout'];
if ($logout == 1) {
    $_SESSION['loggedin'] = 0;
}

if ($_SESSION['loggedin'] != 1) {
    header("Location:/index.php");
    exit;
}

$_SESSION['title'] = $_SESSION['username'] ."". '\'s Q_System';
require '../config/htmlComponent/htmlHeader.php';

?>
<body>
<!--<div> --><?php //echo $_SESSION['errmsg']?><!--</div>-->
<div class="uk-offcanvas-content">
    <!--head-->
    <?php require '../config/htmlComponent/headerLoggedin.php' ?>

    <!--session-->
    <div class="uk-section uk-section-default">
        <div class="uk-container uk-container-small uk-position-relative uk-panel">

            <div class="uk-margin">
                <a class="uk-icon-button" href="/page/design.php?id=new" uk-icon="icon: plus"></a>
            </div>

            <?php require '../app/funcLoadQuestionnaireList.php'?>

        </div>
    </div>

</div>

</body>
</html>