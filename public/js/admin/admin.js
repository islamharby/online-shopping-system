$(document).ready(function() {

    if ($("#form_item_add").length > 0) {
        $("#form_item_add").validate({

            rules: {
                name: {
                    required: true,
                    minlength: 1
                },
                price: {
                    required: true,
                    minlength: 1,
                    number: true

                },
            },
            submitHandler: function(form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#send_form_add_item').html('Sending..');
                $.ajax({
                    url: "/Item/create/process",
                    type: "POST",
                    data: $('#form_item_add').serialize(),
                    success: function(response) {
                        if (response.msg != 'done') {
                            $('#send_form_add_item').html('Submit');
                            $('#res_message').show();
                            $('#res_message').html(response.msg);
                            $('#msg_div').removeClass('d-none');

                            document.getElementById("form_item_add").reset();
                            setTimeout(function() {
                                $('#msg_div').addClass('d-none');
                            }, 3000);
                        }
                        if (response.msg == 'done') {
                            window.location.href = "/dashboard";
                        }

                    }
                });
            }
        })
    }
    if ($("#form_item_edit").length > 0) {
        $("#form_item_edit").validate({

            rules: {
                name: {
                    required: true,
                    minlength: 1
                },
                price: {
                    required: true,
                    minlength: 1,
                    number: true

                },
            },
            submitHandler: function(form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#send_form_edit_item').html('Sending..');
                $.ajax({
                    url: "/Item/edit/process",
                    type: "PUT",
                    data: $('#form_item_edit').serialize(),
                    success: function(response) {
                        if (response.msg != 'done') {
                            $('#send_form_edit_item').html('Submit');
                            $('#res_message').show();
                            $('#res_message').html(response.msg);
                            $('#msg_div').removeClass('d-none');

                            document.getElementById("form_item_edit").reset();
                            setTimeout(function() {
                                $('#msg_div').addClass('d-none');
                            }, 3000);
                        }
                        if (response.msg == 'done') {
                            window.location.href = "/dashboard";
                        }

                    }
                });
            }
        })
    }
});