<head>
    <title>E-Commerce Website</title>

    <!-- Include CSS and other necessary files -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<form action="upload.php" method="POST" enctype="multipart/form-data">
<div>
  <label for="name">Product Name:</label>
  <input type="text" name="name" id="name" required>
</div>
<div>
  <label for="price">Price:</label>
  <input type="number" name="price" id="price" step="0.01" required>
</div>
<div>
  <label for="description">Description:</label>
  <textarea name="description" id="description" rows="4" required></textarea>
</div>
<div>
  <label for="image">Product Image:</label>
  <input type="file" name="image" id="image" required>
</div>
<div>
    <button type="submit" name ="submit" class="btn btn-primary">Upload</button>
</div>
</form>