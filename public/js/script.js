function validateSubmit(e, button, emptyMsg, emailMsg, mobileMsg, passwordStrengthMsg) {
    //    const passwordStrengthRegex = /((?=.*d)(?=.*[a-z])(?=.*[A-Z]).{8,15})/gm;
    const localEgyptPhoneNumberRegex = /[01]+[0-9-()+]{9}/;
    const emailRegex = /^[A-z0-9._%+-]+@[A-z0-9.-]+.[A-z]{2,4}$/g;
    const inputs = button.parents('form').find('.form-group input');
    if (button.parents('form').find('.form-group textarea[required]').length) {
        inputs.push(button.parents('form').find('.form-group textarea[required]'));
    }
    if (button.parents('form').find('.form-group select').length) {
        inputs.push(button.parents('form').find('.form-group select'));
    }
    inputs.each(function() {
        $(this).removeClass('not-valid');
        $(this).parents('.form-group').children('.validationMsg').text('');
        if (!$(this).val().length > 0) {
            $(this).parents('.form-group').children('.validationMsg')
                .addClass('red').removeClass('green').text(emptyMsg);
            e.preventDefault();
            $(this).addClass('not-valid');
        }
        //        if ($(this).attr('type') == 'password' && $(this).val().length > 0) {
        //            if (!passwordStrengthRegex.test($(this).val())) {
        //                $(this).parents('.form-group').children('.validationMsg')
        //                .addClass('red').removeClass('green').text(passwordStrengthMsg);
        //                e.preventDefault();
        //                $(this).addClass('not-valid');
        //            }
        //        }
        if ($(this).hasClass('email') && $(this).val().length > 0) {
            if (!emailRegex.test($(this).val())) {
                $(this).parents('.form-group').children('.validationMsg')
                    .addClass('red').removeClass('green').text(emailMsg);
                e.preventDefault();
                $(this).addClass('not-valid');
            }
        }
        if ($(this).hasClass('mobile') && $(this).val().length > 0) {
            if (!localEgyptPhoneNumberRegex.test($(this).val())) {
                $(this).parents('.form-group').children('.validationMsg')
                    .addClass('red').removeClass('green').text(mobileMsg);
                e.preventDefault();
                $(this).addClass('not-valid');
            }
        }
    });
}
$('.valid-submit').click(function(e) {
    const button = $(this);
    validateSubmit(e, button, 'Please fill this field!', 'Please enter a valid email address!');
});

$(document).ready(function() {


});