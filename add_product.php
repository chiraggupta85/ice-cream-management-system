<?php
include("db.php");

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $flavour = $_POST['flavour'];
    $stock = $_POST['stock'];

    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "images/".$img);

    mysqli_query($conn, "INSERT INTO products(name,price,flavour,stock,image)
    VALUES('$name','$price','$flavour','$stock','$img')");
}
?>

<!DOCTYPE html>
<html>
<head>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include("navbar.php"); ?>

<h2 class="text-center mt-3">Add Product</h2>

<div class="container mt-4">
<form method="POST" enctype="multipart/form-data" class="card p-4 shadow">

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="mb-3">
        <label>Price</label>
        <input type="number" name="price" class="form-control">
    </div>

    <div class="mb-3">
        <label>Flavour</label>
        <input type="text" name="flavour" class="form-control">
    </div>

    <div class="mb-3">
        <label>Stock</label>
        <input type="number" name="stock" class="form-control">
    </div>

    <div class="mb-3">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button name="add" class="btn btn-primary w-100">Add Product</button>

</form>
</div>

</body>
</html>
