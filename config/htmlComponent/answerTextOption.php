<?php
/**
 * Created by PhpStorm.
 * User: rsora
 * Date: 2017/6/2
 * Time: 5:48
 */
?>
<li class="text">
    <input
            name="<?php echo $i; ?>"
            class="uk-input uk-form-width-large"
            type="text"
            placeholder=""
        <?php echo $question['questionnaire_question_nec'] == "on" ? "required" : ""; ?>>
</li>
