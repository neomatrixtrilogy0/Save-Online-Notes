<?php
    //start session
    session_start();

    //connect to database
    include("connection.php");

    //Define error messages
    $missingEmail = '<p><strong>Enter your email address</strong></p>';
    $missingPassword = '<p><strong>Enter your password</strong></p>';

    //get email 
    if(empty($_POST['loginemail'])) {
        $errors .= $missingEmail;
    }else {
        $email = filter_var($_POST['loginemail'], FILTER_SANITIZE_EMAIL);
    }

    //and password
    if(empty($_POST['loginpassword'])) {
        $errors .= $missingPassword;
    }else {
        $password = filter_var($_POST['loginpassword'], FILTER_SANITIZE_STRING);
    }

    //check if there are any errors
    if($errors) {
        $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
        echo $resultMessage;
    } else {
        //if there are no errors
        $email = mysqli_real_escape_string($link, $email);
        $password = mysqli_real_escape_string($link, $password);
        // $password = md5($password); //will output 128bits -> 32 characters
        $password = hash('sha256', $password); //will output 256 -> 64 characters
   

    //Run query to check combination of email and password exists
    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password' AND activation='activated'";
    $result = mysqli_query($link, $sql);

    if(!$result) {
        echo '<div class="alert alert-danger"> Error running the query</div>';
        exit;
    }


    //if email and password don't match, print an error
    $count = mysqli_num_rows($result);
    if($count !== 1) {
        echo '<div class="alert alert-danger"> Wrong username or password</div>';
    } else {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];

        //if user didn't chooses remember me box
        if(empty($_POST['rememberme'])) {
            echo 'Success';
        } else {

        }
    }
}
?>