<?php
session_start();

    // Unset session variables
    unset($_SESSION['user_id']);
    unset($_SESSION['user_name']);

    // Destroy session
    session_destroy();

    // Redirect to login page
    echo '<script>window.location.replace("http://localhost/100/index.php")</script>';
  
    exit();

?>
