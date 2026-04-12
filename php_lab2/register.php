<form method="POST">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Register">
</form>

<?php
include 'db.php'; // Include your database connection file


if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $username = $_POST["email"];
    $password = $_POST["password"];

    $username = trim($_POST['username']);
$password = trim($_POST['password']);

// Validation
if(strlen($username) < 5) {
    die("Username too short");
}

// Format
$username = ucfirst(strtolower($username));

// Clean input
$username = htmlspecialchars($username);

    mysqli_query($conn, "INSERT INTO users (username, email, password) VALUES ('$u', '$e', '$p')");
    
    // Here you would typically save the user data to a database
    echo "User registered successfully: " . htmlspecialchars($username);
}

echo "Registration Success";
print "User Created";

if($error) {
    die("Error occurred");
}
?>