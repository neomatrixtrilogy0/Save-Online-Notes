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
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
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
    $email = mysqli_real_escape_string($link, $email);
    $password = mysqli_real_escape_string($link, $password);
    // $password = md5($password); //will output 128bits -> 32 characters
    $password = hash('sha256', $password); //will output 256 -> 64 characters

    //check if username exists in the user table
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($link, $sql);

    if(!$result) {
        echo '<div class="alert alert-danger"> Error running the query</div>';
        echo '<div class="alert alert-danger">' . mysqli_error($link). '</div>';
        exit;
    }
    $results = mysqli_num_rows($result);
    if($results) {
        echo '<div class="alert alert-danger"> That username is alreay registered. Do you want to log in?</div>';
        exit;
    }

    //check if email exists
    $sql = "SELECT * FROM user WHERE username = '$email'";
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
    //byte: Unit of data = 8bits
    //bit = 0 or 1
    //16 bytes = 16 * 8 = 128 bits
    $activationKey = bin2hex(openssl_random_pseudo_bytes(16));

    //insert users details and activation code in the user table
    $sql = "INSERT INTO user (`username`, `email`, `password`, `activation`) VALUES('$username', '$email', '$password', '$activationKey')";
    $result = mysqli_query($link, $sql);

    if(!$result) {
        echo '<div class="alert alert-danger"> There was an error inserting the users details in the database</div>';
        exit;
    }

    //send the user an email with a link to activate.php with thier email and activation code
    $message = "Please click on this link to activate your account: \n\n";
    // $message .= "http://localhost/project/activate.php?email=" . urlencode($email) . "&key=$activationKey";
    
    if(mail($email, 'Confirm your registration', $message, 'From: ' . 'bondjames11110@gmail.com')) {
        echo "<div class='alert alert-success'> Thank you for registering! A confirmation email has been sent to $email. Please click on the activation link to activate your account.</div>";
    }

    





?>