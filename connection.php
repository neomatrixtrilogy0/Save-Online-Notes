<?php
    //connect to database
    $link = mysqli_connect("localhost", "root", "", "onlinenotes");

    //check if connection to database is successful
    if(mysqli_connect_error()){
        die("Error: Unable to connect: " . mysqli_connect_error());
    }
?>