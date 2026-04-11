<?php
include("auth.php");
include("db.php");

// last order fetch
$res = mysqli_query($conn, "SELECT * FROM orders ORDER BY id DESC LIMIT 1");
$row = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bill</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include("navbar.php"); ?>

<div class="container mt-5">


<div class="container mt-5">
    <div class="card p-4 shadow text-center">

        <h2>🧾 Ice Cream Bill</h2>
        <hr>

        <p><b>Customer:</b> <?php echo $row['customer_name']; ?></p>
        <p><b>Product:</b> <?php echo $row['product_name']; ?></p>
        <p><b>Quantity:</b> <?php echo $row['quantity']; ?></p>

        <h4 class="text-success">
            Total: ₹<?php echo $row['total_price']; ?>
        </h4>

        <p class="text-muted">
            <?php echo $row['order_date']; ?>
        </p>

        <button onclick="window.print()" class="btn btn-primary mt-3">
            Print Bill
        </button>

    </div>
</div>

</body>
</html>
