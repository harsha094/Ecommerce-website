<head>
    <title>E-Commerce Website</title>

    <!-- Include CSS and other necessary files -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<div class="container">
    <h2>Registration</h2>
    <form method="POST" action="register_process.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="mobile">Mobile Number:</label>
            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile number">
            <small id="mobileHelp" class="form-text text-muted">We'll never share your Mobile Number with anyone else.</small><br>
            <button type="button" style="background-color: #526D82" onclick="generateOtp()">Generate OTP</button>
        </div>
        <div class="form-group">
            <label for="otp">OTP</label>
            <input type="text" class="form-control" name="otp" id="otp" required>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name"  required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword">Password</label>
            <input type="current-password" name="password" class="form-control" id="exampleInputPassword" placeholder="Password">
        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-primary">Register</button>
    </form>

    <a href="login.php"> Already Have an Account Click here</a>
</div>
<script>
        function generateOtp() {
            // Generate and display a static OTP (e.g., 123456)
            var otpInput = document.getElementById('otp');
            otpInput.value = '123456';
        }
</script>