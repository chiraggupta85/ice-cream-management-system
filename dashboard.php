<?php
include("auth.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php include("navbar.php"); ?>

<div class="container mt-5 text-center">

    <h2>Welcome to Dashboard</h2>

    <a href="add_product.php" class="btn btn-success m-2">Add Product</a>
    <a href="view_products.php" class="btn btn-warning m-2">View Products</a>
    <a href="order.php" class="btn btn-info m-2">Create Order</a>
    <a href="orders.php" class="btn btn-primary m-2">View Orders</a>
    <a href="logout.php" class="btn btn-danger m-2">Logout</a>

</div>

</body>
</html>
