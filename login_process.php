<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include 'config.php';
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];

        // Verify the user's credentials against the customer table
        $stmt = $db->prepare("SELECT * FROM customer WHERE mobile = :mobile");
        $stmt->bindParam(':mobile', $mobile);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $password == $user['password']) {
            // Login successful
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['last_login'] = $user['last_login_time'];
            $_SESSION['user'] = $user;

            // Update the last login time in the customer table
            $stmt = $db->prepare("UPDATE customer SET last_login_time = NOW() WHERE id = :userId");
            $stmt->bindParam(':userId', $user['id']);
            $stmt->execute();

            // Redirect to the home page or any other desired page
            header('Location: main.php');
            exit();
        }

        // Invalid login credentials
        displayErrorAlert('Invalid mobile number or password. Please try again.');
        redirect('login.php');
    } else {
        redirect('login.php');
    }
} else {
    redirect('index.php');
}
?>
