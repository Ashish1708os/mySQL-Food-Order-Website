<?php 
    // Authorication - access control
    // check weather the user is logged in or not
    if(!isset($_SESSION['user'])){ // user session is not set
        // user is not logged in 
        // redirect to login page with msg
        $_SESSION['no-login-msg'] = "<div class='error'>Please Login to access Admin Panel</div?";
        header("location:".SITEURL."admin/login.php");

    }
