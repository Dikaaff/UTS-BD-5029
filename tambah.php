<?php
session_start();
include 'koneksi.php';

// Proteksi halaman: redirect ke login jika belum login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mahasiswa = mysqli_real_escape_string($conn, $_POST['mahasiswa']);
    $mata_kuliah = mysqli_real_escape_string($conn, $_POST['mata_kuliah']);
    $nilai = mysqli_real_escape_string($conn, $_POST['nilai']);

    $query = "INSERT INTO nilai (mahasiswa, mata_kuliah, nilai) VALUES ('$mahasiswa', '$mata_kuliah', '$nilai')";

    if (mysqli_query($conn, $query)) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Gagal menambahkan nilai: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
/* General reset and body styling */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif; /* Poppins font family */
    background-color: #f4f4f4;
    color: #333;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 30px;
    height: 100vh;
}

/* Form container */
form {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15); /* Enhanced shadow for depth */
    width: 100%;
    max-width: 400px;
    text-align: center;
}

/* Input field styling */
input[type="text"], input[type="number"] {
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

input[type="text"]:focus, input[type="number"]:focus {
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
a {
    color: #007aff;
    text-decoration: none;
    margin-top: 20px;
    display: inline-block;
}

a:hover {
    text-decoration: underline;
}

</style>
<body>
<form method="post">
    <input type="text" name="mahasiswa" placeholder="Nama Mahasiswa" required>
    <input type="text" name="mata_kuliah" placeholder="Mata Kuliah" required>
    <input type="number" name="nilai" placeholder="Nilai" required>
    <button type="submit">Simpan</button>
</form>
<a href="dashboard.php">Kembali ke Daftar Nilai</a>
</body>
</html>