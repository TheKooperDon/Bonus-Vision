<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.typekit.net/fqq5ksl.css">

  </head>
  <body>
<?php
/*
include('header.php');
include('mysqli_connect.php');
If a user name is entered display login mesage
	if (isset($_SESSION['username'])) {
		echo "You are currently logged in as {$_SESSION['username']}. Welcome to Bonus Vision!";
}

// Same Page Delete Code
if (isset($_GET['delete_id']) && (isset($_SESSION['user_id']) && ($_SESSION['user_id'] ==6))){
    $delete_id = mysqli_real_escape_string($dbc, trim($_GET['delete_id'])) ;
	
	$delete_query = "DELETE FROM blogposts WHERE blogpost_id = " . $delete_id;
	$delete_results = mysqli_query($dbc,$delete_query);
	if ($delete_results){
		echo "<h3 style=\"background-color:red;text-align:center;font-size: 100px;\">YO COMMENT GO BYE BYE</h3>";
	}	
}
else{
    //$delete_id = "";
}

//***********************************************
//PAGINATION SETUP START
//From Textbook Script 10.5 - #5
//***********************************************

// Number of records to show per page:
$display = 3;

// Determine how many pages there are...
if (isset($_GET['p']) && is_numeric($_GET['p'])) { // Already been determined.
$pages = $_GET['p'];
} else { // Need to determine.
// Count the number of records:
$q = "SELECT COUNT(blogpost_id) FROM blogposts";
$r = mysqli_query ($dbc, $q);
$rowp = mysqli_fetch_array ($r, MYSQLI_NUM);
$records = $rowp[0];
// Calculate the number of pages...
if ($records > $display) { // More than 1 page.
$pages = ceil ($records/$display);
} else {
$pages = 1;
}
} // End of p IF.

// Determine where in the database to start returning results...
if (isset($_GET['s']) && is_numeric($_GET['s'])) {
$start = $_GET['s'];
} else {
$start = 0;
}


echo "ITS BLOG POST TIME! <br><br>";



//***********************************************
//PAGINATION SETUP END

//***********************************************


//***********************************************
//SORTING SETUP START

//***********************************************
// Determine the sort...
// Default is by registration date.
$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'date';

// Determine the sorting order:
switch ($sort) {
	
	
case 'recent':
$order_by = 'blogpost_timestamp DESC';
break;

case 'oldest':
$order_by = 'blogpost_timestamp ASC';
break;

default:
$order_by = 'blogpost_timestamp DESC';
$sort = 'recent';
break;

}

//Sort buttons
echo '<div align="center">';
echo '<strong> Sort By: </strong>';
echo '<a href="?sort=recent">Most Recent</a> |';
echo '<a href="?sort=oldest">Oldest</a> |';

echo '</div>';

//***********************************************
//SORTING SETUP END
//***********************************************

$query = "SELECT * FROM blogposts ORDER BY $order_by LIMIT $start, $display";

$results = mysqli_query($dbc,$query); 


while ($row = mysqli_fetch_array($results,MYSQLI_ASSOC)){
	echo $row['fname'] . " " . $row['lname'] . "is: <br> ";
	echo $row['comment'] . " <br>";
	echo "Guestbook ID is " . $row['guestbook_id'] . " <br><br><br> ";
	
echo "<div class=\"w3-card-4\" style=\"width:30%; margin:auto;\">";
echo "<header class=\"w3-container w3-blue\">";
echo "<h1>" . $row['blogpost_title'] . "</h1>";
echo "</header>";
echo "<div class=\"w3-container\">";
echo "<p>" . $row['blogpost_body'] . "</p>";
echo "</div>";
echo "<footer class=\"w3-container w3-blue\">";
echo "<h5>" . $row['blogpost_timestamp'] . "</h5>";
echo "<h6>";
echo "<a href='viewcomments.php?blogpost_id=" . $row['blogpost_id'] . "'>Comments</a> | ";

//lock this 
//only admin
if ((isset($_SESSION['user_id']) && ($_SESSION['user_id'] ==6))){
	echo "<a href='update.php?blogpost_id=" . $row['blogpost_id'] . "'>Update Blog Post</a> | ";
}	
//only admin
if ((isset($_SESSION['user_id']) && ($_SESSION['user_id'] ==6))){
	echo "<a href='index.php?delete_id=" . $row['blogpost_id'] . "'>Delete a Post</a> | ";  
}
//any logged in person
if (isset($_SESSION['user_id'])) {
echo "<a href='newcomment.php?blogpost_id=" . $row['blogpost_id'] . "'>Post a Comment</a> | ";  
}
echo"</h6>";
echo "</footer>";
echo "</div><br><br>";

}


//***********************************************
//PAGINATION PREVIOUS AND NEXT PAGE BUTTONS/LINKS START
//***********************************************

// Make the links to other pages, if necessary.

echo "<div class=\"pagenumbers\" ";

if ($pages > 1) {

echo '<br /><p>';
$current_page = ($start/$display) + 1;

// If it's not the first page, make a Previous button:
if ($current_page != 1) {
echo '<a href="?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a> ';
}

// Make all the numbered pages:
for ($i = 1; $i <= $pages; $i++) {
if ($i != $current_page) {
echo '<a href="?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a> ';
} else {
echo $i . ' ';
}
} // End of FOR loop.

// If it's not the last page, make a Next button:
if ($current_page != $pages) {
echo '<a href="?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a>';
}

echo '</p>'; // Close the paragraph.

} // End of links section.

echo "</div>";
*/
?>
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
                <a class="nav-link" href="aboutus.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="movies.html">Movies</a>
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
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
    </header>
    <main>
    
    <div class="container bg-img text-white py-4 mb-4" style="background-image: url('/logoimages/futurepattern.jpeg');">
        <h1>Welcome to Bonus Vision</h1>
        <p class="lead">Say goodbye to remotes and get closer to your favorite shows on any streaming service.</p>
    </div>
    <div class="container text-left mt-5">
        <h2>Why Bonus Vision?</h2>
        <p class="lead">Accessing Bonus Feature content without physical media is currently not possible in this streaming age that we are in. With Bonus Vision we provide a convenient and easy to navigate platform that holds all the missing content from your favorite movies in one location.</p>
        <h2>Bonus Features</h2>
    </div>
    <div class="container">
      <div class="row row-cols-1 row-cols-md-1 g-4">
        <div class="col">
          <div class="card bg-dark text-center">
            <h5 class="card-header text-white">Deleted Scenes</h5>
            <div class="embed-responsive embed-responsive-16by9 p-3">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
            </div>
            <div class="embed-responsive embed-responsive-16by9 p-3">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card bg-dark text-center">
            <h5 class="card-header text-white">Bloopers</h5>
            <div class="embed-responsive embed-responsive-16by9 p-3">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
            </div>
            <div class="embed-responsive embed-responsive-16by9 p-3">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card bg-dark text-center">
            <h5 class="card-header text-white">How it was Made</h5>
            <div class="embed-responsive embed-responsive-16by9 p-3">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
            </div>
            <div class="embed-responsive embed-responsive-16by9 p-3">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container text-left mt-5">
   
    <h2>Movies</h2>
    <p>Here at Bonus Vision we have collected a wide variety of Bonus Feature content from all the movies you love, such as the ones listed below.</p>

    <div class="container">
      <div class="row">
        <div class="col-1">
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
        </div>
        <div class="col-10">
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                  <div class="col-2">
                    <img src="/moviedvdcovers/shrek2.jpg" alt="DVD 1">
                  </div>
                  <div class="col-2">
                    <img src="/moviedvdcovers/shrek2.jpg" alt="DVD 2">
                  </div>
                  <div class="col-2">
                    <img src="/moviedvdcovers/shrek2.jpg" alt="DVD 3">
                  </div>
                  <div class="col-2">
                    <img src="/moviedvdcovers/shrek2.jpg" alt="DVD 4">
                  </div>
                  <div class="col-2">
                    <img src="/moviedvdcovers/shrek2.jpg" alt="DVD 5">
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                  <div class="col-2">
                    <img src="/moviedvdcovers/shrek2.jpg" alt="DVD 6">
                  </div>
                  <div class="col-2">
                    <img src="/moviedvdcovers/shrek2.jpg" alt="DVD 7">
                  </div>
                  <div class="col-2">
                    <img src="/moviedvdcovers/shrek2.jpg" alt="DVD 8">
                  </div>
                  <div class="col-2">
                    <img src="/moviedvdcovers/shrek2.jpg" alt="DVD 9">
                  </div>
                  <div class="col-2">
                    <img src="/moviedvdcovers/shrek2.jpg" alt="DVD 10">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-1">
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
    <h2>What are you waiting for? Sign up now!</h2>
    <button type="button">Sign me up!</button>
  
    </div>

    </main>
    <footer>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</html>


