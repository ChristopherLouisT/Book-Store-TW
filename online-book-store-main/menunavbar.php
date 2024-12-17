<?php

if (isset($_SESSION['jenis_user'])) { // sudah login

    if ($_SESSION['jenis_user'] == "admin") { // admin
        ?>
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
<?php
} else { // user
?>
            <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
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

					<div class="d-flex">
					    <!-- Tombol Dark Mode -->
    					<button id="darkModeToggle" class="btn btn-outline-light ms-2">Dark Mode</button>
					</div>

				</ul>
				</div>
			</div>
			</nav>
<?php 
    }
} else { // belum login
?>
            <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
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

					<div class="d-flex">
					    <!-- Tombol Dark Mode -->
    					<button id="darkModeToggle" class="btn btn-outline-light ms-2">Dark Mode</button>
					</div>

				</ul>
				</div>
			</div>
			</nav>
<?php 
}
