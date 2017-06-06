/**
 * Created by tanisha on 2017/6/5.
 */

$(document).ready(function () {
    $('input').change(function () {
        for (var i = 0; i < $('.required').length; i++) {
            if (
                $('.required').forEach(function () {
                    if ($(this).find('.option.checkbox :checkbox:checked').length <= 0) {
                        return false;
                    } else {
                        return true;
                    }
                })
            ) {
                $('input:submit').attr('display','block');
            } else {
                $('input:submit').attr('display','none');
                break;
            }
        }
    })
})