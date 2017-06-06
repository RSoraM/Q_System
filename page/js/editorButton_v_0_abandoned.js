/**
 * Created by rsora on 2017/5/3.
 */

//this is shit
$(document).ready(function () {
    //question
    $('.add_question').click(function () {
        var ele = '' +
            '   <hr> '+
            '	<li class="uk-margin question" style="display: none;">'+
            '	<!--题目-->	' +
            '	<ul class="uk-list">	' +
            '	<input class="uk-input uk-form-blank" type="text"	' +
            '	   placeholder="Some text...">	' +
            '	<!--选项-->	' +
            '	<li>	' +
            '	<input class="uk-radio" type="radio" disabled>	' +
            '	<input class="uk-input uk-form-blank uk-form-width-medium" type="text"	' +
            '	   placeholder="选项">	' +
            '	<a uk-icon="icon: close"	' +
            '	   class="del_option uk-button uk-button-text"></a>	' +
            '	</li>	' +
            '		' +
            '	<li>	' +
            '	<input class="uk-radio" type="radio" disabled>	' +
            '	<input class="uk-input uk-form-blank uk-form-width-medium" type="text"	' +
            '	   placeholder="选项">	' +
            '	<a uk-icon="icon: close"	' +
            '	   class="del_option uk-button uk-button-text"></a>	' +
            '	</li>	' +
            '		' +
            '	<!--add_option-->	' +
            '	<li>	' +
            '	<a uk-icon="icon: plus" class="add_option uk-button uk-button-text"></a>	' +
            '	</li>	' +
            '		' +
            '	<!--题型控制-->	' +
            '	<li class="uk-margin">	' +
            '	<hr>	' +
            '	<select class="uk-select uk-form-width-small">	' +
            '	<option selected>单选题</option>	' +
            '	<option>多选题</option>	' +
            '	<option>简答题</option>	' +
            '	</select>	' +
            '	&emsp;&emsp;&emsp;&emsp;	' +
            '		' +
            '	<label>	' +
            '	<input class="uk-checkbox uk-form-width-small" type="checkbox">	' +
            '	必答题	' +
            '	</label>	' +
            '		' +
            '	<a uk-icon="icon: trash" class="trash uk-button uk-button-text uk-float-right"></a>	'+
            '	<a uk-icon="icon: chevron-down" class="down uk-button uk-button-text uk-float-right"></a>	'+
            '	<a uk-icon="icon: chevron-up" class="up uk-button uk-button-text uk-float-right"></a>	'+
            '	</li>	' +
            '	</ul>	' +
            '		' +
            '	</li>	';

        $(this).before(ele);
        $(this).prev().slideDown("slow");

        $('.question .trash').unbind();
        $('.question .trash').on('click',this,function () {
            $(this).parent().parent().parent().prev().remove();
            $(this).parent().parent().parent().slideUp("slow",function () {
                this.remove();
            });
        })

        // option
        $('.question .add_option').unbind();
        $('.question .add_option').on('click',this,function () {
            var ele = '' +
                '	<li class="option" style="display: none;">	'+
                '	    <input class="uk-radio" type="radio" disabled>	' +
                '	    <input class="uk-input uk-form-blank uk-form-width-medium" type="text"	' +
                '	           placeholder="选项">	' +
                '	    <a uk-icon="icon: close"	' +
                '	       class="del_option uk-button uk-button-text"></a>	' +
                '	</li>	';

            $(this).parent().before(ele);
            $(this).parent().prev().slideDown("slow")

            $('.question .del_option').unbind();
            $('.question .del_option').on('click',this,function () {
                $(this).parent().slideUp("slow",function () {
                    this.remove();
                })
            })
        })

        $('.question .del_option').unbind();
        $('.question .del_option').on('click',this,function () {
            $(this).parent().slideUp("slow",function () {
                this.remove();
            })
        })

    })

    $('.question .trash').on('click',this,function () {
        $(this).parent().parent().parent().prev().remove();
        $(this).parent().parent().parent().slideUp("slow",function () {
            this.remove();
        });
    })

    // option
    $('.question .add_option').on('click',this,function () {
        var ele = '' +
            '	<li class="option" style="display: none;">	'+
            '	    <input class="uk-radio" type="radio" disabled>	' +
            '	    <input class="uk-input uk-form-blank uk-form-width-medium" type="text"	' +
            '	           placeholder="选项">	' +
            '	    <a uk-icon="icon: close"	' +
            '	       class="del_option uk-button uk-button-text"></a>	' +
            '	</li>	';

        $(this).parent().before(ele);
        $(this).parent().prev().slideDown("slow");

        $('.question .del_option').unbind();
        $('.question .del_option').on('click',this,function () {
            $(this).parent().slideUp("slow",function () {
                this.remove();
            })
        })
    })

    $('.question .del_option').on('click',this,function () {
        $(this).parent().slideUp("slow",function () {
            this.remove();
        })
    })

    // order change_NOT FINISH
    $('.up').on('click',this,function () {

        $(this).parent().parent().parent().slideUp("slow",function () {
            $(this).parent().parent().parent().prev().css("display","none");
            $(this).parent().parent().parent().css("display","none");
        })
    })


    //radio check
    $('.question_type').change(function () {
        var sel = '' +
            '	<li class="option">	'+
            '	    <input class="uk-radio" type="radio" disabled>	' +
            '	    <input class="uk-input uk-form-blank uk-form-width-medium" type="text"	' +
            '	           placeholder="选项">	' +
            '	    <a uk-icon="icon: close"	' +
            '	       class="del_option uk-button uk-button-text"></a>	' +
            '	</li>	';

        var tex = ''+
        '	<li class="text">	'+
        '	    <input class="uk-input uk-form-blank uk-form-width-large" type="text"	' +
        '	           placeholder="回答..." disabled>	' +
        '	</li>	';

        console.log($('.question_type').val());

        if($('.question_type').val()=="单选题"){
            $(this).parent().parent().children(".text").remove();
            $(this).parent().parent().children(".uk-radio").attr("type","checkbox");
            $(this).parent().parent().children(".uk-radio").attr("class","uk-checkbox");
        }
        if($('.question_type').val()=="多选题"){
            $(this).parent().parent().children(".text").remove();
            $(this).parent().parent().children(".uk-radio").attr("type","radio");
            $(this).parent().parent().children(".uk-radio").attr("class","uk-radio");
        }
        if($('.question_type').val()=="简答题"){
            $(this).parent().parent().children(".option").remove();
            $(this).parent().parent().children(".add_option").
            $(this).parent().parent().children().eq(1).before(tex);
        }
    })
})


