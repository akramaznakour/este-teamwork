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

    var resource = '';
    $(document).ready(function () {
        resource = $('#resources_tab').html();
    });

    // add resources
    $('.add_resource').on('click', function (e) {
        $(this).parent().find('#resources_tab').append(resource);
    });
    // add resources
    $('.add_resource_edit').on('click', function (e) {
        $(this).parent().prev().append(resource);
    });
    $(document).bind('DOMSubtreeModified', function () {
        $('.resource_delete').on('click', function () {
            $(this).parent().parent().remove();
        })
    });

});
