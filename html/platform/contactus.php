<?php
// Includes de db connection
include('conn.php');

// Getting post parameters
if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    $ipaddr = htmlspecialchars($_SERVER['REMOTE_ADDR']);

    // Checking if the email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "err2";
        exit; // Termina la ejecución del script si el correo electrónico no es válido
    }

    try {
        // Preparing sql statement
        $stmt = $conn->prepare("INSERT INTO messages (name, email, message, ipaddr) VALUES (:name, :email, :message, :ipaddr)");

        // Linking parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':ipaddr', $ipaddr);

        // Executing the query
        $stmt->execute();

        echo "ok";
    } catch(PDOException $e) {
        //Catching errors
        $error1 = "Error al insertar el mensaje: " . $e->getMessage();
        error_log($error1);
        echo "err3";
    }
} else {
    echo "err1";
}

// Closing the connection
$conn = null;
?>
