<div class="col-md-4  ">
    <!-- begin panel -->
    <div class=" panel-inverse chat">
        <div id="chat-box-head" class="panel-heading">
            <h4 class="panel-title">Chat -- <?php echo $project->title; ?> <span class="label label-success pull-right"></span>
            </h4>
        </div>
        <div id="body-chat"  class="panel-body bg-silver" style="overflow: auto;height: 300px;display: none">
            <div>
                <ul id="chat" class="chats">


                </ul>
            </div>

        </div>
        <div id="footer-chat" style="display: none" class="panel-footer">
            <form name="send_message_form" data-id="message-form">
                <div class="input-group">
                    <input id="chat-input" class="form-control input-sm" name="message" placeholder="Enter your message here."
                           type="text">
                    <span class="input-group-btn">
                                        <button id="chat-btn" class="btn btn-primary btn-sm" type="button">Send</button>
                                    </span>
                </div>
            </form>
        </div>
    </div>
    <!-- end panel -->
</div>