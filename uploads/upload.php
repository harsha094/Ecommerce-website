<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include '../config.php';
include '../functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  
  // Process the uploaded image
  $imagePath = '';
  if (isset($_FILES['image'])) {
    $image = $_FILES['image'];

    // Check for errors during the image upload
    if ($image['error'] === UPLOAD_ERR_OK) {
      $imageName = $image['name'];
      $imageTmpName = $image['tmp_name'];
      $imagePath = '../images/' . $imageName; 

      // Move the uploaded image to the desired location
      move_uploaded_file($imageTmpName, $imagePath);
    }
  }
  
  // Store the product details in the products table
  $stmt = $db->prepare("INSERT INTO products (name, price, description, image_path, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())");
  $stmt->execute([$name, $price, $description, $imagePath]);

  if ($stmt->rowCount() > 0) {
    // Product details saved successfully
    displaySuccessAlert('Product uploaded successfully!');
    redirect('../products.php'); // Redirect to the products page or any other desired page
  } else {
    // Database error
    $errorInfo = $stmt->errorInfo();
    displayErrorAlert('Failed to upload product. Error: ' . $errorInfo[2]);
    redirect('upload-form.php'); // Redirect back to the upload form
  }
}
?>
