<?php
include("db.php");

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    mysqli_query($conn, "INSERT INTO users(name,email,password,role)
    VALUES('$name','$email','$pass','admin')");
    

    header("Location: login.php?success=1");
   exit();

}
?>

<h2>Register</h2>

<form method="POST">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="email" name="email"><br><br>
    Password: <input type="password" name="password"><br><br>

    <button name="register">Register</button>
</form>
