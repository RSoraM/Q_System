<?php
/**
 * Created by PhpStorm.
 * User: rsora
 * Date: 2017/5/24
 * Time: 0:13
 */

session_start();

$logout = @$_GET['logout'];
if ($logout == 1) {
    $_SESSION['loggedin'] = 0;
}

if ($_SESSION['loggedin'] != 1) {
    $_SESSION['title'] = 'Q_System';
} else {
    $_SESSION['title'] = $_SESSION['username'] . "" . '\'s Q_System';
}
require '../config/htmlComponent/htmlHeader.php';
?>
<div class="uk-offcanvas-content">
    <!--    head-->
    <?php
    if ($_SESSION['loggedin'] != 1) {
        require '../config/htmlComponent/headerNotLoggedin.php';
    } else {
        require '../config/htmlComponent/headerLoggedin.php';
    }
    ?>

<!--    main session-->
    <div class="uk-section uk-section-default">
        <div class="uk-container uk-container-small uk-position-relative uk-panel">
            <div class="uk-card-hover uk-card uk-card-small uk-card-default">
                <div class="uk-card-header uk-card-secondary">
                    <p class="uk-card-title">About it</p>
                </div>
                <div class="uk-card-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci doloremque eius eos ex, illo illum libero magnam perferendis. Ad cum, deleniti esse laborum perferendis quidem rem sint sit tempora voluptatum.</p>
                </div>
                <div class="uk-card-footer">
                    2017-06-02 03:54
                </div>
            </div>
        </div>
    </div>