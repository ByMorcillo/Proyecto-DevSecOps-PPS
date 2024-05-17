<?php
//Includes
include('functions.php');

//Creating instance of the class
$functions1 = new Functions1();
//Checking if the values are set

if (isset($_POST['currentPassword']) && isset($_POST['newPassword'])) {
    // Getting the values
    $currentPassword = htmlspecialchars($_POST['currentPassword']);
    $newPassword = htmlspecialchars($_POST['newPassword']);
    $id = $_SESSION['id_user'];
    try {
        // Getting the user information
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $tmp_user = $stmt->fetch(PDO::FETCH_ASSOC);

        //Cheking if the currentPassword is correct
        if (hash('sha256', $currentPassword) == $tmp_user['password']) {
            //Cheking the new password

            if ($functions1->checkPassword($newPassword)) {
                // Encrypting the password with sha256
                $pass2 = hash('sha256',$newPassword);

                //Updating the password of the user
                $stmt_update = $conn->prepare("UPDATE users SET password = :newPassword WHERE id = :id");
                $stmt_update->bindParam(':newPassword', $pass2);
                $stmt_update->bindParam(':id', $id);
                $stmt_update->execute();

                echo "ok";
            } else {
                echo "err4";
            }
        } else {
            echo "err3";
        }
    } catch (PDOException $e) {
        $error1 = "Error: " . $e->getMessage();
        error_log($error1);
        echo "err2";
    }
} else {
    //Returning ErrorCode
    echo "err1";
}


