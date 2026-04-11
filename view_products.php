<?php
include("auth.php");
include("db.php");

$res = mysqli_query($conn, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Products</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include("navbar.php"); ?>

<h2 class="text-center mt-3">Edit Product</h2>

<div class="container mt-4">
    <h2 class="text-center mb-4">All Products</h2>

    <div class="row">

        <?php while($row = mysqli_fetch_assoc($res)){ ?>

        <div class="col-md-4 mb-4">
            <div class="card shadow p-3 text-center">

                <img src="images/<?php echo $row['image']; ?>" 
                     class="img-fluid mb-2" 
                     style="height:150px; object-fit:cover;">

                <h5><?php echo $row['name']; ?></h5>
                <p>₹<?php echo $row['price']; ?></p>
                <p><?php echo $row['flavor']; ?></p>
                <p>Stock: <?php echo $row['stock']; ?></p>

                <a href="edit_product.php?id=<?php echo $row['id']; ?>" 
                   class="btn btn-warning btn-sm mb-2">Edit</a>

                <a href="delete_product.php?id=<?php echo $row['id']; ?>" 
                   class="btn btn-danger btn-sm">Delete</a>

            </div>
        </div>

        <?php } ?>

    </div>
</div>

</body>
</html>
