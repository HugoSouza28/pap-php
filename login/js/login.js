$(document).ready(function () {
    "use strict";
    $("#submit").click(function () {

        $("#message").html("aqui");
        
        var username = $("#myusername").val(), password = $("#mypassword").val();
        e

        if ((username === "") || (password === "")) {
            $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Preenche todos os campos</div>");
        } else {
            $.ajax({
                type: "POST",
                url: "checklogin.php",
                data: "myusername=" + username + "&mypassword=" + password,
                dataType: 'JSON',
                success: function (html) {
                    console.log(html.response + ' ' + html.username);
                    if (html.response === 'true') {
                        location.assign("./index.php");
                        location.reload();
                        return html.username;
                    } else {
                        $("#message").html(html.response);
                    }
                },
                error: function (textStatus, errorThrown) {
                    console.log(textStatus);
                    console.log(errorThrown);
                },
                beforeSend: function () {
                    $("#message").html("<p class='text-center'><img src='images/ajax-loader.gif'></p>");
                }
            });
        }
        return false;
    });
});
