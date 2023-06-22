<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include 'config.php';
include 'functions.php';

if (isset($_POST['submit'])) {
    $mobile = $_POST['mobile'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    try {
        // Store the user details in the customer table
        $stmt = $db->prepare("INSERT INTO customer (name, mobile, password, registered_at) VALUES (?, ?, ?, NOW())");
        $stmt->execute([$name, $mobile, $password]);

        if ($stmt->rowCount() > 0) {
            // Registration successful
            displaySuccessAlert('Registration successful!');
            session_start();

            // Retrieve the user details from the database
            $userStmt = $db->prepare("SELECT * FROM customer WHERE mobile = ?");
            $userStmt->execute([$mobile]);
            $user = $userStmt->fetch(PDO::FETCH_ASSOC);

            // Store user information in a session variable
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['last_login'] = $user['last_login'];
            $_SESSION['user'] = $user;
            
            // Redirect to the main page or any other desired page
            redirect('main.php');
        } else {
            // Database error
            $errorInfo = $stmt->errorInfo();
            throw new Exception('Registration failed. Error: ' . $errorInfo[2]);
        }
    } catch (Exception $e) {
        displayErrorAlert($e->getMessage());
        redirect('register.php');
    }
} else {
    redirect('register.php');
}
?>