<?php
    //Include the checks and functions
include('functions.php');

//Class
$functions1 = new Functions1();

//
$target_dir = "../user_images/";

//Checking if theres a file
if (isset($_FILES['file']) && $functions1->isImage($_FILES['file'])) {


    // Changing filename to a random one
    $filename = htmlspecialchars(basename($_FILES["file"]["name"]));

    $newFileName = $functions1->changeRandomCharacters($filename);

    //Filepath where it'll be uploaded
    $target_file_path = $target_dir . $newFileName;

    // Move the file to the destiantion folder
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file_path)) {

        // DB connection to insert the new photo
        $id_user = htmlspecialchars($_SESSION['id_user']);

        try {
            // Preparing sql statement
            $stmt = $conn->prepare("INSERT INTO photos(filename,id_user) VALUES(:photo, :id);");

            // Linking parameters
            $stmt->bindParam(':photo', $newFileName);
            $stmt->bindParam(':id', $id_user);

            // Executing the query
            $stmt->execute();
            echo "ok";
        } catch (PDOException $e) {
            //Catching errors
            $error1 = "Error inserting the new photo: " . $e->getMessage();
            error_log($error1);
            echo "err3";
        }

    } else {
        echo "err2";
    }
} else {
    echo "err1";
    exit;
}
?>