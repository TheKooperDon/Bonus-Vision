<?php include('header.php'); 
$page_title = 'About Us';?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  </head>
  <body>

    <main>
    <div class="container mt-5">
    <h1 class="px-3">Meet the Team</h1>
<!-- BEGINNING OF PROFILE CARDS ***********************************-->
    <div class="px-3 grid text-center">
      <div class="g-col-12 g-col-md-6 g-col-xl-3 cardcontainer container-fluid">
        <div class="card profilecard" style="width: 100%;">
          <img src="teamphotos/matt-nowak.png" class="img-fluid card-img-top" alt="Photo of Handler, Matt Nowak">
          <div class="card-body">
            <h5 class="card-title">Matthew Nowak<a href="https://www.linkedin.com/in/matthew-nowak-wi/" target="_blank"><i class="bi bi-linkedin mx-2 linkedin-icon"></i></a></h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">Handler</h6>
          </div>
        </div>
      </div>

      <div class="g-col-12 g-col-md-6 g-col-xl-3 cardcontainer container-fluid">
        <div class="card profilecard" style="width: 100%;">
          <img src="teamphotos/jeff-v.png" class="img-fluid card-img-top" alt="Photo of Hipster, Jeff">
          <div class="card-body">
            <h5 class="card-title">Jeffery Valodine<a href="https://www.linkedin.com/in/jsvjr/" target="_blank"><i class="bi bi-linkedin mx-2 linkedin-icon"></i></a></h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">Hipster</h6>
          </div>
        </div>
      </div>

      <div class="g-col-12 g-col-md-6 g-col-xl-3 cardcontainer container-fluid">
        <div class="card profilecard" style="width: 100%;">
          <img src="teamphotos/matt-madia.png" class="img-fluid card-img-top" alt="Photo of Hustler, Matt Madia">
          <div class="card-body">
            <h5 class="card-title">Matthew Madia<a href="https://www.linkedin.com/in/matthew-madia/" target="_blank"><i class="bi bi-linkedin mx-2 linkedin-icon"></i></a></h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">Hustler</h6>
          </div>
        </div>
      </div>

      <div class="g-col-12 g-col-md-6 g-col-xl-3 cardcontainer container-fluid">
        <div class="card profilecard" style="width: 100%;">
          <img src="teamphotos/max-peter.png" class="img-fluid card-img-top" alt="Photo of Hacker, Max">
          <div class="card-body">
            <h5 class="card-title">Maxwell Peter<a href="https://www.linkedin.com/in/maxwell-peter/" target="_blank"><i class="bi bi-linkedin mx-2 linkedin-icon"></i></a></h5> 
            <h6 class="card-subtitle mb-2 text-body-secondary">Hacker</h6>
          </div>
        </div>
      </div>

    </div>
  <!-- END OF PROFILE CARDS ******************************************-->
    <br>    
  <!-- *******************************************
          BEGINNING OF ACCORDIAN FOR ABOUT US-->
        

    <div class="p-3 accordion" id="accordionExample">
      <div class="accordion-item">
        <h5 class="accordion-header">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <h5>Who are we?</h5>
          </button>
        </h5>
        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <strong>We are Bonus Vision.</strong> We are four passionate Information Science majors from the University of Wisconsin-Milwaukee who are looking to make a difference.  We each bring our own unique skill sets to the team, making us a well rounded team with strong ambitions for our futures.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h5 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <h5>What is Bonus Vision?</h5>
          </button>
        </h5>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <strong>Bonus Vision</strong> is a project that we are putting together for our collective Senior Capstone.  Our mission is to bring back the lost art of <strong>Bonus Features</strong>. Lost in the ways of the streaming world, Bonus Features were once packed onto DVDs and provided additional entertainment to your movies.  Whether it was a game, a blooper reel, behind the scenes, or a director commentary, these features always brought fun insight and extra content beyond your usual viewing experience.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h5 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            <h5>The Future</h5>
          </button>
        </h5>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Our focus is on developing a product that exceeds the expectations of our users. We will continue to develop Bonus Vision as it grows.
          </div>
        </div>
      </div>
    </div>

<!-- ************************************
      END OF ACCORDIANS-->
    </div>
    </main>
    <footer>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  </body>
</html>
<?php include('footer.php'); ?>