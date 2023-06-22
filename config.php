<?php

// Database configuration
define('DB_HOST', 'localhost');  // Replace with your database host
define('DB_NAME', 'Ecommerce');  // Replace with your database name
define('DB_USER', 'harsh');  // Replace with your database username
define('DB_PASS', '123456');  // Replace with your database password

// Other configurations
// define('SITE_URL', 'http://localhost/your_project');  // Replace with your site URL

// PDO database connection
try {
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // echo "connected";
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}

?>
