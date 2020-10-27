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
    $resource = '';
    $(document).ready(function () {
        $resource = $('#resources_tab').html();
    });

    // add resources
    $('#add_resource').on('click', function (e) {
        $(this).parent().find('#resources_tab').append($resource);
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
