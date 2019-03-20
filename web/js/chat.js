
$(document).ready(function () {

    setInterval(
        function () {
            $.ajax(
                {
                    type : "POST",
                    dataType : "json",
                    url : "/index.php?page=ajax&action=getMessages",
                    data : {},
                    success : function(data) {
                        if (data) {
                            let html = "";
                            $.each(data, function (index, value) {
                                html += "<div class=\"chat-body chat-msg clearfix\">";
                                html += "<div class=\"header\">";
                                html += "<strong class=\"primary-font\">" + value['username'] + "</strong>";
                                html += "<small class=\"pull-right text-muted\">";
                                html += "<span class=\"glyphicon glyphicon-time\"></span>" + value['created_date'];
                                html += "</small></div><p>" + value['message'] + "</p></div>";
                            });
                            $("#msg-list").html(html);
                        }
                    }
                });
        }, 3000
    );

    $("#send-message").submit(function() {
        var message = $("#message").val();
        var userID = $("#user-id").val();
        console.log(message);
        $.ajax(
            {
                type : "POST",
                dataType : "json",
                url : "/index.php?page=ajax&action=sendMessage",
                data : {
                    'message': message,
                    'userID': userID
                },
                success : function(data) {
                    if (data) {
                        let html = "<div class=\"chat-body chat-msg clearfix\">";
                        html += "<div class=\"header\">";
                        html += "<strong class=\"primary-font\">" + data['username'] + "</strong>";
                        html += "<small class=\"pull-right text-muted\">";
                        html += "<span class=\"glyphicon glyphicon-time\"></span>" + data['created_date'];
                        html += "</small></div><p>" + data['message'] + "</p></div>";
                        $("#msg-list").append(html);
                    }
                }
            });
        return false;
    })

});
