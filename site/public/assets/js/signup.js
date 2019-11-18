$('#pwd1').keyup(check);
$('#pwd2').keyup(check);
$('#emailSignup').keyup(check);
$('#lastName').keyup(check);
$('#firstName').keyup(check);
$('#conditions').click(check);

function check() {
    var pwd1 = $('#pwd1');
    var pwd2 = $('#pwd2');
    var email = $('#emailSignup');

    var mdpregex = '^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)[a-zA-Z\\d]{8,}$';
    var emailRegex = '^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\\.[a-z]{2,4}$';

    if(pwd1.val().match(mdpregex) && pwd1.val() === pwd2.val() && $('#lastName').val() !== '' && $('#firstName').val() !== '' && email.val().match(emailRegex) && $('#campus').val() !== ''
        && $('#conditions:checked').length > 0) {
        $('#sbBtn').removeClass('disabled');
    }
}
