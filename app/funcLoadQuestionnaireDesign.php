<?php
/**
 * Created by PhpStorm.
 * User: rsora
 * Date: 2017/5/26
 * Time: 0:18
 */

if ($_SESSION['loggedin'] != 1) {
    header("Location:/index.php");
    exit;
}

$query = "SELECT question FROM t_questionnaire WHERE ID = '" . $_SESSION['questionnairePTR'] . "';";

$result = $dbc->query($query);
if (!$result) {
} else {
    $row = mysqli_fetch_row($result);
    $jsonArray = json_decode(urldecode($row[0]), true);

}

//遍历jsonArray产生问卷
?>
<body>
<!--<pre>-->
<!--    --><?php //print_r($jsonArray); ?>
<!--</pre>-->
<div class="uk-offcanvas-content">
    <!--    head-->
    <?php require '../config/htmlComponent/headerLoggedin.php' ?>

    <!--    main session-->
    <div class="uk-section uk-section-default">
        <div class="uk-container uk-container-small uk-position-relative uk-panel">
            <div class="uk-card-hover uk-card uk-card-default uk-grid-collapse uk-child-width-expand uk-margin" uk-grid>
                <form
                        action="/app/funcDesignUpdate.php"
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
                                    required
                                    value="<?php echo $jsonArray['questionnaire_titel']; ?>">
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
                                    required>
                            </textarea>
                            <script>
                                $(document).ready(function () {
                                    $("textarea").val("<?php echo $jsonArray['stringquestionnaire_string'];?>");
                                })
                            </script>
                            <hr>
                        </div>
                        <div class="uk-margin">
                            <ol>
                                <?php
                                foreach ($jsonArray['question'] as $question) {
                                    ?>
                                    <div>
                                        <li class="uk-margin question">
                                            <ul class="uk-list">
                                                <!--                                            题目-->
                                                <input
                                                        name="questionnaire_question"
                                                        class="uk-input uk-form-blank"
                                                        type="text"
                                                        placeholder="Some text..."
                                                        required
                                                        value="<?php echo $question['questionnaire_question']; ?>">
                                                <?php
                                                $question_type = urldecode($question['questionnaire_question_type']);
                                                if ($question_type == "简答题") {
                                                    include "../config/htmlComponent/questionTextOption.php";
                                                    include "../config/htmlComponent/questionSelect.php";
                                                } else {
                                                    foreach ($question['questionnaire_question_option'] as $option) {
                                                        if ($question_type == "单选题") {
                                                            $option_type = "radio";
                                                            $option_class = "uk-radio";
                                                        } elseif ($question_type == "多选题") {
                                                            $option_type = "checkbox";
                                                            $option_class = "uk-checkbox";
                                                        }
                                                        include '../config/htmlComponent/questionOption.php';
                                                    }
                                                    ?>
                                                    <li>
                                                        <!--                                                添加选项按钮-->
                                                        <a
                                                                uk-icon="icon: plus"
                                                                class="add_option uk-icon-button">
                                                        </a>
                                                    </li>
                                                    <?php
                                                    include "../config/htmlComponent/questionSelect.php";
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                    </div>
                                    <?php
                                }
                                ?>
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
                        <label class="uk-form-label">
                            <input
                                    name="questionnaire_method"
                                    class="uk-checkbox"
                                    type="checkbox"
                                    id="saveAs">
                            另存为
                        </label>
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
<script>
    $(document).ready(function () {
        $("#saveAs").change(function () {
                if ($("#saveAs").is(":checked")) {
                    $("form").attr('action', "/app/funcDesignSave.php");
                } else {
                    $("form").attr('action', "/app/funcDesignUpdate.php")
                }
            }
        )
    })
</script>
</body>