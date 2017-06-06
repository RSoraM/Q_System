/**
 * Created by rsora on 2017/4/29.
 */
$(document).ready(function () {
    $('#regButton').text("注册");
})
$(document).on('click', '#regButton', function () {
    // alert($('#regButton').text()== '注册');
    if ($('#regButton').text()== '注册') {
        $('#regButton').text("返回登陆");

        $('#subButton').val("注册");
        $('#formLogin').attr('action', '/app/funcReg.php');

        $('#username').attr("required", "required");
        $('#password1').attr("required", "required");
    } else {
        $('#regButton').text("注册");

        $('#subButton').val("登陆");
        $('#formLogin').attr('action', '/app/funcLogin.php');

        $('#username').removeAttr("required");
        $('#password1').removeAttr("required");
    }
})