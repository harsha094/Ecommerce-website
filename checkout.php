<?php
include 'config.php';
include 'functions.php';

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['orderId'])) {
    $orderId = $_GET['orderId'];

    // Retrieve the order details from the database
    $stmt = $db->prepare("SELECT * FROM orders WHERE id = ?");
    $stmt->execute([$orderId]);
    $order = $stmt->fetch(PDO::FETCH_ASSOC);

    // Retrieve the order items from the database
    $stmt = $db->prepare("SELECT od.*, p.name FROM order_details od JOIN products p ON od.product_id = p.id WHERE od.order_id = ?");
    $stmt->execute([$orderId]);
    $orderItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<div class="container">
    <h2>Checkout</h2>

    <?php if (isset($order)) : ?>
        <h4>Order Details</h4>
        <p>Order Number: <?php echo $order['order_number']; ?></p>
        <p>Payment Mode: <?php echo $order['payment_mode']; ?></p>
        <p>Order Status: <?php echo $order['order_status']; ?></p>
        <p>Created At: <?php echo $order['created_at']; ?></p>

        <?php if (count($orderItems) > 0) : ?>
            <h4>Order Items</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orderItems as $item) : ?>
                        <tr>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo $item['price']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>No items found in the order.</p>
        <?php endif; ?>
    <?php else : ?>
        <p>No order found.</p>
    <?php endif; ?>
</div>
