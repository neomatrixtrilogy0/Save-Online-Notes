<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styling.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
    <title>Profile</title>

    <style>
        #container{
            margin-top: 100px;
        }
        #allNotes, #done, #notePad{
            display: none;
        }
        .buttons {
            margin-bottom: 20px;
        }
        textarea {
            width: 100%;
            max-width: 100%;
            font-size: 16px;
            line-height: 1.5em;
            border-left-width: 20px;
            border-color: #CA3DD9;
            color: #CA3DD9;
            background-color: #FBEFFF;
            padding: 10px;
        }
        tr {
            cursor: pointer;
        }
    </style>
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
                    <li ><a href="#">Profile</a></li>
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li class="active"><a href="#">My Notes</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Logged in as <b>username</b></a></li>
                    <li><a href="#">Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" id="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <h2>General Account Settings:</h2>
                <div class="table-responsive">
                    <table class="table table-hover table-condensed table-bordered">
                        <tr data-target="#updateusername" data-toggle="modal">
                            <td>Username</td>
                            <td>Value</td>
                        </tr>
                        <tr data-target="#updateemail" data-toggle="modal">
                            <td> Email</td>
                            <td>Value</td>
                        </tr>
                        <tr data-target="#updatepassword" data-toggle="modal">
                            <td>Password</td>
                            <td>hidden</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--Update username-->
    <form method="POST" id="updateusernameform">
        <div class="modal" id="updateusername" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!--Modal Header-->
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h4 id="myModalLabel">Edit Username</h4>
                    </div>
                    <!--Modal Body-->
                    <div class="modal-body">
                         <!--Login message from PHP Files-->
                        <div id="loginmessage"></div>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input class="form-control" type="text" name="username" maxlength="30" id="username" value="username value">
                        </div>
                    </div>

                    <!--Modal Footer-->
                    <div class="modal-footer">
                        <input type="submit" name="updateusername" id="updateusername" class="btn green" value="Submit">
                        <button type="button" class="btn btn-default " data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!--Update Email-->
    <form method="POST" id="updateemailform">
        <div class="modal" id="updateemail" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!--Modal Header-->
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h4 id="myModalLabel">Enter new email</h4>
                    </div>
                    <!--Modal Body-->
                    <div class="modal-body">
                         <!--Login message from PHP Files-->
                        <div id="loginmessage"></div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input class="form-control" type="email" name="email" maxlength="50" id="email" value="email value">
                        </div>
                    </div>

                    <!--Modal Footer-->
                    <div class="modal-footer">
                        <input type="submit" name="updateusername" id="updateusername" class="btn green" value="Submit">
                        <button type="button" class="btn btn-default " data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!--Update Password-->
    <form method="POST" id="updatepasswordform">
        <div class="modal" id="updatepassword" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!--Modal Header-->
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h4 id="myModalLabel">Enter Current and New Password</h4>
                    </div>
                    <!--Modal Body-->
                    <div class="modal-body">
                         <!--Login message from PHP Files-->
                        <div id="loginmessage"></div>
                        <div class="form-group">
                            <label for="currentpassword" class="sr-only">Your Current Password:</label>
                            <input class="form-control" type="password" name="currentpassword" maxlength="30" id="currentpassword" placeholder="Your Current Password">
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Choose a password</label>
                            <input class="form-control" type="password" name="password" maxlength="30" id="password" placeholder="Choose a password">
                        </div>
                        <div class="form-group">
                            <label for="password2" class="sr-only">Confirm Password:</label>
                            <input class="form-control" type="password" name="password2" maxlength="30" id="password2" placeholder="Confirm Password">
                        </div>
                    </div>

                    <!--Modal Footer-->
                    <div class="modal-footer">
                        <input type="submit" name="updateusername" id="updateusername" class="btn green" value="Submit">
                        <button type="button" class="btn btn-default " data-dismiss="modal">Cancel</button>
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
    <script src="profile.js"></script>
</body>
</html>