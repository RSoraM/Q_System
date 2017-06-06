<?php
/**
 * Created by PhpStorm.
 * User: rsora
 * Date: 2017/6/2
 * Time: 2:58
 */
?>
<hr>
<li class="uk-margin">
    <!--                                                题型选择-->
    <select
        name="questionnaire_question_type"
        class="uk-select uk-form-width-small question_type">
        <option <?php echo $question_type == "单选题" ? "selected" : ""; ?>>单选题</option>
        <option <?php echo $question_type == "多选题" ? "selected" : ""; ?>>多选题</option>
        <option <?php echo $question_type == "简答题" ? "selected" : ""; ?>>简答题</option>
    </select>
    &emsp;&emsp;
    <label>
        <input
            name="questionnaire_question_nec"
            class="uk-checkbox uk-form-width-small"
            type="checkbox"
            <?php echo $question['questionnaire_question_nec'] == "on" ? "checked" : ""; ?>>
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
