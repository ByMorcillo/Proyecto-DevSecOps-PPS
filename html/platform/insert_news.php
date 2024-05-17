<?php
include('checks.php');

// Verificar si se han recibido los parámetros por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se han recibido los parámetros esperados
    if (isset($_POST['title']) && isset($_POST['content'])) {
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            // Recibir los datos del formulario
            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['content']);

            // Obtener el ID de usuario de la sesión
            $id_user = $_SESSION['id_user'];

            // Insertar los datos en la base de datos usando PDO para evitar la inyección SQL
            $query = "INSERT INTO news (title, content, id_user) VALUES (:title, :content, :id_user)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':id_user', $id_user);

            if ($stmt->execute()) {
                echo "ok";
            } else {
                echo "err3";
            }
        } else {
            echo "err2";
        }
    } else {
        echo "err2";
    }
} else {
    echo "err1";
}
