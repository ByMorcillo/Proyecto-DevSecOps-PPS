<?php
    //Include
    include('checks.php');

    //Variable where will be stored the content
    $ct = "";
    // Check if 'id' parameter is received via POST
    if (isset($_POST['id'])) {
        // Get the news ID from the form
        $id = htmlspecialchars($_POST['id']);

        // Query to retrieve the news and user details
        $query = "SELECT n.title, n.content, u.name, u.surname 
                  FROM news n 
                  INNER JOIN users u ON n.id_user = u.id 
                  WHERE n.id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        
        // Check if the news is found
        if ($stmt->rowCount() > 0) {
            // Get the news and associated user details
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $title = $row['title'];
            $content = $row['content'];
            $name = $row['name'];
            $surname = $row['surname'];

            // Display the news in HTML format within the container
            $ct .= '<div class="card">';
            $ct .=  '<div class="card-header"><h4>' . $title . '</h4></div>';
            $ct .= '<div class="card-body">';
            $ct .= '<p class="card-text">' . $content . '</p>';
            $ct .=  '<p class="card-text">By ' . $name . ' ' . $surname . '</p>';
            $ct .=  '</div>';
            $ct .=  '</div>';
        } else {
            $ct .=  'No news found with the provided ID.';
        }
    } else {
        $ct .= 'No news ID provided.';
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>News</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom Styles -->
  <link rel="stylesheet" href="../css/spNew.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">Cyberexp</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      
      <!-- Inside the navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Add the user image -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo htmlspecialchars($_SESSION['photo']);?>" class="rounded-circle" alt="Profile" style="width: 35px; height: 35px; object-fit:cover;">
          </a>
          <!-- Defines the dropdown menu -->
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">My Profile</a>
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
<div id="contenedor" class="container">
<div id="contBtn" class="container mb-4">
    <div class="row">
        <div class="col-md-6">
            <a href="main.php">
                <img src="../images/flecha.png" alt="Ir a Main" style="max-width: 100px;">
            </a>
        </div>
    </div>
</div>

    <?php echo $ct;?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
