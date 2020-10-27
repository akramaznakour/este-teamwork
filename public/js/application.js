$(function () {

    var a = 1;
    var html_form = '';
    var html_form_2 = '';
    if ($('#chat-btn').length !== 0) {

        $('#chat-btn').on('click', function () {
            var msg = $('#chat-input').val();
            $.post(url + "chat/store/" + project_id, {
                project_id: project_id,
                user_id: user_id,
                message: msg
            });
        });

        setInterval(function () {
            $.ajax(url + "chat/count/" + project_id)
                .done(function (result) {
                    var msg_nbr_to_update = JSON.parse(result)[0]['COUNT'] - $('#chat').children().length;
                    if (msg_nbr_to_update > 0) {
                        $.ajax(url + "chat/index/" + project_id + '/' + msg_nbr_to_update)
                            .done(function (result) {
                                var html;
                                for (i = 0; i < JSON.parse(result).length; i++) {
                                    if (JSON.parse(result)[i]["user_id"] != user_id) {
                                        html = "  <li><div class=\"left-chat\"><img src=\"" + url + "images/users/5.jpg\" alt=\"user\" class=\"profile-pic\" /><p>" + JSON.parse(result)[i]["message"] + "</p><span>" + JSON.parse(result)[i]["time"] + "</span></div></li>";
                                    } else {
                                        html = "  <li><div class=\"right-chat\"><img src=\"" + url + "images/users/5.jpg\" alt=\"user\" class=\"profile-pic\" /><p>" + JSON.parse(result)[i]["message"] + "</p><span >" + JSON.parse(result)[i]["time"] + "</span></div></li>";
                                    }
                                }
                                $('#chat').append(html);
                            });
                    }
                });

        }, 1000)


    }

    if ($('#javascript-ajax-button').length !== 0) {
        $('#recherche').on('keydown', function () {
            $.ajax(url + "users/index/" + $('#recherche').val())
                .done(function (result) {
                    var html;
                    for (i = 0; i < JSON.parse(result).length; i++) {
                        html = html + '<option value="' + JSON.parse(result)[i]['ID'] + '" > ' + JSON.parse(result)[i]['First_name'] + '  ' + JSON.parse(result)[i]['Last_name'] + '  | <div class="pull-right"> ' + JSON.parse(result)[i]['Email'] + ' </div></option>';
                    }
                    $('#javascript-ajax-result-box').html("");
                    $('#javascript-ajax-result-box').html(html);
                })
        });
    }

    $(document).ready(function () {
        $(".left-first-section").click(function () {
            $('.main-section').toggleClass("open-more");
        });
    });
    $(document).ready(function () {
        $(".fa-minus").click(function () {
            $('.main-section').toggleClass("open-more");
        });
    });

    $('.add_respo').on('click', function (e) {
        if (html_form == '') {
            html_form = '<div class="row">' + $('#resources_tab > div').html() + '</div>';
        }
        if (html_form_2 == '') {
            html_form_2 = '<div class="form-group">' + $(this).parent().parent().parent().find("#respo > div").html() + '</div>';
        }
        $(this).parent().parent().parent().find("#respo").append(html_form_2);
    });

    // add rescources
    $('#add_rescource').on('click', function (e) {

        if (html_form == '') {
            html_form = '<div class="row">' + $('#resources_tab > div').html() + '</div>';
        }

        $('#resources_tab').append(html_form.replace("1", ++a));
        var fun = function () {
            $('.add_respo').on('click', function (e) {


                $(this).parent().parent().parent().find("#respo").append('<div class="form-group">' + $(this).parent().parent().parent().find("#respo > div").html() + '</div>');
            });


        };
        fun();
    });


});


$(document).ready(function () {
    $('.registration-form fieldset:first-child').fadeIn('slow');

    $('.registration-form input[type="text"]').on('focus', function () {
        $(this).removeClass('input-error');
    });

    // next step
    $('.registration-form .btn-next').on('click', function () {
        var parent_fieldset = $(this).parents('fieldset');
        var next_step = true;

        parent_fieldset.find('input[type="text"],input[type="email"]').each(function () {
            if ($(this).val() == "") {
                $(this).addClass('input-error');
                next_step = false;
            } else {
                $(this).removeClass('input-error');
            }
        });

        if (next_step) {
            parent_fieldset.fadeOut(400, function () {
                $(this).next().fadeIn();
            });
        }

    });

    // previous step
    $('.registration-form .btn-previous').on('click', function () {
        $(this).parents('fieldset').fadeOut(400, function () {
            $(this).prev().fadeIn();
        });
    });

    // submit


});
