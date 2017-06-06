<?php
/**
 * Created by PhpStorm.
 * User: rsora
 * Date: 2017/5/23
 * Time: 22:40
 */

//1.登陆判断
//2.提交表单
//  2.1登陆表单
//  2.2注册表单

session_set_cookie_params(3600);
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 1) {
    header("Location:manage.php");
    exit;
}

$_SESSION['title']="Q_System";
require '../config/htmlComponent/htmlHeader.php'

?>
<body>

<div class="uk-offcanvas-content">

    <!--    head-->
    <?php require '../config/htmlComponent/headerNotLoggedin.php' ?>

    <!--    main section-->
    <div class="uk-section uk-section-default">
        <div class="uk-container uk-container-small uk-position-relative uk-panel">
            <div class="uk-card-hover uk-card uk-card-default uk-grid-collapse uk-child-width-expand uk-margin" uk-grid>
                <div class="uk-card-body uk-width-1-1">
                    <div class="uk-margin">
                        <form id="formLogin" method="post" action="/app/funcLogin.php"
                              class=" uk-text-center uk-align-center">
                            <fieldset class="uk-fieldset uk-grid" uk-grid>

                                <!--                                form title-->
                                <legend class="uk-legend uk-animation-slide-top uk-text-center">
                                    hello~
                                </legend>

                                <!--                                error msg-->
                                <p class="uk-text-danger"><?php echo $_SESSION['errmsg']; ?></p>

                                <!--                                username hidden-->
                                <div class="uk-margin toggle-registered" hidden>
                                    <div class="uk-inline uk-width-1-3@s">
                                        <span class="uk-form-icon" uk-icon="icon: user"></span>
                                        <input name="username" id="username" class="uk-input" type="text"
                                               placeholder="用户名">
                                    </div>
                                </div>

                                <!--                                login_ID-->
                                <div class="uk-margin uk-animation-slide-left-medium">
                                    <div class="uk-inline uk-width-1-3@s">
                                        <span class="uk-form-icon" uk-icon="icon: mail"></span>
                                        <input name="login_ID" id="login_ID" class="uk-input" type="email"
                                               placeholder="邮箱" required="" autofocus>
                                    </div>
                                </div>

                                <!--                                password-->
                                <div class="uk-margin uk-animation-slide-right-medium">
                                    <div class="uk-inline uk-width-1-3@s">
                                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                        <input name="password" id="password" class="uk-input" type="password"
                                               placeholder="密码" required="required">
                                    </div>
                                </div>

                                <!--                                password1 hidden-->
                                <div class="uk-margin toggle-registered" hidden>
                                    <div class="uk-inline uk-width-1-3@s">
                                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                        <input name="password1" id="password1" class="uk-input" type="password"
                                               placeholder="重复密码">
                                    </div>
                                </div>

                                <!--                                button-->
                                <div class="uk-margin">
                                    <div class="uk-inline">
                                        <button
                                                id="regButton"
                                                class="uk-button uk-button-default uk-animation-slide-bottom"
                                                type="button"
                                                uk-toggle="target: .toggle-registered; animation:  uk-animation-slide-left, uk-animation-slide-bottom"
                                        >注册
                                        </button>
                                        <input
                                                id="subButton"
                                                type="submit"
                                                class="uk-button-secondary uk-button uk-animation-slide-bottom"
                                                value="登陆"
                                        >
                                    </div>
                                </div>

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--    off-canvas-->
    <!--    <div id="offcanvas" uk-offcanvas="mode: push; overlay: true; flip: true;">-->
    <!--        <div class="uk-offcanvas-bar">-->
    <!--            <div class="uk-panel">-->
    <!--                <ul class="uk-nav uk-nav-center uk-margin-auto-vertical">-->
    <!--                    <li class="uk-animation-slide-right"><a href="#">需要登录</a></li>-->
    <!--                    <hr>-->
    <!--                    <li class="uk-animation-slide-right"><a href="/index.php">主页</a></li>-->
    <!--                    <li class="uk-animation-slide-right"><a href="/about.php">关于</a></li>-->
    <!--                    <hr>-->
    <!--                    <li class="uk-animation-slide-right"><a href="#" uk-icon="icon: github"></a></li>-->
    <!--                </ul>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->

</div>

<script src="js/regButtonControl.js"></script>
</body>
</html>