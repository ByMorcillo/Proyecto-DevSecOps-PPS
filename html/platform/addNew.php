<?php
include('checks.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create News</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Additional CSS styles */
    .container {
      margin-top: 50px;
    }
  </style>
</head>

<body>
  <nav style="background-color: #3586A4 !important;" class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">Cyberexp</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <!-- Inside the navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Add the user image -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="<?php echo htmlspecialchars($_SESSION['photo']); ?>" class="rounded-circle" alt="Profile" style="width: 35px; height: 35px; object-fit:cover;">
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
  <div class="container">
    <div id="contBtn" class="mb-4">
      <div class="row">
        <div class="col-md-6">
          <a href="main.php">
            <img src="../images/flecha.png" alt="Ir a Main" style="max-width: 100px;">
          </a>
        </div>
      </div>
    </div>

    <h1>Create News</h1>

    <form id="newsForm" action="insert_news.php" method="post">
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title" required>
      </div>
      <div class="form-group">
        <label for="content">Content:</label>
        <textarea class="form-control" id="content" name="content" style="height: 450px; resize: none;" rows="10" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Create News</button>
    </form>
  </div>

  <!-- Bootstrap JS and jQuery (optional) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../js/addNew.js"></script>
</body>

</html>