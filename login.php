<?php
session_start();
include("db.php");

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $res = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");

    if(mysqli_num_rows($res) > 0){
        $_SESSION['user_id'] = 1;
        header("Location: dashboard.php");
        exit();
    }else{
        echo "<script>alert('Invalid Email or Password');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">
    <div class="card p-4 shadow" style="max-width:400px; margin:auto;">

        <h3 class="text-center mb-3">Login</h3>
        <?php
if(isset($_GET['success'])){
    echo "<div class='alert alert-success text-center'>
    Registered Successfully! Please Login
    </div>";
}
?>


        <form method="POST">

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button name="login" class="btn btn-primary w-100">Login</button>

        </form>

        <p class="text-center mt-3">
            New User? <a href="register.php">Register Here</a>
        </p>

    </div>
</div>

</body>
</html>
