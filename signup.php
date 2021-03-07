<?php
    //start session
    session_start();
    include('connection.php');

    //error messages
    $missingUsername = '<p><strong>Enter a username</strong></p>';
    $missingEmail = '<p><strong>Enter your email address</strong></p>';
    $InvalidEmail = '<p><strong>Enter a valid email address</strong></p>';
    $missingPassword = '<p><strong>Enter a password</strong></p>';
    $invalidPassword = '<p><strong>Your password should be at least 6 characters long and include one capital letter and one number</strong></p>';
    $differentPassword = '<p><strong>Passwords don\'t match</strong></p>';
    $missingPassword2 = '<p><strong>Confirm your password</strong></p>';

    //get username
    if(empty($_POST['username'])) {
        $errors .= $missingUsername;
    }else {
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    }

    //get email
    if(empty($_POST['email'])) {
        $errors .= $missingEmail;
    }else {
        $email = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors .= $InvalidEmail;
        }
    }

    //get password
    if(empty($_POST['password'])) {
        $errors .= $missingPassword;
    }elseif (!(strlen($_POST["password"]) > 6 and preg_match('/[A-Z]/', $_POST["password"]) and preg_match('/[0-9]/', $_POST["password"]))) {
        $errors .= $invalidPassword;
    }else {
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

        if(empty($_POST['password2'])) {
            $errors .= $missingPassword2;
        }else {
            $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);

            if($password !== $password2) {
                $errors .= $differentPassword;
            }
        }
    }

    //check if there are any errors
    if($errors) {
        $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
        echo $resultMessage;
    }

    //if no errors, prepare for the queries
    $username = mysqli_real_escape_string($link, $username);
    $email = mysqli_real_escape_string($link, $username);
    $password = mysqli_real_escape_string($link, $username);

    //check if username exists in the user table
    $sql = "SELECT * FROM 'user' WHERE username = '$username'";
    $result = mysqli_query($link, $sql);

    if(!$result) {
        echo '<div class="alert alert-danger"> Error running the query</div>';
        exit;
    }
    $results = mysqli_num_rows($result);
    if($results) {
        echo '<div class="alert alert-danger"> That username is alreay registered. Do you want to log in?</div>';
        exit;
    }

    //check if email exists
    $sql = "SELECT * FROM 'user' WHERE username = '$email'";
    $result = mysqli_query($link, $sql);

    if(!$result) {
        echo '<div class="alert alert-danger"> Error running the query</div>';
        exit;
    }
    $results = mysqli_num_rows($result);
    if($results) {
        echo '<div class="alert alert-danger"> That email is alreay registered. Do you want to log in?</div>';
        exit;
    }

    //create a unique activation code
    




?>