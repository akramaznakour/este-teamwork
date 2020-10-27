$(function () {

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
                                        html = "  <li><div class=\"left-chat\"><img src=\"" + url + "uploads/" + JSON.parse(result)[i]["avatar"] + "\" alt=\"user\" class=\"profile-pic\" /><p>" + JSON.parse(result)[i]["message"] + "</p><span>" + JSON.parse(result)[i]["time"] + "</span></div></li>";
                                    } else {
                                        html = "  <li><div class=\"right-chat\"><img src=\"" + url +  "uploads/" + JSON.parse(result)[i]["avatar"] + "\" alt=\"user\" class=\"profile-pic\" /><p>" + JSON.parse(result)[i]["message"] + "</p><span >" + JSON.parse(result)[i]["time"] + "</span></div></li>";
                                    }
                                }
                                $('#chat').append(html);
                            });
                    }
                });

        }, 1000)


    }


});