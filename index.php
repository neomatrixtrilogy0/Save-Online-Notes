<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styling.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
    <title>Online Notes</title>
</head>
<body>
    <!--Nav Bar-->
    <nav role="navigation" class="navbar navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">Online Notes</a>
                <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle = "collapse">
                    <span class="sr-only">Toggle</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="navbarCollapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!--JumboTron After the navbar-->
    <div class="jumbotron" id="myContainer">
        <h1>Online Notes App</h1>
        <p>Your Notes with you wherever you go</p>
        <p>User Friendly and Safe!</p>
        <button type="button" class="btn btn-lg green signup">Sign up - It's free</button>
    </div>

    <!--Footer-->
    <div class="footer">
        <div class="container">
            <p>Created by yours truly AT &copy; <?php $today = date("Y"); echo $today; ?></p>
        </div>
    </div>

   
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

</body>
</html>