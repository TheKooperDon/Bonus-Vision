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
  <?php include('header.php'); ?>
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
      <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-3 g-4">
        <div class="col">
          <div class="card bg-dark text-center">
            <h5 class="card-header text-white">Deleted Scenes</h5>
            <div class="embed-responsive embed-responsive-16by9 embed-responsive-sm p-3">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
            </div>
            <div class="embed-responsive embed-responsive-16by9 embed-responsive-sm p-3">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card bg-dark text-center">
            <h5 class="card-header text-white">Bloopers</h5>
            <div class="embed-responsive embed-responsive-16by9 embed-responsive-sm p-3">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
            </div>
            <div class="embed-responsive embed-responsive-16by9 embed-responsive- p-3">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card bg-dark text-center">
            <h5 class="card-header text-white">How it was Made</h5>
            <div class="embed-responsive embed-responsive-16by9 embed-responsive-sm p-3">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
            </div>
            <div class="embed-responsive embed-responsive-16by9 embed-responsive-sm p-3">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="container text-left mt-5">

      <h2>Movies</h2>
      <p>Here at Bonus Vision we have collected a wide variety of Bonus Feature content from all the movies you love, such as the ones listed below.</p>

      <!-- Cards Only -->
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card">
            <img src="moviedvdcovers/shrek2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Shrek 2</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="moviedvdcovers/shrek2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="moviedvdcovers/shrek2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="moviedvdcovers/shrek2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="moviedvdcovers/shrek2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="moviedvdcovers/shrek2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
      </div>


      <!-- Carousel & Cards -->

      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="cards-wrapper">
              <div class="card">
                <img src="moviedvdcovers/shrek2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
          </div>
              <div class="card">
                <img src="moviedvdcovers/shrek2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>

           
              <div class="card">
                <img src="moviedvdcovers/shrek2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>


      <!-- Number 2 carsouel with a card -->

      



      <!-- Carousel  

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
                    <img src="moviedvdcovers/shrek2.jpg" alt="DVD 1" width="300" height="450">
                  </div>
                  <div class="col-2">
                    <img src="moviedvdcovers/shrek2.jpg" alt="DVD 2" width="300">
                  </div>
                  <div class="col-2">
                    <img src="moviedvdcovers/shrek2.jpg" alt="DVD 3" width="300">
                  </div>
                  <div class="col-2">
                    <img src="moviedvdcovers/shrek2.jpg" alt="DVD 4" width="300">
                  </div>
                  <div class="col-2">
                    <img src="moviedvdcovers/shrek2.jpg" alt="DVD 5" width="300">
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                  <div class="col-2">
                    <img src="moviedvdcovers/shrek2.jpg" alt="DVD 6" width="300">
                  </div>
                  <div class="col-2">
                    <img src="moviedvdcovers/shrek2.jpg" alt="DVD 7" width="300">
                  </div>
                  <div class="col-2">
                    <img src="moviedvdcovers/shrek2.jpg" alt="DVD 8">
                  </div>
                  <div class="col-2">
                    <img src="moviedvdcovers/shrek2.jpg" alt="DVD 9" width="300">
                  </div>
                  <div class="col-2">
                    <img src="moviedvdcovers/shrek2.jpg" alt="DVD 10" width="300">
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

    -->
      <h2>What are you waiting for? Sign up now!</h2>
      <button type="button" class="btn btn-primary btn-lg">Sign Up</button>

    </div>


</html>
<?php include('footer.php'); ?>