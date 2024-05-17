<?php
//Checks
include('checks.php');
//Setting the
$_SESSION['section'] = "news";

//Variable that'll be echoed
$ct = "";

//Putting the div above the content that'll be displayed
$ct .='<div class="mb-4">';
$ct .='<div class="row justify-content-end">';
$ct .='<div class="col-md-6 text-right">';
$ct .='<a id="btnAdd" href="addNew.php" class="btn btn-primary">Add a New</a>';
$ct .='</div>';
$ct .='</div>';
$ct .='</div>';

// Consulta para obtener las noticias de la tabla 'news' junto con el nombre y apellido del usuario de la tabla 'users'
$query = "SELECT n.id ,n.title, n.content, u.name, u.surname FROM news n INNER JOIN users u ON n.id_user = u.id order by n.id";
$stmt = $conn->query($query);

// Comprobar si hay noticias
if ($stmt->rowCount() > 0) {
    $ct .= '<div id="content2">';
    $ct .= '<div class="row">';
    // Recorrer las noticias
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $ct .= '<div class="col-md-3 mb-3">';
        $ct .= '<div class="card">';
        $ct .= '<div class="card-body">';
        $ct .= '<h4 class="card-title">' . $row['title'] . '</h4>';
        // Truncar el contenido a 3 líneas y agregar puntos suspensivos si es necesario
        $content = $row['content'];
        $content_lines = explode("\n", wordwrap($content, 50));
        $truncated_content = implode("\n", array_slice($content_lines, 0, 3));
        $ct .= '<p class="card-text">' . nl2br($truncated_content);
        if (count($content_lines) > 3) {
            $ct .= '...'; // Enlazar a la noticia completa si es necesario
        }
        $ct .= '<form action="spNew.php" method="post">';
        $ct .= '<input type="hidden" name="id" value="' . $row['id'] . '">';
        $ct .= '<button type="submit" class="btn btn-primary">Read more</button>';
        $ct .= '</form>';
        $ct .= '</p>';
        $ct .= '<p class="card-text">By ' . $row['name'] . ' ' . $row['surname'] . '</p>'; // Mostrar el nombre y apellido del usuario
        $ct .= '</div>';
        $ct .= '</div>';
        $ct .= '</div>';
    }
    $ct .= '</div>';
    $ct .= '</div>';
} else {
    $ct .= "No hay noticias disponibles.";
    
}

echo $ct;

// Cerrar la conexión a la base de datos (si es necesario)
// $pdo = null;
