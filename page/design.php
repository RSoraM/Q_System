<?php
/**
 * Created by PhpStorm.
 * User: rsora
 * Date: 2017/5/23
 * Time: 22:40
 */

//1.登陆判断
//2.PTR加载问卷
//3.提交表单

session_start();

$logout = @$_GET['logout'];
if ($logout == 1) {
    $_SESSION['loggedin'] = 0;
} else {
}

if ($_SESSION['loggedin'] != 1) {
    header("Location:/index.php");
    exit;
} else {
    //add 检查模式
    $_SESSION['questionnairePTR'] = $_GET['id'];
    if ($_SESSION['questionnairePTR'] == "new") {
        $_SESSION['title'] = "新建问卷 - " . $_SESSION['username'] . '\'s Q_System';
    } else {
        require '../app/funcRelationship_QnU.php';
    }
    //new 空表
    //id 检查id与user是否对应 按照json产生页面
}

require '../config/htmlComponent/htmlHeader.php';

if ($_SESSION['questionnairePTR'] == "new") {
    require '../config/htmlComponent/newQuestionnaire.php';
} else {
    require '../app/funcLoadQuestionnaireDesign.php';
}


