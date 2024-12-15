<?php 
session_start();

# If not author ID is set
if (!isset($_GET['id'])) {
	header("Location: index.php");
	exit;
}

# Get author ID from GET request
$id = $_GET['id'];

# Database Connection File
include "db_conn.php";

# Book helper function
include "php/func-book.php";
$books = get_books_by_author($conn, $id);

# author helper function
include "php/func-author.php";
$authors = get_all_author($conn);
$current_author = get_author($conn, $id);

# type helper function
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
	<title><?=$current_author['name']?></title>

    <!-- bootstrap 5 CDN-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- bootstrap 5 Js bundle CDN-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</head>
<body class="bg-light">

	<div class="container">
	<div class = "row">
			<nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
			<div class="container-fluid">
				<a class="navbar-brand text-light fw-bolder" href="index.php">Online Book Store</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse"
					id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
					<a class="nav-link text-light rounded fw-bolder active"
						aria-current="page"
						href="index.php">Store</a>
					</li>
					<li class="nav-item">
					<a class="nav-link text-light rounded fw-bolder"
						href="#">Contact</a>
					</li>
					<li class="nav-item">
					<a class="nav-link text-light rounded fw-bolder"
						href="#">About</a>
					</li>

					<li class="nav-item">
					<?php if (isset($_SESSION['user_id'])) {?>
						<a class="nav-link text-light rounded fw-bolder"
						href="logoutCustomer.php">Logout</a>
					<?php } else {?>
					<a class="nav-link text-light rounded fw-bolder"
						href="signup.php">SignUp</a>
					<?php }?>
					</li>

					<li class="nav-item">
					<?php if (isset($_SESSION['user_id'])) {?>
						<a class="nav-link text-light rounded fw-bolder"
						href="#">Profile</a>
					<?php } else {?>
					<a class="nav-link text-light rounded fw-bolder"
						href="loginCustomer.php">Login</a>
					<?php }?>
					</li>

				</ul>
				</div>
			</div>
			</nav>
		</div>

		<div class = "row g-0 mt-5">
			<h1 class="display-4 fs-3 my-5"> 
				<a href="index.php"
				class="nd">
					<img src="img/back-arrow.PNG" 
						width="35">
				</a>
			<?=$current_author['name']?>
			</h1>
		
		
			<div class="d-flex pt-3">
				<?php if ($books == 0){ ?>
					<div class="alert alert-warning 
							text-center p-5" 
					role="alert">
					<img src="img/empty.png" 
						width="100">
					<br>
					There is no book in the database
				</div>
				<?php }else{ ?>

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
								<?= substr($book['description'], 0, 100) . "..."; ?>
							</p>
							<a href="detail.php?id=<?=$book['id']?>"
							class="btn btn-success">Buy Book</a>
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
			<?php } ?>

				<div class="col-lg-2 ms-auto">

					<div class="category">
						<!-- List of types -->
						<div class="list-group">
							<?php if ($types == 0) {
								// do nothing
							} else {?>
							<a href="#"
							class="list-group-item list-group-item-action active">Type</a>
							<?php foreach ($types as $type) {?>

							<a href="type.php?id=<?=$type['id']?>"
								class="list-group-item list-group-item-action">
								<?=$type['name']?></a>
							<?php }}?>
						</div>

						<!-- List of categories -->
						<div class="list-group mt-5">
							<?php if ($categories == 0) {
								// do nothing
							} else {?>
							<a href="#"
							class="list-group-item list-group-item-action active">Category</a>
							<?php foreach ($categories as $category) {?>

							<a href="category.php?id=<?=$category['id']?>"
								class="list-group-item list-group-item-action">
								<?=$category['name']?></a>
							<?php }}?>
						</div>

						<!-- List of authors -->
						<div class="list-group mt-5">
							<?php if ($authors == 0) {
								// do nothing
							} else {?>
							<a href="#"
							class="list-group-item list-group-item-action active">Author</a>
							<?php foreach ($authors as $author) {?>

							<a href="author.php?id=<?=$author['id']?>"
								class="list-group-item list-group-item-action">
								<?=$author['name']?></a>
							<?php }}?>
						</div>
					</div>
					
				</div>
			</div> <!-- Test-->
		</div>
	</div>

	<!-- script js popup -->
	<script> 
	    document.addEventListener('DOMContentLoaded', () => {
	        const bookImages = document.querySelectorAll('.book-card img.card-img-top');
		
	        bookImages.forEach(image => {
	            const bookId = image.closest('.book-card').getAttribute('data-id');
	            const popup = document.getElementById(`popup-${bookId}`);

	            image.addEventListener('click', () => {
	                popup.style.display = 'flex';
	            });

	            popup.addEventListener('click', () => {
	                popup.style.display = 'none';
	            });
	        });
	    });
	</script>
	
</body>
</html>
