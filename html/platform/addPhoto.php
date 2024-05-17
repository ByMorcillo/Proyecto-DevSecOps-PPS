<?php
//Include the checks php
include('checks.php')

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Add Photo</title>
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
    </div>
    <div class="mt-5">
        <div class="row justify-content-center" style="width: 100% !important;">
                <div class="col-md-6">
                    <h5 class="mb-4">Upload a new Picture</h5>
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="user_photo">Select the image:</label>
                            <input type="file" class="form-control-file" name="user_photo" id="user_photo" onchange="previewImage()">
                        </div>
                        <div class="form-group text-center">
                            <img id="preview" class="mb-3 img-fluid" src="" alt="Preview of the image" style="height:500px; width:1000px;object-fit: cover;">
                        </div>
                        <div class="form-group text-center">
                            <button id="btnSave1" type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/addPhoto.js"></script>
</body>

</html>