<nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
<div class="container-fluid">
	<a class="navbar-brand text-light fw-bolder" href="index.php">Online Book Store</a>
	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></spa>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent" id="navbarSupportedContent">
	<ul class="navbar-nav me-auto mb-2 mb-lg-0">
		<li class="nav-item">
		<a class="nav-link text-light rounded fw-bolder active"
			aria-current="page"
			href="index.php">Store</a>
		</li>

		<li class="nav-item">
		<?php if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {?>
			<a class="nav-link text-light rounded fw-bolder"
			href="logoutCustomer.php">Logout</a>
		<?php } else {?>
		<a class="nav-link text-light rounded fw-bolder"
			href="signup.php">SignUp</a>
		<?php }?>
		</li>

		<li class="nav-item">
		<?php if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {?>
			<a class="nav-link text-light rounded fw-bolder"
			href="profile.php">Profile</a>
		<?php } else {?>
		<a class="nav-link text-light rounded fw-bolder"
			href="loginCustomer.php">Login</a>
		<?php }?>
		</li>

		<div class="d-flex">
			<!-- Tombol Dark Mode -->
			<button id="darkModeToggle" class="btn btn-outline-light ms-2">Dark Mode</button>
		</div>

	</ul>
	</div>
</div>
</nav>