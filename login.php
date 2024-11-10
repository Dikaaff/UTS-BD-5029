<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Username atau password salah.";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<style>
/* General reset and body styling */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins';/* Poppins font family */
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Form container */
.container {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15); /* Enhanced shadow for depth */
    width: 100%;
    max-width: 400px;
    text-align: center;
}

/* Heading */
h2 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

/* Label styling */
label {
    display: block;
    font-size: 14px;
    margin-bottom: 8px;
    color: #333;
    text-align: left;
}

/* Input field styling */
input[type="text"], input[type="password"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 10px;
    font-size: 16px;
    background-color: #f7f7f7;
    color: #333;
    transition: border 0.3s ease-in-out;
}

input[type="text"]:focus, input[type="password"]:focus {
    border-color: #007aff;
    outline: none;
}

/* Button styling */
button {
    background-color: #800080;
    color: white;
    padding: 14px;
    border: none;
    border-radius: 10px;
    font-size: 16px;
    cursor: pointer;
    width: 100%;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #333333; /* Darker black on hover */
}

/* Link styling */
p {
    margin-top: 15px;
    font-size: 14px;
}

a {
    color: #007aff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

</style>
<body>
<form method="POST">
    <div class="container">
    <h2>Login</h2>
    <label for="username">Username :</label>
    <input type="text" name="username" placeholder="Username" required>
    <label for="username">Password :</label>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Submit</button>
    </div>
    <p>Belum punya akun? <a href="register.php">Register</a></p>
</form>

    
</body>
</html>