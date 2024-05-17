<?php
//Checks
include('checks.php');
//Setting the section to photos
$_SESSION['section'] = "photos";

//Getting the user id
$id = htmlspecialchars($_SESSION['id_user']);
$ct = "";
//Making the default view
$ct .= '<div class="mb-4">';
$ct .= '<div class="row justify-content-end">';
$ct .= '<div class="col-md-6 text-right">';
$ct .= '<a id="btnAdd" href="addPhoto.php" class="btn btn-primary">Add a Photo</a>';
$ct .= '</div>';
$ct .= '</div>';
$ct .= '</div>';

//Getting the images of the user
try {
    // Sql query
    $query = "SELECT * FROM photos WHERE id_user = :id";
    $stmt = $conn->prepare($query);
    // Linking parameters
    $stmt->bindParam(':id', $id);

    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $photos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $ct .= '<div id="content2">';
        $ct .= '<div class="row">';
        // Mostrar las fotos en filas de 4 utilizando Bootstrap
        foreach ($photos as $p) {
            $ct .= '<div class="col-md-3 mb-4">';
            $ct .= '<div class="card">';
            $ct .= '<div class="card-body">';
            $ct .= '<img src="../user_images/' . $p['filename'] . '" class="img-fluid" style="object-fit:cover; width: 388px; height: 218.5px">';
            $ct .= '</div>';
            $ct .= '</div>';
            $ct .= '</div>';
        }
        $ct .= '</div>';
        $ct .= '</div>';
    } else {
        $ct .= "You don't have any photos uploaded!";
    };
    echo $ct;
} catch (PDOException $e) {
    $error = "Error: " . $e->getMessage();
    error_log($error);
    echo "err1";
} finally {
    // Cerrar la conexión
    $conexion = null;
}
