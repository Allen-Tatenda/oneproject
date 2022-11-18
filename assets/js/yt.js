$(document).ready(function() {

    $("#username").val("Type your username here");
    $("#password").val("");


    $("#username").on("focus", function() {
        $username = $("#username").val();

        if ($username == "Type your username here") {
            $("#username").val("");
        }


    });




    $("#password").on("input", function() {

        //alert("efjiudfi");
        $username = $("#username").val();
        $pwd = $("#password").val();
        $login = "login";


        if ($username == "") {
            $(".login-error").text("Username can not be empty!!!");
        } else if ($pwd == "") {
            $(".login-error").text("Password can not be empty!!!");
        } else {
            $.post("login.php", { "username": $username, "password": $pwd, "login": $login }, function($result) {

                $(".login-error").html($result);
            });
        }
    });

});