<?php

include 'config.php';
include 'functions.php';

session_start();
if (!isset($_SESSION['user'])) {
  header('Location: login.php');
  exit();
}
// }
?>
<!DOCTYPE html>
<html>

<head>
  <title>Your eCommerce Website</title>

  <!-- Include CSS and other necessary files -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <!-- Your header HTML code -->
  <header>
    <nav id="navbar-example2" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-warning">E-</span>Commerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 nav-pills ">
            <li class="nav-item">
              <a class="nav-link" href="main.php" active>Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="products.php">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Add to Cart</a>
            </li>

            <?php
            session_start();
            if (isset($_SESSION['user'])) {
              $user = $_SESSION['user'];
              echo '<li class="nav-item"><span class="nav-link">Welcome, ' . $user['name'] . '</span></li>';
              echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
            } else {
              $currentPage = basename($_SERVER['PHP_SELF']);
              echo '<li class="nav-item"><a class="nav-link' . ($currentPage === "login.php" ? ' active' : '') . '" href="login.php">Login</a></li>';
              echo '<li class="nav-item"><a class="nav-link' . ($currentPage === "register.php" ? ' active' : '') . '" href="register.php">Register</a></li>';
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>

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

  <?php

  // Fetch products from the database
  $stmt = $db->query("SELECT * FROM products");
  $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>

  <br>
  <div class="container">
    <h2>Products</h2>
  </div>

  <div class="container">
    <h2>Products</h2>
    <div class="row">
      <?php foreach ($products as $product) : ?>
        <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" style="height: 400px;" src="images/<?php echo $product['image_path']; ?>" alt="Product Image">
            <div class="card-body">
              <h5 class="card-title"><?php echo $product['name']; ?></h5>
              <p class="card-text"><?php echo $product['description']; ?></p>
              <p class="card-text">Price: <?php echo $product['price']; ?></p>
              <button class="btn btn-primary add-to-cart" data-product-id="<?php echo $product['id']; ?>">Add to Cart</button>
              <button style="float: right;" class="btn btn-warning buy-now" data-product-id="<?php echo $product['id']; ?>">Buy Now</button>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      // Add to Cart button click event
      $('.add-to-cart').click(function() {
        var productId = $(this).data('product-id');
        // console.log(productId);

        // Send AJAX request to add the product to the cart
        $.ajax({
          type: 'POST',
          url: 'add_to_cart.php',
          data: {
            productId: productId
          },
          success: function(response) {
            // console.log(response);
            // Handle the response from the server
            if (response.status === 'success') {
              alert('Product added to cart successfully!');
            } else {
              alert('Failed to add product to cart. Please try again.');
            }
          }
        });
      });
      // Buy Now button click event
      $('.buy-now').click(function() {
        var productId = $(this).data('product-id');

        // Send AJAX request to process the checkout
        $.ajax({
          type: 'POST',
          url: 'create_order.php',
          data: {
            productId: productId
          },
          success: function(response) {
            // Handle the response from the server
            if (response.status === 'success') {
              window.location.href = 'checkout.php?orderId=' + response.orderId;
            } else {
              alert('Failed to create order. Please try again.');
            }
          }
        });
      });
    });
  </script>


</body>
<?php include 'partials/footer.php'; ?>