/**
 * Created by rsora on 2017/5/4.
 */
$(document).ready(function () {

    var question_temple ='' +
        '	<li class="uk-margin question" style="display: none;">	'+
        '	<!--题目-->	'+
        '	<ul class="uk-list">	'+
        '	<input name="questionnaire_question" class="uk-input uk-form-blank" type="text"	'+
        '	   placeholder="Some text..." required>	'+
        '	<!--选项-->	'+
        '	<li class="option">	'+
        '	<input class="uk-radio" type="radio" disabled>	'+
        '	<input name="questionnaire_question_option" class="uk-input uk-form-blank uk-form-width-medium" type="text"	'+
        '	   placeholder="选项" required>	'+
        '	<a uk-icon="icon: close"	'+
        '	   class="del_option uk-button uk-button-text"></a>	'+
        '	</li>	'+
        '		'+
        '	<li class="option">	'+
        '	<input class="uk-radio" type="radio" disabled>	'+
        '	<input name="questionnaire_question_option" class="uk-input uk-form-blank uk-form-width-medium" type="text"	'+
        '	   placeholder="选项" required>	'+
        '	<a uk-icon="icon: close"	'+
        '	   class="del_option uk-button uk-button-text"></a>	'+
        '	</li>	'+
        '		'+
        '	<!--add_option-->	'+
        '	<li>	'+
        '	<a uk-icon="icon: plus" class="add_option uk-button uk-button-text"></a>	'+
        '	</li>	'+
        '		'+
        '	<!--题型控制-->	'+
        '	<li class="uk-margin">	'+
        '	<hr>	'+
        '	<select name="questionnaire_question_type" class="uk-select uk-form-width-small question_type">	'+
        '	<option selected>单选题</option>	'+
        '	<option>多选题</option>	'+
        '	<option>简答题</option>	'+
        '	</select>	'+
        '	&emsp;&emsp;&emsp;&emsp;	'+
        '		'+
        '	<label>	'+
        '	<input name="questionnaire_question_nec" class="uk-checkbox uk-form-width-small" type="checkbox">	'+
        '	必答题	'+
        '	</label>	'+
        '		'+
        '	<a uk-icon="icon: trash" class="trash uk-button uk-button-text uk-float-right"></a>	'+
        '	<a uk-icon="icon: chevron-down" class="down uk-button uk-button-text uk-float-right"></a>	'+
        '	<a uk-icon="icon: chevron-up" class="up uk-button uk-button-text uk-float-right"></a>	'+
        '	</li>	'+
        '	</ul>	'+
        '		'+
        '	</li>	';

    var option_temple = '' +
        '	<li class="option" style="display: none;">	'+
        '	<input class="uk-radio" type="radio" disabled>	'+
        '	<input name="questionnaire_question_option" class="uk-input uk-form-blank uk-form-width-medium" type="text"	'+
        '	   placeholder="选项" required>	'+
        '	<a uk-icon="icon: close"	'+
        '	   class="del_option uk-button uk-button-text"></a>	'+
        '	</li>	';

    var text_temple = '' +
        '	<li class="text" style="display: none;">	'+
        '	    <input class="uk-input uk-form-blank uk-form-width-large" type="text"	'+
        '	           placeholder="回答内容..." disabled>	'+
        '	</li>	';


    $('ol').on('click','.add_question',function () {
        $(this).before(question_temple);
        $(this).prev().slideDown("slow");
    })

    $('ol').on('click','.trash',function () {
        $(this).parent().parent().parent().slideUp("slow",function () {
            $(this).prev().remove();
            $(this).remove();
        })
    })

    $('ol').on('click','.add_option',function () {
        $(this).parent().before(option_temple);
        $(this).parent().prev().slideDown("slow");
    })

    $('ol').on('click','.del_option',function () {
        $(this).parent().slideUp("slow",function () {
            $(this).remove();
        })
    })

    $('ol').on('click','.up',function () {
        if($(this).parent().parent().parent().prev().prev().html()==null){

        }else{
            $(this).parent().parent().parent().prev().slideUp("slow",function () {
                $(this).insertBefore($(this).prev());
                $(this).slideDown("slow")

            })
            $(this).parent().parent().parent().slideUp("slow",function () {
                $(this).insertBefore($(this).prev().prev());
                $(this).slideDown("slow")

            })
        }
    })

    $('ol').on('click','.down',function () {
        if ($(this).parent().parent().parent().next().next().html()==null){

        }else {
            $(this).parent().parent().parent().prev().slideUp("slow",function () {
                $(this).insertAfter($(this).next().next().next());
                $(this).slideDown("slow")
            })
            $(this).parent().parent().parent().slideUp("slow",function () {
                $(this).insertAfter($(this).next().next().next());
                $(this).slideDown("slow")

            })
        }
    })

    $('ol').on('change','.question_type',function () {
        if($(this).val()=="单选题"){
            $(this).parent().parent().find('.text').slideUp("slow",function () {
                $(this).remove();
            })
            if($(this).parent().parent().children('.option').html()==null){
                $(this).parent().prev().before(option_temple);
                $(this).parent().prev().before(option_temple);
                $(this).parent().parent().children('.option').slideDown("slow");
            }
            $(this).parent().parent().find('.option .uk-checkbox').attr("type","radio");
            $(this).parent().parent().find('.option .uk-checkbox').attr("class","uk-radio");
        }
        if($(this).val()=="多选题"){
            $(this).parent().parent().find('.text').slideUp("slow",function () {
                $(this).remove();
            })
            if($(this).parent().parent().children('.option').html()==null){
                $(this).parent().prev().before(option_temple);
                $(this).parent().parent().children('.option').slideDown("slow");
            }
            $(this).parent().parent().find('.option .uk-radio').attr("type","checkbox");
            $(this).parent().parent().find('.option .uk-radio').attr("class","uk-checkbox");
        }
        if($(this).val()=="简答题"){
            $(this).parent().parent().find('.option').slideUp("slow",function () {
                $(this).remove();
            })
            if($(this).parent().parent().children('.text').html()==null){
                $(this).parent().prev().before(text_temple);
                $(this).parent().prev().prev().slideDown("slow");
            }
        }
    })
})
