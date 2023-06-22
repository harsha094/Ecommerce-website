<?php
include 'config.php';
include 'functions.php';


?>

<?php include 'partials/header.php'; ?>



<!-- Your page content -->

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-smooth-scroll="true" id="carouselExampleCaptions" class="carousel slide scrollspy-example mt-5" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/slider-bg.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 id="Home">Your Dream House</h5>
        <a href="#offcanvasExample" class="d-block mt-3 text-dark fw-bold" data-bs-toggle="offcanvas" role="button" area-control="sidebar">Click here</a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/arrival-bg.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Always Dedicated</h5>
        <a href="#offcanvasExample" class="d-block mt-3 text-dark fw-bold" data-bs-toggle="offcanvas" role="button" area-control="sidebar">Click here</a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/slider-bg.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>True construction</h5>
        <a href="#offcanvasExample" class="d-block mt-3 text-dark fw-bold" data-bs-toggle="offcanvas" role="button" area-control="sidebar">Click here</a>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<?php include 'partials/footer.php'; ?>