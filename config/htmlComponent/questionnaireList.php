<?php
/**
 * Created by PhpStorm.
 * User: rsora
 * Date: 2017/5/25
 * Time: 23:36
 */

?>
<div class="uk-card-hover uk-card uk-card-small uk-card-default">
    <div class="uk-card-header  <?php echo $questionnaireStatus; ?>"><!-- 通过status控制样式 -->
        <p class="uk-card-title uk-text-truncate"><?php echo $questionnaireTitle; ?></p>
    </div>
    <div class="uk-card-body">
        <p class="uk-text-truncate"><?php echo $questionnaireString; ?></p>
        <label class="<?php echo $questionnaireButtonStatus ? "uk-label uk-label-danger" : "uk-label"; ?>"><?php echo $questionnaireButtonStatus ? "发布中" : "未发布"; ?></label>
    </div>
    <div class="uk-card-footer uk-text-truncate">
        <a class="uk-button uk-button-text uk-float-right" type="button" uk-icon="icon: more" href="#"></a>
        <div uk-dropdown>
            <ul class="uk-nav uk-dropdown-nav uk-text-center">
                <li>
                    <a href="/page/design.php?id=<?php echo $questionnaireID; ?>" <?php echo $questionnaireButtonStatus ? "hidden" : ""; ?>>修改问卷</a>
                </li>
                <li>
                    <a href="/page/questionnaire.php?id=<?php echo $questionnaireID; ?>" <?php echo $questionnaireButtonStatus ? "" : "hidden"; ?>>填写问卷</a>
                </li>
                <li><img src="/app/funcQRcode.php?id=<?php echo $questionnaireID; ?>" alt=""
                         style="display: <?php echo $questionnaireButtonStatus ? "" : "none"; ?>"></li>
                <li>
                    <a href="/app/funcRelease.php?id=<?php echo $questionnaireID; ?>"
                       class="uk-text-danger" <?php echo $questionnaireButtonStatus ? "hidden" : ""; ?>>发布问卷</a>
                </li>
                <hr>
                <li>
                    <a href="/app/funcRelease.php?id=<?php echo $questionnaireID; ?>"
                       class="uk-text-danger" <?php echo $questionnaireButtonStatus ? "" : "hidden"; ?>>结束问卷</a>
                </li>
                <li>
                    <a href="/app/funcDeleteQuestionnaire.php?id=<?php echo $questionnaireID; ?>"
                       class="uk-text-danger" <?php echo $questionnaireButtonStatus ? "hidden" : ""; ?>>移除问卷</a>
                </li>
            </ul>
        </div>
        已收到：<?php echo $questionnaireAnswerNum; ?>份问卷
        <?php
        if ( $questionnaireAnswerNum > 0) {
            echo "<a href='/page/count.php?id=" . $questionnaireID . "&page=1'>统计</a>";
        }
        ?>
        <br>
        创建于：<?php echo $questionnaireDate; ?>
    </div>
</div>
<br>
