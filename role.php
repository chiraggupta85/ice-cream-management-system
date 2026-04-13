<?php
session_start();

if(isset($_POST['role'])){
    $_SESSION['role'] = $_POST['role'];

    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Select Role</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark d-flex justify-content-center align-items-center" style="height:100vh;">

<div class="card p-4 text-center" style="width:300px;">

    <h4 class="mb-3">Select Your Role</h4>

    <form method="POST">

        <button name="role" value="buyer" class="btn btn-primary w-100 mb-2">
            Buyer
        </button>

        <button name="role" value="seller" class="btn btn-success w-100">
            Seller
        </button>

    </form>

</div>

</body>
</html>
