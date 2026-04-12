<?php
require_once 'config/db.php';
session_start();

if (!isset($_SESSION['user'])) {
    die("You must be logged in. <a href='login.php'>Login</a>");
}

$currentUser = $usersCollection->findOne(['username' => $_SESSION['user']]);
if ($currentUser) {
    $usersCollection->deleteOne(['_id' => $currentUser['_id']]);
    session_destroy();
    echo "Your account has been deleted. <a href='signup.php'>Signup again</a>";
} else {
    die("User not found.");
}
?>