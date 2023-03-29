<?php
session_start();
if ( isset($_SESSION['user_id']) && ( basename($_SERVER['PHP_SELF']) != 'logout.php' ) ) {
	$logg = '<li><a href="logout.php">Logout</a></li>';
} else {
	$logg = '<li><a href="login.php">Login</a></li>';
}
if ( isset($_SESSION['user_id']) && ($_SESSION['user_id'] == 6) ) {
	$post =  '<li><a href = "newblogpost.php">Make a Post</a></li>';
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="head.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.typekit.net/fqq5ksl.css">
</head>
<body>
<header>

<nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
	<div class="container-fluid">
	<a class="navbar-brand" href="#">
			<img src="/logoimages/whitelogoonly.svg" alt="Bootstrap" width="100" height="24">
			<img src="/logoimages/whitetextonly1.svg" alt="Bootstrap" width="200" height="24">
	  <a class="navbar-brand" href="#"></a>
	  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav me-auto mb-2 mb-lg-0">
		  <li class="nav-item">
			<a class="nav-link active" aria-current="page" href="#">Home</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#">About Us</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#">Movies</a>
		  </li>
		  
		  <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			  Bonus Features
			</a>
			<ul class="dropdown-menu">
			  <li><a class="dropdown-item" href="#">Deleted Scenes</a></li>
			  <li><a class="dropdown-item" href="#">Bloopers</a></li>
			  <li><a class="dropdown-item" href="#">Director's Commentary</a></li>
			  <li><a class="dropdown-item" href="#">Behind the Scenes</a></li>
			  
			  <li><a class="dropdown-item" href="#">Games</a></li>
			</ul>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="register.php">Log In</a>
		  </li>
		  	<?php echo $logg; //Create a login/logout link ?>
			<?php echo $post; // Allow blog post if admin  ?>
		</ul>
		<form class="d-flex" role="search">
		  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
		  <button class="btn btn-outline-success" type="submit">Search</button>
		</form>
	  </div>
	</div>
  </nav>
</header>

