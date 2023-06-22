<head>
    <title>E-Commerce Website</title>

    <!-- Include CSS and other necessary files -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<div class="container">
    <h2>Login</h2>
    <form method="POST" action="login_process.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="mobile">Mobile Number:</label>
            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile number">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword">Password</label>
            <input type="current-password" name="password" class="form-control" id="exampleInputPassword" placeholder="Password">
        </div>
        <br>
        <button type="submit" name ="submit" class="btn btn-primary">Login</button>
    </form>

    <a href="register.php"> Click here To Register</a>
</div>
