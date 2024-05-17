<?php
//Start the session if not started
if(session_status() === PHP_SESSION_NONE){
    session_start();
};

//Terminate the session
session_unset();
session_destroy();

//Redirection to the login
header("Location: ../login.html");
exit;
?>