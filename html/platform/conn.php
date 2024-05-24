<?php
$server = "localhost";
$user = "id22215888_webuser";
$password = "Ceti2024#";
$bd = "id22215888_cyberexp";

try{
    $conn = new PDO("mysql:host=".$server.";dbname=".$bd,$user,$password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}catch(PDOException $e){
    echo "Error de conexion " . $e->getMessage();
};

?>
