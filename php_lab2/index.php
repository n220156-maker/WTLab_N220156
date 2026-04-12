<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Welcome to My Website</h1>
    <p>This is my first HTML website 😊</p>

    <a href="register.php">Register</a>
    <a href="login.php">Login</a>
    
</header>

<section>
    <h2>About Me</h2>
    <p>Hello! I m Shalini . I m learning web developement.</p>
</section>

<section>
    <h2>My Image</h2>
    <img src="https://via.placeholder.com/300" alt="Sample Image">
</section>

<section>
    <h2>My Video</h2>
    <video controls>
        <source src="sample-video.mp4" type="video/mp4">
        Your browser does not support video.
    </video>
</section>

<form method="POST">
    Name: <input type="text" name="name"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" name="submit" value="submit">
</form>

<?php
include 'db.php';

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    mysqli_query($conn, "INSERT INTO users(name,email,password)  VALUES('$name,'$email','$password')");
    echo "Data inserted successfully";
}
?>
<?php
$result=mysqli_query($conn, "SELECT * FROM users");
echo "<table border='1'>
<tr><th>ID</th><th>Name</th><th>Email</th></tr>";

while($row=mysqli_fetch_assoc($result)){
    echo "<tr>
    <td>".$row['id']."</td>
    <td>".$row['name']."</td>
    <td>".$row['email']."</td>
    </tr>";
}
echo "</table>";
?>
</body> 
</html>