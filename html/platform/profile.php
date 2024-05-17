<?php
//Include the checks
include('checks.php');

// Getting the user id
$id = htmlspecialchars($_SESSION['id_user']);

try {
    //Executing the query to get the values
    $query = "SELECT * FROM users where id = :id;";
    $stmt = $conn->prepare($query);
    // Linking parameters
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $tmp_user = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    //Catching errors
    $error1 = "Error getting the user: " . $e->getMessage();
    error_log($error1);
    echo "err3";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/profile.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Cyberexp</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo htmlspecialchars($_SESSION['photo']); ?>" class="rounded-circle" alt="Profile" style="width: 35px; height: 35px; object-fit:cover;">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="profile.php">My Profile</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4 mb-1">
        <div id="contBtn" class="row mb-2 justify-content-center">
            <div class="col-md-6">
                <div class="col-md-6">
                    <a href="main.php">
                        <img src="../images/flecha.png" alt="Ir a Main" style="max-width: 100px;">
                    </a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">User Profile</h5>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img src="<?php echo htmlspecialchars($_SESSION['photo']); ?>" style="height: 300px;width:300px; object-fit:cover;" class="mb-3 rounded-circle profile-image" alt="Profile Image">
                        </div>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" id="username" class="form-control" value='<?php echo $tmp_user['username']; ?>' readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" class="form-control" value="<?php echo $tmp_user['email']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" class="form-control" value="<?php echo $tmp_user['name']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="surname">Surname:</label>
                            <input type="text" id="surname" class="form-control" value="<?php echo $tmp_user['surname']; ?>" readonly>
                        </div>
                        <button id="btnChgPic" class="btn btn-primary" data-toggle="modal" data-target="#changeProfilePicture">Change Profile Picture</button>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#changePassword">Change Password</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para cambiar la foto de perfil -->
    <div class="modal fade" id="changeProfilePicture" tabindex="-1" role="dialog" aria-labelledby="changeProfilePictureLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changeProfilePictureLabel">Change Profile Picture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="user_photo">Select the new image:</label>
                                <input type="file" class="form-control-file" name="user_photo" id="user_photo" onchange="previewImage()">
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <img id="preview" class="mb-3 rounded-pill" src="" alt="Preview of the image" style="height:300px; width: 300px;object-fit:cover;">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="btnSave1" type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para cambiar la contraseña -->
    <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="changePasswordLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordLabel">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="currentPassword">Current Password</label>
                            <input type="password" class="form-control" id="currentPassword" placeholder="Enter current password">
                        </div>
                        <div class="form-group">
                            <label for="newPassword">New Password</label>
                            <input type="password" class="form-control" id="newPassword" placeholder="Enter new password">
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm New Password</label>
                            <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm new password">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="btnSave2" type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/profile.js"></script>
</body>

</html>