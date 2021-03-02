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
                    <li><a href="#loginModal" data-toggle="modal">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!--JumboTron After the navbar-->
    <div class="jumbotron" id="myContainer">
        <h1>Online Notes App</h1>
        <p>Your Notes with you wherever you go</p>
        <p>User Friendly and Safe!</p>
        <button type="button" class="btn btn-lg green signup" data-target="#signupModal" data-toggle="modal">Sign up - It's free</button>
    </div>

    <!--Login Form-->
    <form method="POST" id="loginform">
        <div class="modal" id="loginModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!--Modal Header-->
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h4 id="myModalLabel">Login:</h4>
                    </div>
                    <!--Modal Body-->
                    <div class="modal-body">
                         <!--Login message from PHP Files-->
                        <div id="loginmessage"></div>
                        <div class="form-group">
                            <label for="loginemail" class="sr-only">Email:</label>
                            <input class="form-control" type="email" name="loginemail" placeholder="Email" maxlength="50" id="loginemail">
                        </div>
                        <div class="form-group">
                            <label for="loginpassword" class="sr-only">Password:</label>
                            <input class="form-control" type="password" name="loginpassword" placeholder="Password" maxlength="30" id="loginpassword">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="rememberme" id="rememberme">
                                Remember me
                            </label>
                            <a class="pull-right" style="cursor: pointer;" data-dismiss="modal" data-target="#forgotpasswordModal" data-toggle="modal">Forgot Password?</a>
                        </div>
                        
                    </div>
                    <!--Modal Footer-->
                    <div class="modal-footer">
                        <input type="submit" name="login" id="login" class="btn green" value="Login">
                        <button type="button" class="btn btn-default " data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-target="#signupModal" data-toggle="modal">Register</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!--Sign Up Form-->
    <form method="POST" id="signupform">
        <div class="modal" id="signupModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h4 id="myModalLabel">Sign up today and start using our Online Notes App</h4>
                    </div>
                    <div class="modal-body">
                         <!--Sign up message from PHP Files-->
                        <div id="signupmessage"></div>

                        <div class="form-group">
                            <label for="username" class="sr-only">Username:</label>
                            <input class="form-control" type="text" name="username" placeholder="Username" maxlength="30" id="username">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email:</label>
                            <input class="form-control" type="email" name="email" placeholder="Email Address" maxlength="50" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Password:</label>
                            <input class="form-control" type="password" name="password" placeholder="Choose a password" maxlength="30" id="password">
                        </div>
                        <div class="form-group">
                            <label for="password2" class="sr-only">Confirm Password:</label>
                            <input class="form-control" type="password" name="password2" placeholder="Confirm password" maxlength="30" id="password2">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="signup" id="signup" class="btn green" value="Sign Up">
                        <button type="button" class="btn btn-default " data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!--Forgot Password Form-->
    <form method="POST" id="forgotpasswordform">
        <div class="modal" id="forgotpasswordModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!--Modal Header-->
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h4 id="myModalLabel">Forgot Password? Enter your email address:</h4>
                    </div>
                    <!--Modal Body-->
                    <div class="modal-body">
                         <!--Forgot password message from PHP Files-->
                        <div id="forgotpasswordmessage"></div>
                        <div class="form-group">
                            <label for="forgotemail" class="sr-only">Email:</label>
                            <input class="form-control" type="email" name="forgotemail" placeholder="Email" maxlength="50" id="forgotemail">
                        </div>
                    </div>
                    <!--Modal Footer-->
                    <div class="modal-footer">
                        <input type="submit" name="forgotpassword" id="forgotpassword" class="btn green" value="Submit">
                        <button type="button" class="btn btn-default " data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-target="signupModal" data-toggle="modal">Register</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

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