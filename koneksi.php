<?php

// $cfg['Servers'][$i]['port'] = '3307'; // Sesuaikan port MySQL

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uts_5029";

// Buat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Cek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>