<?php
/**
 * Created by PhpStorm.
 * User: rsora
 * Date: 2017/6/2
 * Time: 5:48
 */
?>
<li class="option">
    <input
            name="<?php echo $i; ?>"
            value="<?php echo $option; ?>"
            class="<?php echo $option_class; ?>"
            type="<?php echo $option_type; ?>"
        <?php echo ($option_type == "radio" && $question['questionnaire_question_nec'] == "on") ? "required" : ""; ?>>
    <!--                                                选项-->
    <span><?php echo $option; ?></span>
</li>
<script>
</script>