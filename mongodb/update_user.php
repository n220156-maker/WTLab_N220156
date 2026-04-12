<?php
// update_user.php
require_once 'config/db.php';
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    die("You must be logged in to update your profile. <a href='login.php'>Login here</a>");
}

// Fetch current user data from MongoDB
$currentUser = $usersCollection->findOne(['username' => $_SESSION['user']]);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newUsername = trim($_POST['username']);
    $newEmail = trim($_POST['email']);
    $newPassword = trim($_POST['password']);

    // Validation
    if (empty($newUsername) || empty($newEmail)) {
        die("Username and Email cannot be empty.");
    }

    if (!empty($newPassword) && strlen($newPassword) < 6) {
        die("Password must be at least 6 characters.");
    }

    // Check for duplicates (excluding current user)
    $existing = $usersCollection->findOne([
        '$and' => [
            ['$or' => [['username' => $newUsername], ['email' => $newEmail]]],
            ['_id' => ['$ne' => $currentUser['_id']]]
        ]
    ]);

    if ($existing) {
        die("Username or Email already taken by another user.");
    }

    // Prepare update data
    $updateData = [
        'username' => $newUsername,
        'email' => $newEmail
    ];

    if (!empty($newPassword)) {
        $updateData['password'] = password_hash($newPassword, PASSWORD_BCRYPT);
    }

    // Update in MongoDB
    $usersCollection->updateOne(
        ['_id' => $currentUser['_id']],
        ['$set' => $updateData]
    );

    // Update session username
    $_SESSION['user'] = $newUsername;

    echo "<p style='color:green;'>Profile updated successfully!</p>";

    // Refresh current user data
    $currentUser = $usersCollection->findOne(['_id' => $currentUser['_id']]);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Profile</title>
</head>
<body>
<h2>Update Your Profile</h2>
<form method="POST">
    <label>Username:</label><br>
    <input type="text" name="username" value="<?php echo htmlspecialchars($currentUser['username']); ?>"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?php echo htmlspecialchars($currentUser['email']); ?>"><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" placeholder="Leave blank to keep current"><br><br>

    <button type="submit">Update Profile</button>
</form>

<p><a href="dashboard.php">Back to Dashboard</a></p>
</body>
</html>