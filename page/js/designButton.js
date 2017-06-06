/**
 * Created by rsora on 2017/6/2.
 */
$(document).ready(function () {
    var optionText = '' +
        '	<li class="text" style="display: none">	' +
        '	 <input	' +
        '	class="uk-input uk-form-blank uk-form-width-large"	' +
        '	type="text"	' +
        '	placeholder="回答内容..."	' +
        '	disabled>	' +
        '	</li>	';

    var optionClick = '' +
        '	<li class="option" uk-gird style="display: none">	' +
        '	<span class="uk-width-auto">	' +
        '	 <input	' +
        '	class="uk-radio"	' +
        '	type="radio"	' +
        '	disabled>	' +
        '	</span>	' +
        '	<!--选项-->	' +
        '	<input	' +
        '	  name="questionnaire_question_option"	' +
        '	  class="uk-input uk-form-blank uk-width-small"	' +
        '	  type="text"	' +
        '	  placeholder="选项"	' +
        '	  required>	' +
        '	<!--删除选项按钮-->	' +
        '	<span class="uk-width-auto">	' +
        '	 <a	' +
        '	uk-icon="icon: close"	' +
        '	class="del_option uk-icon-button">	' +
        '	 </a>	' +
        '	</span>	' +
        '	  </li>	' ;

    var question = '' +
        '	  <div style="display: none;">	' +
        '	<li class=" question">	' +
        '	 <ul class="uk-list">	' +
        '	<!--  题目-->	' +
        '	  <input	' +
        '	 name="questionnaire_question"	' +
        '	 class="uk-input uk-form-blank"	' +
        '	 type="text"	' +
        '	 placeholder="Some text..."	' +
        '	 required>	' +
        '	  <li class="option" uk-gird>	' +
        '	<span class="uk-width-auto">	' +
        '	 <input	' +
        '	class="uk-radio"	' +
        '	type="radio"	' +
        '	disabled>	' +
        '	</span>	' +
        '	<!--选项-->	' +
        '	<input	' +
        '	  name="questionnaire_question_option"	' +
        '	  class="uk-input uk-form-blank uk-width-small"	' +
        '	  type="text"	' +
        '	  placeholder="选项"	' +
        '	  required>	' +
        '	<!--删除选项按钮-->	' +
        '	<span class="uk-width-auto">	' +
        '	 <a	' +
        '	uk-icon="icon: close"	' +
        '	class="del_option uk-icon-button">	' +
        '	 </a>	' +
        '	</span>	' +
        '	  </li>	' +
        '	  <li class="option" uk-gird>	' +
        '	<span class="uk-width-auto">	' +
        '	 <input	' +
        '	class="uk-radio"	' +
        '	type="radio"	' +
        '	disabled>	' +
        '	</span>	' +
        '	<!--选项-->	' +
        '	<input	' +
        '	  name="questionnaire_question_option"	' +
        '	  class="uk-input uk-form-blank uk-width-small"	' +
        '	  type="text"	' +
        '	  placeholder="选项"	' +
        '	  required>	' +
        '	<!--删除选项按钮-->	' +
        '	<span class="uk-width-auto">	' +
        '	 <a	' +
        '	uk-icon="icon: close"	' +
        '	class="del_option uk-icon-button">	' +
        '	 </a>	' +
        '	</span>	' +
        '	  </li>	' +
        '	  <li>	' +
        '	<!--添加选项按钮-->	' +
        '	<a	' +
        '	  uk-icon="icon: plus"	' +
        '	  class="add_option uk-icon-button">	' +
        '	</a>	' +
        '	  </li>	' +
        '	  <hr>	' +
        '	  <li class="uk-margin">	' +
        '	<!--题型选择-->	' +
        '	<select	' +
        '	  name="questionnaire_question_type"	' +
        '	  class="uk-select uk-form-width-small question_type">	' +
        '	 <option selected>单选题</option>	' +
        '	 <option>多选题</option>	' +
        '	 <option>简答题</option>	' +
        '	</select>	' +
        '	&emsp;&emsp;	' +
        '	<label>	' +
        '	 <input	' +
        '	name="questionnaire_question_nec"	' +
        '	class="uk-checkbox uk-form-width-small"	' +
        '	type="checkbox">	' +
        '	 必答题	' +
        '	</label>	' +
        '	<!--题目位置按钮-->	' +
        '	<a	' +
        '	  uk-icon="icon: trash"	' +
        '	  class="trash uk-button uk-button-text uk-float-right">	' +
        '	</a>	' +
        '	<a	' +
        '	  uk-icon="icon: chevron-down"	' +
        '	  class="down uk-button uk-button-text uk-float-right">	' +
        '	</a>	' +
        '	<a	' +
        '	  uk-icon="icon: chevron-up"	' +
        '	  class="up uk-button uk-button-text uk-float-right">	' +
        '	</a>	' +
        '	  </li>	' +
        '	  <hr>	' +
        '	 </ul>	' +
        '	</li>	' +
        '	  </div>	' ;

    $('ol').on('click', '.del_option', function () {
        if ($(this).parent().parent().parent().find('.option').length > 2) {
            $(this).parent().parent().slideUp("slow", function () {
                $(this).remove();
            })
        }
    })

    $('ol').on('click', '.add_option', function () {
            if ($(this).parent().next().next().find('select').val() == "单选题") {
                if ($(this).parent().parent().find('.option').length < 10) {
                    $(this).parent().before(optionClick);
                    $(this).parent().prev().slideDown("slow");
                }
            } else if ($(this).parent().next().next().find('select').val() == "多选题") {
                if ($(this).parent().parent().find('.option').length < 10) {
                    $(this).parent().before(optionClick);
                    $(this).parent().prev().slideDown("slow");

                    $(this).parent().prev().find('.uk-radio').attr('type','checkbox');
                    $(this).parent().prev().find('.uk-radio').attr('class','uk-checkbox')
                }
            }
        }
    )

    $('ol').on('change', '.question_type', function () {
        if ($(this).val() == "单选题") {
            $(this).parent().parent().find('.text').slideUp("slow", function () {
                $(this).remove();
            })

            if ($(this).parent().parent().children('.option').html() == null) {
                $(this).parent().prev().prev().before(optionClick);
                $(this).parent().prev().prev().before(optionClick);
                $(this).parent().parent().children('.option').slideDown("slow");
            }
            $(this).parent().parent().find('.option .uk-checkbox').attr("type", "radio");
            $(this).parent().parent().find('.option .uk-checkbox').attr("class", "uk-radio");
        }
        if ($(this).val() == "多选题") {
            $(this).parent().parent().find('.text').slideUp("slow", function () {
                $(this).remove();
            })

            if ($(this).parent().parent().children('.option').html() == null) {
                $(this).parent().prev().prev().before(optionClick);
                $(this).parent().prev().prev().before(optionClick);
                $(this).parent().parent().children('.option').slideDown("slow");
            }
            $(this).parent().parent().find('.option .uk-radio').attr("type", "checkbox");
            $(this).parent().parent().find('.option .uk-radio').attr("class", "uk-checkbox");
        }
        if ($(this).val() == "简答题") {
            $(this).parent().parent().find('.option').slideUp("slow", function () {
                $(this).remove();
            })

            if ($(this).parent().parent().children('.text').html() == null) {
                $(this).parent().prev().prev().before(optionText);
                $(this).parent().prev().prev().prev().slideDown("slow");
            }
        }
    })

    $('ol').on('click', '.trash', function () {
        if ($(this).parent().parent().parent().parent().parent().find('div').length > 2) {
            $(this).parent().parent().parent().parent().slideUp("slow", function () {
                $(this).remove();
            })
        }
    })

    $('ol').on('click', '.up', function () {
        if ($(this).parent().parent().parent().parent().prev().html() != null) {
            $(this).parent().parent().parent().parent().slideUp("slow", function () {
                $(this).insertBefore($(this).prev());
                $(this).slideDown("slow")
            })
        }
    })

    $('ol').on('click', '.down', function () {
        if ($(this).parent().parent().parent().parent().next().find('.question').length > 0) {
            $(this).parent().parent().parent().parent().slideUp("slow", function () {
                $(this).insertAfter($(this).next());
                $(this).slideDown("slow")
            })
        }
    })

    $('ol').on('click', '.add_question', function () {
        $(this).parent().before(question);
        $(this).parent().prev().slideDown("slow");
    })

})