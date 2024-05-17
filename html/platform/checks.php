<?php
    session_start();
    //Including the db connection
    include('conn.php');
    //Checking if the user has been loggen in
    if (!isset($_SESSION['id_user'])) {
      //Redirection to the login to authenticate
      header("Location: ../login.html");
      exit;
    };
?>