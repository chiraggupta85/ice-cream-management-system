<?php
include("db.php");

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);


    mysqli_query($conn, "INSERT INTO users(name,email,password,role)
    VALUES('$name','$email','$pass','admin')");

    header("Location: login.php?success=1");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
            height: 100vh;
        }
        .card {
            border-radius: 15px;
        }
    </style>
</head>

<body>

<div class="d-flex justify-content-center align-items-center vh-100">

    <div class="card p-4 shadow" style="width: 400px;">

        <h3 class="text-center mb-3">Create Account</h3>

        <form method="POST">

            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
            </div>

            <button name="register" class="btn btn-primary w-100">Register</button>

        </form>

        <p class="text-center mt-3">
            Already have an account? 
            <a href="login.php">Login</a>
        </p>

    </div>

</div>

</body>
</html>
