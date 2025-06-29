<?php
session_start();
if (!isset($_SESSION["level"]) || $_SESSION["level"] !== "admin") {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="admin">
<div class="navbar">
    <div class="logo">Admin Panel</div>
    <ul class="menu">
        <li><a href="dashboard_admin.php">Tambah Produk</a></li>
        <li><a href="lihat_produk_admin.php">Lihat Produk</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>

<div class="admin-container">
    <h2>Selamat datang!</h2>
    <p style="text-align:center;">Halo, <strong><?php echo $_SESSION["username"] ?? 'Admin'; ?></strong>!</p>
    <h2>Tambah Produk Baru</h2>
    <form action="save_product.php" method="POST" enctype="multipart/form-data">
        <label>Nama Produk:</label>
        <input type="text" name="nama_produk" placeholder="Contoh: Album Treasure" required>

        <label>Deskripsi:</label>
        <textarea name="deskripsi" rows="4" placeholder="Tulis deskripsi produk di sini..." required></textarea>

        <label>Harga:</label>
        <input type="text" name="harga" id="harga_produk" placeholder="300000" required>

        <label>Upload Gambar:</label>
        <input type="file" name="gambar" required>

        <button type="submit">Tambah Produk</button>
    </form>

    <div class="logout-link">
        <p><a href="logout.php">Logout</a></p>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>