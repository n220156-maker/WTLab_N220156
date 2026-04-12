<?php
require_once 'config/db.php';

// Display all users
$users = $usersCollection->find();
foreach($users as $user){
    echo $user['username'] . " - " . $user['email'] . " ";
    echo "<a href='delete_user.php?id=".$user['_id']."'>Delete</a><br>";
}