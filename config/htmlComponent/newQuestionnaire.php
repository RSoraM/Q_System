<?php
/**
 * Created by PhpStorm.
 * User: rsora
 * Date: 2017/5/25
 * Time: 16:19
 */
$_SESSION['questionnairePTR'] = false;
?>
<body>
<link href="/page/css/titleOverwrite.css">
<div class="uk-offcanvas-content">
    <!--    head-->
    <?php require '../config/htmlComponent/headerLoggedin.php' ?>

    <!--    main session-->
    <div class="uk-section uk-section-default">
        <div class="uk-container uk-container-small uk-position-relative uk-panel">
            <div class="uk-card-hover uk-card uk-card-default uk-grid-collapse uk-child-width-expand uk-margin" uk-grid>
                <form
                        action="/app/funcDesignSave.php"
                        method="post"
                        enctype="application/json">
                    <div class="uk-card-header uk-card-secondary">
                        <div class="uk-margin">
<!--                            标题-->
                            <input
                                    name="questionnaire_titel"
                                    class="uk-input uk-form-blank"
                                    type="text"
                                    placeholder="未命名表单"
                                    required>
                        </div>
                    </div>
                    <div class="uk-card-body">
                        <div class="uk-margin">
<!--                            描述-->
                            <textarea
                                    name="questionnaire_string"
                                    class="uk-textarea uk-form-blank"
                                    rows="2"
                                    placeholder="为表单添加描述..."
                                    required></textarea>
                            <hr>
                        </div>
                        <div class="uk-margin">
                            <ol>
                                <div>
                                    <li class=" question">
                                        <ul class="uk-list">
<!--                                            题目-->
                                            <input
                                                    name="questionnaire_question"
                                                    class="uk-input uk-form-blank"
                                                    type="text"
                                                    placeholder="Some text..."
                                                    required>
                                            <li class="option" uk-gird>
                                                <span class="uk-width-auto">
                                                    <input
                                                            class="uk-radio"
                                                            type="radio"
                                                            disabled>
                                                </span>
<!--                                                选项-->
                                                <input
                                                        name="questionnaire_question_option"
                                                        class="uk-input uk-form-blank uk-width-small"
                                                        type="text"
                                                        placeholder="选项"
                                                        required>
<!--                                                删除选项按钮-->
                                                <span class="uk-width-auto">
                                                    <a
                                                            uk-icon="icon: close"
                                                            class="del_option uk-icon-button">
                                                    </a>
                                                </span>
                                            </li>
                                            <li class="option" uk-gird>
                                                <span class="uk-width-auto">
                                                    <input
                                                            class="uk-radio"
                                                            type="radio"
                                                            disabled>
                                                </span>
                                                <!--                                                选项-->
                                                <input
                                                        name="questionnaire_question_option"
                                                        class="uk-input uk-form-blank uk-width-small"
                                                        type="text"
                                                        placeholder="选项"
                                                        required>
                                                <!--                                                删除选项按钮-->
                                                <span class="uk-width-auto">
                                                    <a
                                                            uk-icon="icon: close"
                                                            class="del_option uk-icon-button">
                                                    </a>
                                                </span>
                                            </li>
                                            <li>
<!--                                                添加选项按钮-->
                                                <a
                                                        uk-icon="icon: plus"
                                                        class="add_option uk-icon-button">
                                                </a>
                                            </li>
                                            <hr>
                                            <li class="uk-margin">
<!--                                                题型选择-->
                                                <select
                                                        name="questionnaire_question_type"
                                                        class="uk-select uk-form-width-small question_type">
                                                    <option selected>单选题</option>
                                                    <option>多选题</option>
                                                    <option>简答题</option>
                                                </select>
                                                &emsp;&emsp;
                                                <label>
                                                    <input
                                                            name="questionnaire_question_nec"
                                                            class="uk-checkbox uk-form-width-small"
                                                            type="checkbox">
                                                    必答题
                                                </label>
<!--                                                题目位置按钮-->
                                                <a
                                                        uk-icon="icon: trash"
                                                        class="trash uk-button uk-button-text uk-float-right">
                                                </a>
                                                <a
                                                        uk-icon="icon: chevron-down"
                                                        class="down uk-button uk-button-text uk-float-right">
                                                </a>
                                                <a
                                                        uk-icon="icon: chevron-up"
                                                        class="up uk-button uk-button-text uk-float-right">
                                                </a>
                                            </li>
                                            <hr>
                                        </ul>
                                    </li>
                                </div>
                                <div>
<!--                                    添加题目按钮-->
                                    <br><br>
                                    <a
                                            uk-icon="icon: plus"
                                            class="add_question uk-button uk-button-text uk-text-primary">
                                    </a>
                                </div>
                            </ol>
                        </div>
                    </div>
                    <div class="uk-card-footer uk-card-secondary">
                        <input
                                type="submit"
                                class="uk-button uk-button-default uk-align-right"
                                value="保存">
                    </div>

                </form>
            </div>
        </div>
    </div>


</div>

<script src="/page/js/designButton.js"></script>
</body>
</html>