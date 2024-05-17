<?php
//Checks and include needed content
include('checks.php');

//Checking the section has value
if (!isset($_SESSION['section'])) {
  $_SESSION['section'] = "news";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cyberexp</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/news.css">
</head>

<body style="overflow-x: hidden;">

  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">Cyberexp</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a id="btnNews" class="nav-link" href="">News</a>
        </li>
        <li class="nav-item">
          <a id="btnPhotos" class="nav-link" href="">Photos</a>
        </li>
      </ul>

      <!-- Inside the navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Add the user image -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo htmlspecialchars($_SESSION['photo']);?>" class="rounded-circle" alt="Profile" style="width: 35px; height: 35px; object-fit:cover;">
          </a>
          <!-- Defines the dropdown menu -->
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="profile.php">My Profile</a>
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <main id="content" class="mt-5">
    
  </main>

  <!-- Bootstrap JS and jQuery (optional) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../js/main.js"></script>

</body>

</html>