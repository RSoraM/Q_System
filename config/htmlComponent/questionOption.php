<?php
/**
 * Created by PhpStorm.
 * User: rsora
 * Date: 2017/6/1
 * Time: 23:15
 */
?>
<li class="option" uk-gird>
    <span class="uk-width-auto">
       <input
               class="<?php echo $option_class; ?>"
               type="<?php echo $option_type; ?>"
               disabled>
    </span>

    <!--                                                选项-->
    <input
            name="questionnaire_question_option"
            class="uk-input uk-form-blank uk-form-width-small"
            type="text"
            placeholder="选项"
            required
            value="<?php echo $option; ?>"
    <!--                                                删除选项按钮-->
    <span class="uk-width-auto">
        <a
                uk-icon="icon: close"
                class="del_option uk-icon-button">
        </a>
    </span>
</li>