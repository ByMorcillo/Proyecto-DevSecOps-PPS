<?php
// Includes de db connection
include('conn.php');

// Getting post parameters
if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['dni']) && !empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['surname'])) {

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $dni = htmlspecialchars($_POST['dni']);
    $email = htmlspecialchars($_POST['email']);
    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);

    // Verificando si el correo electrónico es válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "err2";
        exit;
    }

    //Cheking the validity of the dni
    $cont = checkDNI($dni);
    if(!$cont){
        echo "err3";
        exit;
    }

    // Checking the validity of the password and encrypting it
    $cont = checkPassword($password);
    if(!$cont){
        echo "err4";
        exit;
    }else{
        //Turning plain text password to encrypted with sha256
        $pass2 = cipherPass($password);
    }


    try {
        $photo = "sopIlpGfeekppaeaigqav.png";
        // Preparing sql statement
        $stmt = $conn->prepare("INSERT INTO users ( username, password, dni, email, name, surname, photo) VALUES (:username, :password, :dni, :email, :name, :surname, :photo)");

        // Linking parameters
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $pass2);
        $stmt->bindParam(':dni', $dni);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':photo', $photo);


        // Executing the query
        $stmt->execute();

        echo "ok";
    } catch (PDOException $e) {
        //Catching errors
        $error1 = "Error al registrar el usuario: " . $e->getMessage();
        error_log($error1);
        echo "err5";
    }
} else {
    echo "err1";
}

//Function to check the password strength
function checkPassword($password)
{
    $passRegex = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/";

    if (!preg_match($passRegex, $password)) {
        return false;
    }
    return true;
}

//Function to check dni 

function checkDNI($dni)
{
    $dniRegex = "/^\d{8}[a-zA-Z]$/";

    if (!preg_match($dniRegex, $dni)) {
        return false;
    } else {
        $letter = substr($dni, -1);
        $numbers = substr($dni, 0, -1);

        if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numbers % 23, 1) == $letter && strlen($letter) == 1 && strlen($numbers) == 8) {
            return true;
        }
        return false;
    };
};

//Function to cipher the password
function cipherPass($password){
    return hash('sha256',$password);
}
