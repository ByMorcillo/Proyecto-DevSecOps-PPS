<?php
$server = "localhost";
$user = "webuser";
$password = "root_lamp";
$bd = "cyberexp";

try{
    $conn = new PDO("mysql:host=".$server.";dbname=".$bd,$user,$password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}catch(PDOException $e){
    echo "Error de conexion " . $e->getMessage();
};

?>
