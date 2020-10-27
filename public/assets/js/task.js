$(function () {

    var responsable = '';
    var resource = '';

    $(document).ready(function () {
        responsable = $('#responsable_tab').html();
        resource = $('#resources_tab').html();
    });

    /************ CREATE TASK ******************/
    // responsable
    $('.add_resource').on('click', function (e) {
        $(this).parent().find('#resources_tab').append(resource);
    });

    // responsable
    $('.add_responsable').on('click', function (e) {
        $(this).parent().find('#responsable_tab').append(responsable);
    });


    /************ EDIT TASK ******************/

    // add responsable edit page
    $('.add_responsable_edit').on('click', function (e) {
        $(this).parent().prev().append(responsable);
    });
    // add resources edit page
    $('.add_resource_edit').on('click', function (e) {
        $(this).parent().prev().append(resource);
    });

    $(document).bind('DOMSubtreeModified', function () {
        $('.delete-btn').on('click', function () {
            $(this).parent().parent().remove();
        })
    });

});
