<?php
include('checks.php');

class Functions1{
//Function to randomise the filename
 function changeRandomCharacters($filename) {
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $filenameWithoutExtension = pathinfo($filename, PATHINFO_FILENAME);
    $timestamp = time();
    $randomTimestamp = '';
    
    // Replace each digit in the timestamp with a random letter or digit
    $timestampDigits = str_split((string)$timestamp);
    foreach ($timestampDigits as $digit) {
        if (ctype_digit($digit)) {
            // Replace digits with random letters or digits
            $randomTimestamp .= chr(rand(97, 122)); // Generate a random lowercase letter
        } else {
            // Keep non-digit characters unchanged
            $randomTimestamp .= $digit;
        }
    }
    
    $length = strlen($filenameWithoutExtension);
    $randomFilename = '';
    for ($i = 0; $i < $length; $i++) {
        $character = $filenameWithoutExtension[$i];
        if (ctype_alpha($character)) { // Check if the character is a letter
            $newCharacter = chr(rand(97, 122)); // Generate a random lowercase letter
            if (ctype_upper($character)) { // Keep uppercase letters
                $newCharacter = strtoupper($newCharacter);
            }
            $randomFilename .= $newCharacter;
        } else {
            $randomFilename .= $character; // Keep other characters unchanged
        }
    }
    return preg_replace('/[^A-Za-z0-9\-]/', '', $randomFilename) . $randomTimestamp . '.' . $extension;
}


//Function to check if is an image
function isImage($file) {
    // Array with permitted image extensions
    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif', 'bmp');

    // Get the file extension
    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    // Check if the extension is allowed
    if (!in_array($extension, $allowed_extensions)) {
        echo "err"; // Echo 'err' if the extension is not allowed
        return false;
    }

    // Get the first bytes of the file (magic bytes)
    $first_bytes = file_get_contents($file['tmp_name'], false, null, 0, 4);

    // Array with magic bytes for different image formats
    $magic_bytes = array(
        "jpg" => "\xFF\xD8\xFF",
        "jpeg" => "\xFF\xD8\xFF",
        "png" => "\x89\x50\x4E\x47",
        "gif" => "GIF",
        "bmp" => "BM"
    );

    // Check if the first bytes match the magic bytes of any known image format
    if (isset($magic_bytes[$extension]) && strncmp($first_bytes, $magic_bytes[$extension], 3) === 0) {
        return true; 
    } else {
        return false;
    }
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
}

//Function to cipher the password
function cipherPass($password){
    return hash('sha256',$password);
}
};
?>