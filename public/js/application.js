$(function () {


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

    /****************************************/

    var a = 1;
    var html_form = '';
    var html_form_2 = '';


    $(document).ready(function () {
        html_form = '<div class="row">' + $('#resources_tab > div').html() + '</div>';
    });

    $('.add_respo').on('click', function (e) {


        if (html_form_2 == '') {
            html_form_2 = '<div class="form-group">' + $(this).parent().parent().parent().find("#respo > div").html() + '</div>';
            $(this).parent().parent().parent().find("#respo").append(html_form_2);
        }

    });

    // add rescources
    $('#add_rescource').on('click', function (e) {

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

        parent_fieldset.find('input[required]').each(function () {
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

});
