<?php
require_once 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validation
    if (empty($username) || empty($email) || empty($password)) {
        die("All fields are required.");
    }
    if (strlen($password) < 6) {
        die("Password must be at least 6 characters.");
    }

    // Prevent duplicate username/email
    $existing = $usersCollection->findOne([
        '$or' => [
            ['username' => $username],
            ['email' => $email]
        ]
    ]);
    if ($existing) {
        die("Username or Email already exists.");
    }

    // Insert user
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $usersCollection->insertOne([
        'username' => $username,
        'email' => $email,
        'password' => $hashedPassword
    ]);

    echo "Signup successful! <a href='login.php'>Login here</a>.";
}
?>
<form method="POST">
    Username: <input type="text" name="username"><br>
    Email: <input type="email" name="email"><br>
    Password: <input type="password" name="password"><br>
    <button type="submit">Signup</button>
</form>