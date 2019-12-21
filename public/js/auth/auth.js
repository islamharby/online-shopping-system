if ($("#login_form").length > 0) {
    $("#login_form").validate({

        rules: {
            password: {
                required: true,
            },
            email: {
                required: true,
                maxlength: 50,
                email: true,
            },
        },
        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#send_form_login').html('Sending..');
            $.ajax({
                url: "/login_process",
                type: "POST",
                data: $('#login_form').serialize(),
                success: function(response) {
                    if (response.msg) {
                        $('#send_form_login').html('Submit');
                        $('#res_message').show();
                        $('#res_message').html(response.msg);
                        $('#msg_div').removeClass('d-none');

                        document.getElementById("login_form").reset();
                        setTimeout(function() {
                            $('#msg_div').addClass('d-none');
                        }, 3000);
                    }
                    if (response.page) {
                        if (response.page == 'dashboard') {
                            window.location.href = "/dashboard";
                        }
                        if (response.page == 'home') {
                            window.location.href = "/home";
                        }
                    }

                }
            });
        }
    })
}
if ($("#register_from").length > 0) {
    $("#register_from").validate({
        rules: {
            name: {
                required: true,
                maxlength: 50,
                minlength: 2
            },
            password: {
                required: true,
                minlength: 4
            },
            email: {
                required: true,
                maxlength: 50,
                minlength: 5,
                email: true,
            },
            phone_number: {
                required: true,
                number: true,
                maxlength: 20,
            },
            card_name: {
                maxlength: 50,
                minlength: 2
            },
            card_number: {
                number: true,
                maxlength: 25
            },
            date_month: {
                maxlength: 2,
                minlength: 1,
                number: true
            },
            date_year: {
                maxlength: 2,
                minlength: 2,
                number: true
            },
            cvc: {
                maxlength: 3,
                minlength: 3,
                number: true
            },
        },
        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#send_form_register').html('Sending..');
            $.ajax({
                url: "/register_process",
                type: "POST",
                data: $('#register_from').serialize(),
                success: function(response) {
                    if (response.msg) {
                        $('#send_form_register').html('Submit');
                        $('#res_message').show();
                        $('#res_message').html(response.msg);
                        $('#msg_div').removeClass('d-none');

                        document.getElementById("register_from").reset();
                        setTimeout(function() {
                            $('#msg_div').addClass('d-none');
                        }, 3000);
                    }
                    if (response.page) {
                        if (response.page == 'home') {
                            window.location.href = "/home";
                        }
                    }

                }
            });
        }
    })
}