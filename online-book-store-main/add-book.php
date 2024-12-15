<?php  
session_start();

# If the admin is logged in
if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {

	# Database Connection File
	include "db_conn.php";

    # Category helper function
	include "php/func-category.php";
    $categories = get_all_categories($conn);

	include "php/func-types.php";
	$types = get_all_types($conn);

    # author helper function
	include "php/func-author.php";
    $authors = get_all_author($conn);

	# CSS Helper Function
	include "css/style-bookstore.php";

    if (isset($_GET['title'])) {
    	$title = $_GET['title'];
    }else $title = '';

    if (isset($_GET['desc'])) {
    	$desc = $_GET['desc'];
    }else $desc = '';

    if (isset($_GET['category_id'])) {
    	$category_id = $_GET['category_id'];
    }else $category_id = 0;

	if (isset($_GET['price'])) {
		$price = $_GET['price'];
	}else $price = 0;

	if (isset($_GET['type_id'])) {
		$type_id = $_GET['type_id'];
	}else $type_id = 0;

    if (isset($_GET['author_id'])) {
    	$author_id = $_GET['author_id'];
    }else $author_id = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Book</title>

    <!-- bootstrap 5 CDN-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- bootstrap 5 Js bundle CDN-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</head>
<body>
	<div class="container">
		<div class = "row">
			<nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
			<div class="container-fluid">
				<a class="navbar-brand text-light fw-bolder" href="admin.php">Admin</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" 
					id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
					<a class="nav-link text-light rounded fw-bolder" 
						aria-current="page" 
						href="index.php">Store</a>
					</li>
					<li class="nav-item">
					<a class="nav-link text-light rounded fw-bolder" 
						href="add-book.php">Add Book</a>
					</li>
					<li class="nav-item">
					<a class="nav-link text-light rounded fw-bolder" 
						href="add-category.php">Add Category</a>
					</li>
					<li class = "nav-item">
						<a class = "nav-link text-light rounded fw-bolder" href = "add-type.php">Add Type</a>
					</li>
					<li class="nav-item">
					<a class="nav-link text-light rounded fw-bolder" 
						href="add-author.php">Add Author</a>
					</li>
					<li class="nav-item">
					<a class="nav-link text-light rounded fw-bolder" 
						href="logout.php">Logout</a>
					</li>
				</ul>
				</div>
			</div>
			</nav>
		</div>

		<div class = "row g-0 mt-5">
			<form action="php/add-book.php"
				method="post"
				enctype="multipart/form-data" 
				class="shadow p-4 rounded mt-5"
				style="width: 90%; max-width: 50rem;">

				<h1 class="text-center pb-5 display-4 fs-3">
					Add New Book
				</h1>
				<?php if (isset($_GET['error'])) { ?>
				<div class="alert alert-danger" role="alert">
					<?=htmlspecialchars($_GET['error']); ?>
				</div>
				<?php } ?>
				<?php if (isset($_GET['success'])) { ?>
				<div class="alert alert-success" role="alert">
					<?=htmlspecialchars($_GET['success']); ?>
				</div>
				<?php } ?>

				<div class="mb-3">
					<label class="form-label">Book Title</label>
					<input type="text" 
						class="form-control"
						value="<?=$title?>" 
						name="book_title"
						placeholder="Title">
				</div>

				<div class="mb-3">
					<label class="form-label">
						Book Description
						</label>
					<input type="text" 
						class="form-control" 
						value="<?=$desc?>"
						name="book_description"
						placeholder="Synopsis">
				</div>

				<div class="mb-3">
					<label class="form-label">
						Book Author
						</label>
					<select name="book_author"
							class="form-control">
							<option value="0">
								Select author
							</option>
							<?php 
							if ($authors == 0) {
								# Do nothing!
							}else{
							foreach ($authors as $author) { 
								if ($author_id == $author['id']) { ?>
								<option 
								selected
								value="<?=$author['id']?>">
								<?=$author['name']?>
								</option>
								<?php }else{ ?>
								<option 
									value="<?=$author['id']?>">
									<?=$author['name']?>
								</option>
						<?php }} } ?>
					</select>
				</div>

				<div class = "mb-3">
					<label class = "form-label">Book Type</label>
					<select name = "book_type" class = "form-control">
						<option value = "0">Select Type</option>
						<?php
						if ($types == 0){}
						else {
							foreach ($types as $type) {
								if ($type_id == $type['id']) { ?>
									<option selectedvalue = "<?=$type['id']?>"><?=$type['name']?></option>
									<?php } 
								else { ?>
									<option value = "<?=$type['id']?>"><?=$type['name']?></option>
									<?php } } }?>
					</select>
				</div>

				<div class="mb-3">
					<label class="form-label">
						Book Category
						</label>
					<select name="book_category"
							class="form-control">
							<option value="0">
								Select category
							</option>
							<?php 
							if ($categories == 0) {
								# Do nothing!
							}else{
							foreach ($categories as $category) { 
								if ($category_id == $category['id']) { ?>
								<option 
								selected
								value="<?=$category['id']?>">
								<?=$category['name']?>
								</option>
								<?php }else{ ?>
								<option 
									value="<?=$category['id']?>">
									<?=$category['name']?>
								</option>
						<?php }} } ?>
					</select>
				</div>

				<div class = "mb-3">
					<label class = "form-label">Book Price</label>
					<input type = "number"
						class = "form-control" 
						value = <?=$price?> 
						name = "book_price" 
						min = "10000"
						max = "1000000">
				</div>

				<div class="mb-3">
					<label class="form-label">
						Book Cover(JPG, PNG or JPEG)
						</label>
					<input type="file" 
						class="form-control" 
						name="book_cover">
				</div>

				<div class="mb-3">
					<label class="form-label">
						File PDF (Below 50 MB)
						</label>
					<input type="file" 
						class="form-control" 
						name="file"
						accept = ".pdf">
				</div>

				<button type="submit" 
						class="btn btn-primary">
						Add Book</button>
			</form>
		</div>
	</div>
</body>
</html>

<?php }else{
  header("Location: login.php");
  exit;
} ?>