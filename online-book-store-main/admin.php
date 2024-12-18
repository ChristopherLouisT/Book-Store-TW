<?php
session_start();

# If the admin is logged in
if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {

    # Database Connection File
    include "db_conn.php";
	$cnt = new Connection();
	$conn = $cnt->getConn();

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
	<title>ADMIN</title>

    <!-- bootstrap 5 CDN-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- bootstrap 5 Js bundle CDN-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</head>
<body>
	<div class="container">
		<div class = "row">
			<?php include("menunavbarAdmin.php"); ?>
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

		<div>
			<?php if (isset($_GET['error'])) {?>
			<div class="alert alert-danger" role="alert">
				<?=htmlspecialchars($_GET['error']);?>
			</div>
			<?php }?>
			<?php if (isset($_GET['success'])) {?>
			<div class="alert alert-success" role="alert">
				<?=htmlspecialchars($_GET['success']);?>
			</div>
			<?php }?>


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
				<!-- List of all books -->
				<h4>All Books</h4>
				<table class="table table-bordered shadow">
					<thead>
						<tr>
							<th>No</th>
							<th>Title</th>
							<th>Author</th>
							<th>Description</th>
							<th>Category</th>
							<th>Type</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
				$i = 0;
        		foreach ($books as $book) {
            		$i++;?>
					<tr>
						<td><?=$i?></td>
						<td>
							<img width="100"
								src="uploads/cover/<?=$book['cover']?>" >
							<a  class="link-dark alink d-block
									text-center"
								href="uploads/files/<?=$book['file']?>">
							<?=$book['title']?>
							</a>

						</td>
						<td>
							<?php if ($authors == 0) {
					echo "Undefined";
				} else {
					foreach ($authors as $author) {
						if ($author['id'] == $book['author_id']) {
							echo $author['name'];
						}
					}
				}?>

				</td>
				<td><?=$book['description']?></td>
				<td>
					<?php if ($categories == 0) {
					echo "Undefined";
				} else {
					foreach ($categories as $category) {
						if ($category['id'] == $book['category_id']) {
							echo $category['name'];
						}
					}
				}
				?>
					</td>
					<td>
						<?php if ($types == 0) {
							echo "Undefined";
						} else {
							foreach ($types as $type) {
								if ($type['id'] == $book['type_id']) {
									echo $type['name'];
								}
							}
						}
						?>
					</td>
					<td>
						<a href="edit-book.php?id=<?=$book['id']?>"
						class="btn btn-warning">
						Edit</a>

						<a href="php/delete-book.php?id=<?=$book['id']?>"
						class="btn btn-danger">
						Delete</a>
					</td>

				</tr>
				<?php
				}?>
				</tbody>
			</table>
		<?php }?>

		<?php if ($types == 0) {?>
				<div class="alert alert-warning
							text-center p-5"
					role="alert">
					<img src="img/empty.png"
						width="100">
					<br>
				There is no types in the database
				</div>

			<?php } else {?>
			<!-- List of all types -->
			<h4 class="mt-5">All Types</h4>
			<table class="table table-bordered shadow">
				<thead>
					<tr>
						<th>No</th>
						<th>Type Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
				$j = 0;
				foreach ($types as $type) {
					$j++;?>
					<tr>
						<td><?=$j?></td>
						<td><?=$type['name']?></td>
						<td>
							<a href="edit-type.php?id=<?=$type['id']?>"
							class="btn btn-warning">
							Edit</a>

							<a href="php/delete-type.php?id=<?=$type['id']?>"
							class="btn btn-danger">
							Delete</a>
						</td>
					</tr>
					<?php
				}?>
				</tbody>
			</table>
			<?php }?>


			<?php if ($categories == 0) {?>
				<div class="alert alert-warning
							text-center p-5"
					role="alert">
					<img src="img/empty.png"
						width="100">
					<br>
				There is no category in the database
				</div>

			<?php } else {?>
			<!-- List of all categories -->
			<h4 class="mt-5">All Categories</h4>
			<table class="table table-bordered shadow">
				<thead>
					<tr>
						<th>No</th>
						<th>Category Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
				$j = 0;
				foreach ($categories as $category) {
					$j++;
					?>
					<tr>
						<td><?=$j?></td>
						<td><?=$category['name']?></td>
						<td>
							<a href="edit-category.php?id=<?=$category['id']?>"
							class="btn btn-warning">
							Edit</a>

							<a href="php/delete-category.php?id=<?=$category['id']?>"
							class="btn btn-danger">
							Delete</a>
						</td>
					</tr>
					<?php
				}?>
				</tbody>
			</table>
			<?php }?>


			<?php if ($authors == 0) {?>
				<div class="alert alert-warning
							text-center p-5"
					role="alert">
					<img src="img/empty.png"
						width="100">
					<br>
				There is no author in the database
				</div>
			<?php } else {?>
			<!-- List of all Authors -->
			<h4 class="mt-5">All Authors</h4>
			<table class="table table-bordered shadow">
				<thead>
					<tr>
						<th>Np</th>
						<th>Author Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$k = 0;
					foreach ($authors as $author) {
						$k++;
						?>
					<tr>
						<td><?=$k?></td>
						<td><?=$author['name']?></td>
						<td>
							<a href="edit-author.php?id=<?=$author['id']?>"
							class="btn btn-warning">
							Edit</a>

							<a href="php/delete-author.php?id=<?=$author['id']?>"
							class="btn btn-danger">
							Delete</a>
						</td>
					</tr>
					<?php
					}?>
				</tbody>
			</table>
			<?php }?>
			</div>
		</div> <!-- Row Div -->
	</div> <!-- Container Div -->
</body>
</html>

<?php
} else {
    header("Location: login.php");
    exit;
}?>
