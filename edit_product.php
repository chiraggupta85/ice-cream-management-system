<?php
include("db.php");

$id = $_GET['id'];

// old data fetch
$res = mysqli_query($conn, "SELECT * FROM products WHERE id='$id'");
$data = mysqli_fetch_assoc($res);

// update
if(isset($_POST['update'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $flavor = $_POST['flavor'];
    $stock = $_POST['stock'];

    mysqli_query($conn, "UPDATE products SET 
        name='$name',
        price='$price',
        flavor='$flavor',
        stock='$stock'
        WHERE id='$id'");

    echo "Product Updated Successfully";
}
?>

<h2>Edit Product</h2>

<form method="POST">
    Name: <input type="text" name="name" value="<?php echo $data['name']; ?>"><br><br>
    Price: <input type="number" name="price" value="<?php echo $data['price']; ?>"><br><br>
    Flavor: <input type="text" name="flavor" value="<?php echo $data['flavor']; ?>"><br><br>
    Stock: <input type="number" name="stock" value="<?php echo $data['stock']; ?>"><br><br>

    <button name="update">Update</button>
</form>
