<?php
    //user is re-directed to this file after clicking the activation link

    //signup link contains two GET parameters: email and activation key
    session_start();
    include(connection.php);

    
?>

<!doctype html>
<html lang="en">
  <head>
      
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Account Activation</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
      
      <style>
         h1 {
             color: purple;
         }
         .contactForm {
             border: 1px solid #7c73f6;
             margin-top: 50px;
             border-radius: 15px;
         }
      
      </style>
  </head>
  <body>
      <div class="container-fluid">
          <div class="row">
              <div class="col-sm-offset-1 col-sm-10 contactForm">
                  <h1>Account Activation:</h1>

                  <?php
                    //if email or activation key is missing, show an error
    if(!isset($_GET['email']) || !isset($_GET['key'])) {
        echo '<div class="alert alert-danger"> There was an error. Please click on the activation you received by email.</div>';
        exit;
    }

    //if no errors found, store them in two variables
    $email = $_GET['email'];
    $key = $_GET['key'];

    //prepare variables for the query
    $email = mysqli_real_escape_string($link, $email);
    $key = mysqli_real_escape_string($link, $key);

    //Run query: set activation field to "activated" for the provided email
    $sql = "UPDATE user SET activation ='activate' WHERE  (email='$email' AND activation='$key') LIMIT 1";
    $result = mysqli_query($link, $sql);

    //check if the query is successful, show success message and invite user to login 
    if(mysqli_affected_rows($link) == 1) {
        echo '<div class="alert alert-success"> Your account has been activated.</div>';
        echo '<a href="index.php" type="button" class="btn-lg btn-success">Log in</a>';
    } else {
        echo '<div class="alert alert-danger"> Your account could not been activated, please try again later.</div>';
    }
                  ?>
                  

              </div>

          </div>
        
      
      </div>
    

  
      

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
      
     
  
  </body>
</html>

