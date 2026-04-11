<?php
session_start();
include("db.php");

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    // 🔍 user fetch by email
    $res = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $row = mysqli_fetch_assoc($res);

    // 🔐 verify password
    if($row && password_verify($password, $row['password'])){
        $_SESSION['user_id'] = $row['id'];

        header("Location: dashboard.php");
        exit();
    }else{
        $error = "Invalid Email or Password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
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

        <h3 class="text-center mb-3">🔐 Welcome Back</h3>

        <!-- Success message -->
        <?php if(isset($_GET['success'])){ ?>
            <div class="alert alert-success text-center">
                Registered Successfully! Please Login
            </div>
        <?php } ?>

        <!-- Error message -->
        <?php if(isset($error)){ ?>
            <div class="alert alert-danger text-center">
                <?php echo $error; ?>
            </div>
        <?php } ?>

        <form method="POST">

            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
            </div>

            <button name="login" class="btn btn-dark w-100 fw-bold">Login</button>

        </form>

        <p class="text-center mt-3 text-muted">
            New User? <a href="register.php">Create Account</a>
        </p>

    </div>

</div>

</body>
</html>

