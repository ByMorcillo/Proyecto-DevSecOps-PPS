<?php
session_start();
// Includes de db connection
include('conn.php');

// Getting post parameters
if (!empty($_POST['username']) && !empty($_POST['password'])) {

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    //Encryting password
    $pass2 = cipherPass($password);

    try {

        // Preparing sql statement
        $stmt = $conn->prepare("SELECT * FROM users where username = :username;");

        // Linking parameters
        $stmt->bindParam(':username', $username);

        // Executing the query
        $stmt->execute();
        $tmp_user = $stmt->fetch(PDO::FETCH_ASSOC);

        //Verifying the password
        if ($tmp_user && $pass2 === $tmp_user['password']) {
            $_SESSION['id_user'] = $tmp_user['id'];
            $_SESSION['photo'] = "../profile_images/" . $tmp_user['photo'];
            echo "ok";
            exit;
        } else {
            //Error the credentials are not correct
            echo "err2";
            exit;
        }
    } catch (PDOException $e) {
        //Catching errors
        $error1 = "Error login in: " . $e->getMessage();
        error_log($error1);
        echo "err3";
    }
} else {
    echo "err1";
}

function cipherPass($password)
{
    return hash('sha256', $password);
}
