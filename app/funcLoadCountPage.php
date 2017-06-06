<?php
/**
 * Created by PhpStorm.
 * User: tanisha
 * Date: 2017/6/4
 * Time: 02:43
 */

//session_start();

if ($_SESSION['loggedin'] != 1) {
    header("Location:/index.php");
    exit;
}

//require '../config/dbconfig.php';

$dbc = null;
$dbc = dbc();
$query = "SELECT answer FROM t_answer WHERE Q_ID='" . $_SESSION['questionnairePTR'] . "'";

$result = $dbc->query($query);

$pageArr;
$i = 1;

$answerNum = $result->num_rows;

while ($row = $result->fetch_assoc()) {
    $pageArr[$i] = json_decode(urldecode($row['answer']), true);
    $i++;
}

if ($pageArr == null) {
    header("Location:/index.php");
    exit;
}
?>
<nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
            <li>
                <a uk-toggle="target: .countPageButton;animation: uk-animation-fade">
                    <span class="countPageButton" uk-icon="icon: triangle-up"></span>
                    <span class="countPageButton" uk-icon="icon: triangle-down" hidden></span>
                </a>
            </li>
            <li>
                <a type="button" uk-icon="icon: more"
                   href="#"></a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li class="uk-active"><a href="#">Active</a></li>
                        <li><a href="#">Item</a></li>
                        <li><a href="#">Item</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>

    <div class="uk-navbar-center">
        <span class="uk-navbar-item uk-logo">问卷</span>
    </div>

        <div class="uk-navbar-right">
            <ul class="uk-navbar-nav">
                <li>
                    <a href="?page=<?php echo ($_GET['page'] - 1) . "&id=" . $_GET['id'] ?>"
                       uk-icon="icon: chevron-left"></a>
                </li>
                <li>
                    <a href="?page=<?php echo ($_GET['page'] + 1) . "&id=" . $_GET['id'] ?>"
                       uk-icon="icon: chevron-right"></a>
                </li>
            </ul>
        </div>
</nav>

<div class="countPageButton uk-card-hover uk-card uk-card-small uk-card-default">
    <div class="uk-card-header uk-card-secondary">
        <span class="uk-text-truncate uk-card-title">
            <?php echo "#" . $_SESSION['pagePTR'] . ": " . $JArray['questionnaire_titel']; ?>
        </span>
    </div>
    <div class="uk-card-body">
        <ol>
            <?php
            $i = 0;
            foreach ($JArray['question'] as $question) {
                ?>
                <div>
                    <li class="uk-margin">
                        <ul class="uk-list">
                            <span class="uk-text-truncate uk-text-bold"><?php echo $question['questionnaire_question']; ?></span>
                            <?php
                            if ($question['questionnaire_question_type'] != "简答题") {

                                if ($question['questionnaire_question_type'] == "单选题") {
                                    $option_type = "radio";
                                    $option_class = "uk-radio";
                                } elseif ($question['questionnaire_question_type'] == "多选题") {
                                    $option_type = "checkbox";
                                    $option_class = "uk-checkbox";
                                }

                                foreach ($question['questionnaire_question_option'] as $option) {
                                    ?>
                                    <li>
                                        <input
                                                class="<?php echo $option_class; ?>"
                                                type="<?php echo $option_type; ?>"
                                                disabled
                                            <?php echo $pageArr[$_SESSION['pagePTR']]['que'][$i]['option'][$option] == 1 ? "checked" : ""; ?>
                                        >
                                        <!--                                                选项-->
                                        <span><?php echo $option; ?>
                                        </span>
                                    </li>
                                    <?php
                                }
                            } else {
                                ?>
                                <li>
                                    <span>
                                        <?php
                                        foreach ($pageArr[$_SESSION['pagePTR']]['que'][$i]['option'] as $value => $item) {
                                            echo $value;
                                        }
                                        ?>
                                    </span>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </li>
                </div>
                <?php
                $i++;
            }
            ?>
        </ol>
    </div>
</div>
