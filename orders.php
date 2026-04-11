<?php
include("auth.php");
include("db.php");

// 🔥 Delete All Orders
if(isset($_GET['delete_all'])){
    mysqli_query($conn, "DELETE FROM orders");
    header("Location: orders.php");
    exit();
}

// 🔥 Delete Single Order
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM orders WHERE id='$id'");
    header("Location: orders.php");
    exit();
}

// 🔥 Fetch Orders
$res = mysqli_query($conn, "SELECT * FROM orders ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<?php include("navbar.php"); ?>

<div class="container mt-5">

    <h2 class="text-center mb-4">All Orders</h2>

    <!-- 🔥 Delete All Button -->
    <div class="text-end mb-3">
        <a href="orders.php?delete_all=true" 
        class="btn btn-danger"
        onclick="return confirm('Are you sure? All orders will be deleted!');">
        Delete All
        </a>
    </div>

    <table class="table table-bordered table-hover text-center">

        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        <?php while($row = mysqli_fetch_assoc($res)){ ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['customer_name']; ?></td>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td>₹<?php echo $row['total_price']; ?></td>
                <td><?php echo $row['order_date']; ?></td>
                <td>
                    <!-- 🔥 Single Delete -->
                    <a href="orders.php?delete=<?php echo $row['id']; ?>" 
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('Delete this order?');">
                    Delete
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>

    </table>

</div>

</body>
</html>
