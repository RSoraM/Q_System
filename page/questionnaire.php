<?php
/**
 * Created by PhpStorm.
 * User: rsora
 * Date: 2017/5/23
 * Time: 22:42
 */

//1.PTR加载问卷
//2.提交问卷

session_start();

require '../app/funcQuestionnaireStatus.php';

$result = questionnaireStatus($_GET['id']);

if ($result != 1) {
    header("Location:/index.php");
} else {

    $dbc = null;
    $dbc = dbc();
    $query = "SELECT question FROM t_questionnaire WHERE ID = '" . $_GET['id'] . "';";
    $result = $dbc->query($query);

    if (!$result) {
        header("Location:/index.php");
    } else {
        $row = mysqli_fetch_row($result);
        $jsonArray = json_decode(urldecode($row[0]), true);

        $_SESSION['title'] = $jsonArray['questionnaire_titel'] . " - Q_System";

    }
    require '../config/htmlComponent/htmlHeader.php';
}

//print ("<pre>");
//print_r($jsonArray);
//print ("</pre>");
?>

<body>
<script>
    $(document).ready(function () {
        $('ol').on('click', 'input', function () {
            for (var i = 0; i < $('.question').find('.required').length; i++) {
                if ($($('.question').find('.required')[i]).find(':checkbox').length > 0) {
                    if ($($('.question').find('.required')[i]).find(':checkbox:checked').length > 0) {
                        $('input:submit').removeAttr('disabled');
                    } else {
                        $('input:submit').attr('disabled', 'disabled');
                        break;
                    }
                } else {
                    $('input:submit').attr('disabled', 'disabled');
                }
            }
        })
    })
</script>
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
            <div class="uk-card-hover uk-card uk-card-default uk-grid-collapse uk-child-width-expand uk-margin" uk-grid>
                <form
                        action="/app/funcAnswer.php?id=<?php echo $_GET['id']; ?>"
                        method="post"
                        enctype="application/json">
                    <input name="json" value="<?php echo urlencode($row[0]); ?>" hidden>
                    <div class="uk-card-header uk-card-secondary">
                        <!--                            标题-->
                        <p class="uk-card-title"><?php echo $jsonArray['questionnaire_titel']; ?></p>
                    </div>
                    <div class="uk-card-body">
                        <div class="uk-margin">
                            <!--                            描述-->
                            <p><?php echo $jsonArray['stringquestionnaire_string'] ?></p>
                            <hr>
                        </div>
                        <div class="uk-margin">
                            <ol>
                                <?php
                                $i = 0;
                                foreach ($jsonArray['question'] as $question) {
                                    ?>
                                    <div>
                                        <li class="uk-margin question">
                                            <ul class="uk-list <?php echo ($question['questionnaire_question_nec'] == "on") ? "required" : ""; ?>">
                                                <!--                                            题目-->
                                                <span><?php echo $question['questionnaire_question']; ?></span>
                                                <?php
                                                $question_type = urldecode($question['questionnaire_question_type']);
                                                if ($question_type == "简答题") {
                                                    include "../config/htmlComponent/answerTextOption.php";
                                                } else {
                                                    foreach ($question['questionnaire_question_option'] as $option) {
                                                        if ($question_type == "单选题") {
                                                            $option_type = "radio";
                                                            $option_class = "uk-radio";
                                                        } elseif ($question_type == "多选题") {
                                                            $option_type = "checkbox";
                                                            $option_class = "uk-checkbox";
                                                        }
                                                        include '../config/htmlComponent/answerOption.php';
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                    </div>
                                    <hr>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </ol>
                        </div>
                    </div>
                    <div class="uk-card-footer uk-card-secondary">
                        <input
                                disabled="disabled"
                                style="display: block;"
                                type="submit"
                                class="uk-button uk-button-default uk-align-right"
                                value="提交">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div
</body>
