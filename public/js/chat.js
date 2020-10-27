$('#chat-box-head').click(function () {
    $("#body-chat").fadeToggle();
    $("#footer-chat").fadeToggle();
})
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
                        var html="";
                        for (i = JSON.parse(result).length-1; i >=0 ; i--) {
                            if (JSON.parse(result)[i]["user_id"] != user_id) {
                                html += "  <li class=\"left\"><span class=\"date-time\">" + JSON.parse(result)[i]["time"] + "</span><a href=\"javascript:;\" class=\"name\">" + JSON.parse(result)[i]["first_name"] + ' ' + JSON.parse(result)[i]["last_name"] + "</a><a href=\"javascript:;\" class=\"image\"><img  src=\"" + url + "uploads/" + JSON.parse(result)[i]["avatar"] + "\"  ></a><div class=\"message\">" + JSON.parse(result)[i]["message"] + "</div></li>";
                            } else {
                                html += "  <li class=\"right\"><span class=\"date-time\">" + JSON.parse(result)[i]["time"] + "</span><a href=\"javascript:;\" class=\"name\">" + JSON.parse(result)[i]["first_name"] + ' ' + JSON.parse(result)[i]["last_name"] + "</a><a href=\"javascript:;\" class=\"image\"><img  src=\"" + url + "uploads/" + JSON.parse(result)[i]["avatar"] + "\"  ></a><div class=\"message\">" + JSON.parse(result)[i]["message"] + "</div></li>";
                            }
                        }
                        $('#chat').append(html);
                    });
            }
        });

}, 1000);

