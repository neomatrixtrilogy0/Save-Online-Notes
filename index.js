//Ajax call for the sign up form
//Once the form is submitted
$("#signupform").submit(function(event) {
    //prevent default php processing 
    event.preventDefault();

    //collect user inputs
    var datatopost = $(this).serializeArray();
    console.log(datatopost);

    //send them to signup.php using AJAX
    $.ajax({
        url: "signup.php",
        type: "POST",
        data: datatopost,
        success: function(data) {
            if (data) {
                $("#signupmessage").html(data);
            }
        },
        error: function() {
            $("#signupmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    });
    
})

//Login form
$("#loginform").submit(function(event) {
    //prevent default php processing 
    event.preventDefault();

    //collect user inputs
    var datatopost = $(this).serializeArray();
    console.log(datatopost);

    //send them to signup.php using AJAX
    $.ajax({
        url: "login.php",
        type: "POST",
        data: datatopost,
        success: function(data) {
            if (data == "success") {
                window.location = "mainpageloggedin.php";
            }else {
                $('#loginmessage').html(data);
            }
        },
        error: function() {
            $("#signupmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    });
    
})