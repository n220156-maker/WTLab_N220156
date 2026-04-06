<form method="POST">
    Email: <input type="text" name="email"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" name="login" value="Login">
</form>

<?php
include 'db.php'; // Include your database connection file  

if (isset($_POST['login'])) {
    $e=$_POST['email'];
    $p=$_POST['password'];
    
    $res = mysqli_query($conn, "SELECT * FROM users WHERE email='$e' AND password='$p'");
    if (mysqli_num_rows($res) > 0) {
        echo "Login successful!";
        // You can redirect to another page or set session variables here
    } else {
        echo "Invalid email or password.";
    }
}