<!--
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.typekit.net/fqq5ksl.css">

  <style>
    h1 {
      padding-top: 50px;
      font-family: "futura-pt-bold", sans-serif;
      font-weight: 700;
      font-style: normal;
    }
    h2{
      
      font-family: "futura-pt", sans-serif;
      font-weight: 700;
      font-style: normal;
    }
    h3{
      font-family: "futura-pt", sans-serif;
      font-weight: 400;
      font-style: normal;
    }
    .bg-blue {
       background-color: blue;
      padding: 10px; /* Add some padding to create space between the boxes */
    }
    .section-box {
    padding: 1rem;
    background-color: blue;
    border-radius: 0.5rem;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    text-align: center;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.py-4 {
  padding-top: 1.5rem;
  padding-bottom: 1.5rem;
  padding: 1rem;
  background-color: blue;
  border-radius: 0.5rem;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  text-align: center;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  
}


  </style>
  </head>
  <body>
    <script>
      var myCarousel = document.querySelector('#carouselExampleControls')
      var carousel = new bootstrap.Carousel(myCarousel, {
        interval: false,
        wrap: false
      })
    </script>
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
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
    </header>
    <main>
    
    <div class="container bg-img text-white py-4 mb-4" style="background-image: url('/logoimages/futurepattern.jpeg');">
        <h1>Welcome to Bonus Vision</h1>
        <p class="lead">Say goodbye to remotes and get closer to your favorite shows on any streaming service.</p>
    </div>
    <div class="container text-left mt-5">
        <h2>Why Bonus Vision?</h2>
        <p class="lead">Accessing Bonus Feature content without physical media is currently not possible in this streaming age that we are in. With Bonus Vision we provide a convenient and easy to navigate platform that holds all the missing content from your favorite movies in one location.</p>
        <h2>Bonus Features</h2>
    </div>
    <div class="container">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card bg-dark text-center">
            <h5 class="card-header text-white">Deleted Scenes</h5>
            <div class="embed-responsive embed-responsive-16by9 p-3">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
            </div>
            <div class="embed-responsive embed-responsive-16by9 p-3">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card bg-dark text-center">
            <h5 class="card-header text-white">Bloopers</h5>
            <div class="embed-responsive embed-responsive-16by9 p-3">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
            </div>
            <div class="embed-responsive embed-responsive-16by9 p-3">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card bg-dark text-center">
            <h5 class="card-header text-white">How it was Made</h5>
            <div class="embed-responsive embed-responsive-16by9 p-3">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
            </div>
            <div class="embed-responsive embed-responsive-16by9 p-3">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container text-left mt-5">
   
    <h2>Movies</h2>
    <p>Here at Bonus Vision we have collected a wide variety of Bonus Feature content from all the movies you love, such as the ones listed below.</p>
    <div class="container">
      <div class="row">
        <div class="col-1">
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
        </div>
        <div class="col-10">
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                  <div class="col-2">
                    <img src="/moviedvdcovers/shrek2.jpg" alt="DVD 1">
                  </div>
                  <div class="col-2">
                    <img src="/moviedvdcovers/shrek2.jpg" alt="DVD 2">
                  </div>
                  <div class="col-2">
                    <img src="/moviedvdcovers/shrek2.jpg" alt="DVD 3">
                  </div>
                  <div class="col-2">
                    <img src="/moviedvdcovers/shrek2.jpg" alt="DVD 4">
                  </div>
                  <div class="col-2">
                    <img src="/moviedvdcovers/shrek2.jpg" alt="DVD 5">
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                  <div class="col-2">
                    <img src="/moviedvdcovers/shrek2.jpg" alt="DVD 6">
                  </div>
                  <div class="col-2">
                    <img src="/moviedvdcovers/shrek2.jpg" alt="DVD 7">
                  </div>
                  <div class="col-2">
                    <img src="/moviedvdcovers/shrek2.jpg" alt="DVD 8">
                  </div>
                  <div class="col-2">
                    <img src="/moviedvdcovers/shrek2.jpg" alt="DVD 9">
                  </div>
                  <div class="col-2">
                    <img src="/moviedvdcovers/shrek2.jpg" alt="DVD 10">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-1">
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
    <h2>What are you waiting for? Sign up now!</h2>
    <button type="button">Sign me up!</button>
  
    </div>

    </main>
    <footer>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</html>

-->