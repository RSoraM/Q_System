<?php
/**
 * Created by PhpStorm.
 * User: rsora
 * Date: 2017/5/25
 * Time: 14:40
 */

?>

<div uk-sticky="media: 960" class="uk-navbar-container tm-navbar-container uk-navbar-transparent uk-sticky">
    <div class="uk-container uk-container-expand">
        <nav class="uk-navbar">

            <!--logo-->
            <div class="uk-navbar-center">
                <a href="/index.php" class="uk-navbar-item uk-logo">Q_System</a>
            </div>

            <!--nav-->
            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav uk-visible@m">
                    <!--主页-->
                    <li class="uk-animation-slide-right"><a href="/index.php">主页</a></li>
                    <!--关于-->
                    <li class="uk-animation-slide-right"><a href="/page/about.php">关于</a></li>
                    <!--github-->
                    <li class="uk-animation-slide-right">
                        <a href="#" uk-icon="icon: github" class="uk-button uk-button-secondary">
                        </a>
                    </li>
                </ul>

                <!--off-canvas-->
                <ul class="uk-navbar-nav uk-hidden@m uk-animation-toggle">
                    <li class="uk-animation-shake">
                        <a
                                href="#offcanvas"
                                uk-toggle="target: #offcanvas-reveal"
                                uk-icon="icon: menu"
                        >
                        </a>
                    </li>
                    <div id="offcanvas-reveal" uk-offcanvas="mode: reveal; overlay: true">
                        <div class="uk-offcanvas-bar">

                            <button class="uk-offcanvas-close" type="button" uk-close></button>

                            <h3>关于</h3>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <a href="#" uk-icon="icon: github"></a>
                        </div>
                    </div>
                </ul>
            </div>
        </nav>
    </div>
</div>

