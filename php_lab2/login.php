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
$user1 = "admin";
$user2 = $_POST['username'];

// Case sensitive compare
if(strcmp($user1, $user2) == 0) {
    echo "Login Success";
} else {
    echo "Login Failed";
}

if($login == true) {
    echo "Login Success";
} else {
    die("Invalid credentials");
}
?>