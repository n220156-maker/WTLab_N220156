<?php
require_once 'config/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        die("All fields are required.");
    }

    $user = $usersCollection->findOne(['email' => $email]);
    if (!$user || !password_verify($password, $user['password'])) {
        die("Invalid login credentials.");
    }

    $_SESSION['user'] = $user['username'];
    header("Location: dashboard.php");
    exit;
}
?>

<form method="POST">
    Email: <input type="email" name="email"><br>
    Password: <input type="password" name="password"><br>
    <button type="submit">Login</button>
</form>