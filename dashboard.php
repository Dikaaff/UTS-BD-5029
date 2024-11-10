<?php
session_start();
include 'koneksi.php';

// Proteksi halaman: redirect ke login jika belum login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$query = "SELECT * FROM nilai";
$result = mysqli_query($conn, $query);
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

/* Heading styling */
h2 {
    font-size: 28px;
    color: #333;
    margin-bottom: 20px;
}

/* Link styling */
a {
    color: #007aff;
    text-decoration: none;
    margin: 10px 0;
    display: inline-block;
}

a:hover {
    text-decoration: underline;
}

/* Table styling */
table {
    width: 80%;
    border-collapse: separate;
    border-spacing: 0;
    margin-top: 20px;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 12px;
    text-align: left;
    border: 1px solid #ddd;
}

/* Header styling for table */
th {
    background-color: #800080;
    color: white;
    font-weight: 600;
    text-transform: uppercase;
}

/* Row styling for table */
tr:nth-child(even) {
    background-color: #f7f7f7;
}

tr:nth-child(odd) {
    background-color: #ffffff;
}

tr:hover {
    background-color: #f1f1f1;
}

/* Action links inside the table */
td a {
    color: #007aff;
    text-decoration: none;
    padding: 6px 12px;
    border-radius: 5px;
    margin-right: 8px;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

td a:hover {
    background-color: #f1f1f1;
    border-radius: 5px;
}

/* Adding space for buttons and links */
a.add-btn {
    background-color: #007aff;
    color: white;
    padding: 10px 20px;
    border-radius: 10px;
    font-size: 16px;
    text-align: center;
    display: inline-block;
    margin-top: 20px;
    transition: background-color 0.3s ease;
}

a.add-btn:hover {
    background-color: #005bb5;
}

</style>
<body>
<h2>Daftar Nilai Perkuliahan</h2>
<a href="tambah.php">Tambah Nilai</a>
<table border="1">
    <tr>
        <th>Mahasiswa</th>
        <th>Mata Kuliah</th>
        <th>Nilai</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?= htmlspecialchars($row['mahasiswa']) ?></td>
        <td><?= htmlspecialchars($row['mata_kuliah']) ?></td>
        <td><?= htmlspecialchars($row['nilai']) ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
            <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
<a href="logout.php">Logout</a>
</body>
</html>
