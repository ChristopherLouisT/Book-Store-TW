<?php
session_start();

# Database Connection File
include "db_conn.php";

# Book helper function
include "php/func-book.php";
$books = get_all_books($conn);

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

		<div class = "row g-0 mt-5">
			<form action="search.php"
				method="get"
				style="width: 100%; max-width: 30rem">

				<div class="input-group my-5">
					<input type="text"
							class="form-control"
							name="key"
							placeholder="Search Book..."
							aria-label="Search Book..."
							aria-describedby="basic-addon2">

					<button class="input-group-text
									btn btn-primary"
							id="basic-addon2">
							<img src="img/search.png"
								width="20">

					</button>
				</div>
		</form>

			<div class="d-flex pt-3">
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
							<a href="detail.php?id=<?=$book['id']?>"
							class="btn btn-success">Detail Book</a>
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
			<?php }?>

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

			</div>
		</div> <!-- Row Div -->
	</div> <!-- Container Div-->

	<!-- script js -->
	<script src="popup.js"></script>
	<script src="darkmode.js"></script>

</body>
</html>