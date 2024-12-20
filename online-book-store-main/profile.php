<?php
session_start();

if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {

# Database Connection File
include "db_conn.php";
$cnt = new Connection();
$conn = $cnt->getConn();

# Book helper function
include "php/func-book.php";
$books = get_my_books($conn);

include "php/func-user.php";
$user = get_user($conn);

# author helper function
include "php/func-author.php";
$authors = get_all_author($conn);

include "php/func-types.php";
$types = get_all_types($conn);

# Category helper function
include "php/func-category.php";
$categories = get_all_categories($conn);

# CSS helper
include "css/style-bookstore.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Book Store</title>

    <!-- bootstrap 5 CDN-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- bootstrap 5 Js bundle CDN-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


</head>
<body>
	<div class="container">
		<div class = "row">
			<?php include("menunavbar.php"); ?>
		</div>


            <section id = "home">
                <div class = "row g-0 mt-1 pt-2 pb-3"></div>
                <div class = "row g-0 mt-5 pt-4 pb-5" style="background-color: rgb(46, 163, 187);">
                    <img class="img-fluid rounded-circle mx-auto mt-4 mb-2" 
                    style="width: 150px; height: 150px;" src="img/profile_default.jpg">
                    <h1 class = "display-4 text-light fw-bolder text-center"><?=$user['full_name']?></h1>
                    <h3 class = "text-light fw-bolder text-center">ーーーー⭐ーーーー</h3>
                    <h5 class = "text-center text-light"><?=$user['email']?></h5>
                </div>
            </section>
            
            <div class="row">
                <div class="d-flex pt-3 justify-content-center">
                    <?php if ($books == 0) {?>
                        <div class="alert alert-warning
                                text-center p-5"
                        role="alert">
                        <img src="img/empty.png"
                            width="100">
                        <br>
                        There is no book in the database
                    </div>
                    <?php } else {?>

                    <div class="pdf-list d-flex flex-wrap">
                        <?php foreach ($books as $book) {?>
                            <div class="card m-1 book-card" data-id="<?=$book['id']?>">
                            <img src="uploads/cover/<?=$book['cover']?>"
                                class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?=$book['title']?>
                                </h5>
                                <p class="card-text">
                                    <b>By:
                                        <?php foreach ($authors as $author) {
        if ($author['id'] == $book['author_id']) {
            echo $author['name'];
            break;
        }

    }?>
                                    <br></b>

                                    <b>Category:
                                        <?php foreach ($categories as $category) {
        if ($category['id'] == $book['category_id']) {
            echo $category['name'];
            break;
        }
    }?>
                                    <br></b>

                                    <b>Type:
                                        <?php foreach ($types as $type) {
        if ($type['id'] == $book['type_id']) {
            echo $type['name'];
            break;
        }
    }?>
                                    <br></b>
                                    <?=substr($book['description'], 0, 100) . "...";?>
                                </p>
                                <a href="uploads/files/<?=$book['file']?>"
                                class="btn btn-success fw-bolder">Open</a>

                                <a href="uploads/files/<?=$book['file']?>"
                                class="btn btn-primary fw-bolder"download=<?=$book['title']?>>Download</a>
                            </div>
                        </div>

                        <!-- Popup Element -->
                        <div class="book-popup" id="popup-<?=$book['id']?>">
                            <div class="popup-content">
                                <h4><?=$book['title']?></h4>
                                <p><?=$book['description']?></p>
                            </div>
                        </div>

                        <?php }?>
                        </div>
                    </div>
                </div>

			<?php }?>

</body>
</html>

<script src="popup.js"></script>
<script src="darkmode.js"></script>

<?php
} else {
    header("Location: loginCustomer.php");
    exit;
}?>