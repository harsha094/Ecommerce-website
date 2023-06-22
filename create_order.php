<?php
include 'config.php';
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();

    // Get the product ID from the AJAX request
    $productId = $_POST['productId'];

    // Retrieve the product details from the database
    $stmt = $db->prepare("SELECT * FROM products WHERE id = :productId");
    $stmt->bindParam(':productId', $productId);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the product exists
    if ($product) {
        // Create a new order with the product
        $orderNumber = generateOrderNumber();
        $paymentMode = 'Pending'; // Update this as per your payment flow
        $orderStatus = 'Processing'; // Update this as per your order flow

        // Insert the order into the orders table
        $stmt = $db->prepare("INSERT INTO orders (order_number, payment_mode, order_status, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->execute([$orderNumber, $paymentMode, $orderStatus]);

        // Retrieve the order ID
        $orderId = $db->lastInsertId();
        // Insert the order details into the order_details table
        $stmt = $db->prepare("INSERT INTO order_details (order_id, product_id, price) VALUES (?, ?, ?)");
        $stmt->execute([$orderId, $productId, $product['price']]);

        if ($stmt->rowCount() > 0) {
            // Order and order details created successfully
            $response = [
                'status' => 'success',
                'orderId' => $orderId
            ];
        } else {
            // Failed to create order details
            $response = [
                'status' => 'error',
                'message' => 'Failed to create order details.'
            ];
        }
    } else {
        // Product not found
        $response = [
            'status' => 'error',
            'message' => 'Product not found.'
        ];
    }

    // Send the JSON response back to the client
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
} else {
    // Invalid request
    header('Location: products.php');
    exit();
}
?>
