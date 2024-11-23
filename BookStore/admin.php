<?php
session_start();

#Buat biar ga bisa langsung akses page admin, harus login dulu
if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<body>
    <div class = "container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class = "container-fluid">
                <a class="navbar-brand" href="admin.php">Store Admin</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" arria-current = "page" href="index.php">Store</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Add Book</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Add Category</a>
                        </li>   
                        <li class="nav-item">
                            <a class="nav-link" href="#">Add Author</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </div>
</body>
</html>

<?php }
else {
    header("Location: login.php"); #Klo blom login dan mau akses, arahin ke login page
    exit;
} ?>