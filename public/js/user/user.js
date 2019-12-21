if ($("#purchases_form").length > 0) {
    $("#purchases_form").validate({

        rules: {
            'purchases': {
                required: true,
            }
        },
        messages: {
            ' purchases': {
                required: "This field is required",
            },
        },
        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#send_form_purchases').html('Sending..');

            const ids = [];
            $("input:checked[name=purchases]").each(function() {
                ids.push($(this).val());
            });
            $.ajax({
                url: "/info/check",
                type: "POST",
                success: function(response) {
                    if (response.message === 'update') {
                        $.ajax({
                            url: "/Purchases/add",
                            type: "POST",
                            data: { ids: ids },
                            success: function(response) {
                                if (response.msg != 'done') {
                                    $('#send_form_purchases').html('Submit');
                                    $('#res_message').show();
                                    $('#res_message').html(response.msg);
                                    $('#msg_div').removeClass('d-none');

                                    document.getElementById("purchases_form").reset();
                                    setTimeout(function() {
                                        $('#msg_div').addClass('d-none');
                                    }, 3000);
                                } else if (response.msg == 'done') {
                                    window.location.href = "/purchases/billed/" + response.id;
                                }

                            }
                        });
                    }
                    if (response.message === 'not_update') {
                        window.location.href = "/info/update/" + response.id;
                    }
                }
            });
        }
    })
}
if ($("#update_from").length > 0) {
    $("#update_from").validate({
        rules: {
            card_name: {
                required: true,
                maxlength: 50,
                minlength: 2
            },
            card_number: {
                required: true,
                number: true,
                maxlength: 25
            },
            date_month: {
                required: true,
                maxlength: 2,
                minlength: 1,
                number: true
            },
            date_year: {
                required: true,
                maxlength: 2,
                minlength: 2,
                number: true
            },
            cvc: {
                required: true,
                maxlength: 3,
                minlength: 3,
                number: true
            },
            card_type: {
                required: true,
            },
        },
        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#send_form_update_info').html('Sending..');
            $.ajax({
                url: "/info/update/process",
                type: "POST",
                data: $('#update_from').serialize(),
                success: function(response) {
                    if (response.msg) {
                        $('#send_form_update_info').html('Submit');
                        $('#res_message').show();
                        $('#res_message').html(response.msg);
                        $('#msg_div').removeClass('d-none');

                        document.getElementById("update_from").reset();
                        setTimeout(function() {
                            $('#msg_div').addClass('d-none');
                        }, 3000);
                    }
                    if (response.page == 'home') {
                        window.location.href = "/home";
                    }
                }
            });
        }
    })
}