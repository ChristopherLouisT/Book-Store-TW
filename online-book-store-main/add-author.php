<?php  
session_start();

# If the admin is logged in
if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {

	# CSS Helper Function
	include "css/style-bookstore.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Author</title>

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
			<form action="php/add-author.php"
				method="post" 
				class="shadow p-4 rounded mt-5"
				style="width: 90%; max-width: 50rem;">

				<h1 class="text-center pb-5 display-4 fs-3">
					Add New Author
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
					<label class="form-label">
							Author Name
						</label>
					<input type="text" 
						class="form-control" 
						name="author_name">
				</div>

				<button type="submit" 
						class="btn btn-primary">
						Add Author</button>
			</form>
		</div>
	</div>
</body>
</html>

<?php }else{
  header("Location: login.php");
  exit;
} ?>