<?php
include 'config.php';
include 'functions.php';
var_dump($_SERVER['REQUEST_METHOD'] == 'POST');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();

    // Get the product ID from the AJAX request
    $productId = $_POST['productId'];
    // Retrieve the product details from the database
    $stmt = $db->prepare("SELECT * FROM products WHERE id = :productId");
    $stmt->bindParam(':productId', $productId);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    // Add the product to the cart in the session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][] = $product;

    // Send the response back to the client
    $response = ['status' => 'success'];
    echo json_encode($response);
    exit();
} else {
    // Invalid request
    $response = ['status' => 'error'];
    echo json_encode($response);
    exit();
}

// Redirect to the cart page
header('Location: cart.php');
exit();
?>
