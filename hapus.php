<?php
session_start();
include 'koneksi.php';

// Proteksi halaman: redirect ke login jika belum login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$query = "DELETE FROM nilai WHERE id = '$id'";

if (mysqli_query($conn, $query)) {
    header("Location: dashboard.php");
    exit;
} else {
    echo "Gagal menghapus nilai: " . mysqli_error($conn);
}
?>
