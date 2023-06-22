<head>
    <title>Your eCommerce Website</title>

    <!-- Include CSS and other necessary files -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<?php
include 'config.php';
include 'functions.php';

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

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
                        <button style="float: right;" class="btn btn-warning buy-now " data-product-id="<?php echo $product['id']; ?>">Buy Now</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Add to Cart button click event
        $('.add-to-cart').click(function() {
            var productId = $(this).data('product-id');

            // Send AJAX request to add the product to the cart
            $.ajax({
                type: 'POST',
                url: 'add_to_cart.php',
                data: {
                    productId: productId
                },
                success: function(response) {
                    // Handle the response from the server
                    if (response.status === 'success') {
                        alert('Product added to cart successfully!');
                    } else {
                        alert('Failed to add product to cart. Please try again.');
                    }
                }
            });
        });
    });
</script>