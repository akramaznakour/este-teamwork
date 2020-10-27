if ($('#recherche').length !== 0) {
    $('#recherche').keydown(function () {
        $.ajax(url + "users/index/" + project_id + '/' + $('#recherche').val())
            .done(function (result) {

                var html;
                for (i = 0; i < JSON.parse(result).length; i++) {
                    html = html + '<option value="' + JSON.parse(result)[i]['ID'] + '" > ' + JSON.parse(result)[i]['first_name'] + '  ' + JSON.parse(result)[i]['last_name'] + '  | <div class="pull-right"> ' + JSON.parse(result)[i]['email'] + ' </div></option>';
                }
                $('#javascript-ajax-result-box').html("");
                $('#javascript-ajax-result-box').html(html);
            })
    });
}