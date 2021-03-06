<?php
    //start session
    session_start();
    include('connection.php');

    //error messages
    $missingUsername = '<p><strong>Enter a username</strong></p>';
    $missingEmail = '<p><strong>Enter your email address</strong></p>';
    $InvalidEmail = '<p><strong>Enter a valid email address</strong></p>';
    $missingPassword = '<p><strong>Enter a password</strong></p>';
    $invalidPassword = '<p><strong>Enter a username</strong></p>';
    $differentPassword = '<p><strong>Your password should be at least 6 characters long and include one capital letter and one number</strong></p>';
    $missingPassword2 = '<p><strong>Passwords don\'t match</strong></p>';

    //get username
    if(!isset($_POST['username'])) {
        $errors .= $missingUsername;
    }else {
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    }

    //get email
    if(!isset($_POST['email'])) {
        $errors .= $missingEmail;
    }else {
        $email = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors .= $InvalidEmail;
        }
    }

    //get password
    if(!isset($_POST['password'])) {
        $errors .= $missingPassword;
    }elseif (!(strlen($_POST["password"]) > 6 and preg_match('/[A-Z]/', $_POST["password"]) and preg_match('/[0-9]/', $_POST["password"]))) {
        $errors .= $invalidPassword;
    }else {
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

        if(!isset($_POST['password2'])) {
            $errors .= $missingPassword2;
        }else {
            $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);

            if($password !== $password2) {
                $errors .= $differentPassword;
            }
        }
    }


?>