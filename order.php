<?php
include("auth.php");
include("db.php");

// Get products
$res = mysqli_query($conn, "SELECT * FROM products");

$price = "";
$total = "";

// Get price
if(isset($_POST['get_price'])){
    $product = $_POST['product_name'];

    $p = mysqli_query($conn, "SELECT * FROM products WHERE name='$product'");
    $data = mysqli_fetch_assoc($p);

    if($data){
        $price = $data['price'];
    }

    $qty = $_POST['quantity'];
    if($qty > 0){
        $total = $price * $qty;
    }
}

// Place Order
if(isset($_POST['order'])){
    $customer = $_POST['customer_name'];
    $product = $_POST['product_name'];
    $qty = $_POST['quantity'];

    $p = mysqli_query($conn, "SELECT * FROM products WHERE name='$product'");
    $data = mysqli_fetch_assoc($p);

    $price = $data['price'];
    $stock = $data['stock'];

    $total = $qty * $price;

    if($qty <= 0){
        echo "<script>alert('Invalid Quantity');</script>";
    }
    else if($qty > $stock){
        echo "<script>alert('Not enough stock');</script>";
    }
    else{
        mysqli_query($conn, "INSERT INTO orders
        (customer_name, product_name, quantity, total_price, order_date)
        VALUES ('$customer', '$product', '$qty', '$total', NOW())");

        $new_stock = $stock - $qty;
        mysqli_query($conn, "UPDATE products SET stock='$new_stock' WHERE name='$product'");

        header("Location: bill.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<?php include("navbar.php"); ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Create Order</h2>

    <form method="POST" class="card p-4 shadow">

        <!-- Customer -->
        <div class="mb-3">
            <label>Customer Name</label>
            <input type="text" name="customer_name" class="form-control"
            value="<?php echo isset($_POST['customer_name']) ? $_POST['customer_name'] : ''; ?>" required>
        </div>

        <!-- Product -->
        <div class="mb-3">
            <label>Select Product</label>
            <select name="product_name" class="form-control" required>
                <option value="">-- Select Product --</option>

                <?php while($row = mysqli_fetch_assoc($res)){ ?>
                    <option value="<?php echo $row['name']; ?>"
                    <?php if(isset($_POST['product_name']) && $_POST['product_name'] == $row['name']) echo "selected"; ?>>
                        <?php echo $row['name']; ?>
                    </option>
                <?php } ?>

            </select>
        </div>

        <!-- Quantity -->
        <div class="mb-3">
            <label>Quantity</label>
            <input type="number" name="quantity" class="form-control" min="1"
            value="<?php echo isset($_POST['quantity']) ? $_POST['quantity'] : ''; ?>" required>
        </div>

        <!-- Get Price -->
        <button type="submit" name="get_price" class="btn btn-info mb-3">Get Price</button>

        <!-- Price -->
        <div class="mb-3">
            <label>Price</label>
            <input type="number" class="form-control" value="<?php echo $price; ?>" readonly>
        </div>

        <!-- Total -->
        <div class="mb-3">
            <label>Total</label>
            <input type="number" class="form-control" value="<?php echo $total; ?>" readonly>
        </div>

        <!-- Place Order -->
        <button type="submit" name="order" class="btn btn-success w-100">Place Order</button>

    </form>
</div>

</body>
</html>
