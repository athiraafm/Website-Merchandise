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
    <title>Lihat Produk - Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!-- Navbar -->
<div class="navbar">
    <div class="logo">Admin Panel</div>
    <ul class="menu">
        <li><a href="dashboard_admin.php">Tambah Produk</a></li>
        <li><a href="lihat_produk_admin.php">Lihat Produk</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>

<div class="admin-container" style="margin-top: 100px;">
    <h2>Daftar Produk</h2>
    <div class="produk-container">
        <?php
        if (file_exists("produk.csv")) {
            $file = fopen("produk.csv", "r");
            $header = fgetcsv($file); 

            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                if (count($data) < 5) continue;

                $id = $data[0];
                $nama = $data[1];
                $deskripsi = $data[2];
                $harga = number_format($data[3], 0, ',', '.');
                $gambar = $data[4];

                echo "<div class='produk-item'>";
                echo "<img src='img/{$gambar}' alt='{$nama}' style='width:100%; border-radius:8px;'>";
                echo "<h3>{$nama}</h3>";
                echo "<p>{$deskripsi}</p>";
                echo "<span class='harga'>Rp {$harga}</span>";
                echo "<div class='admin-actions'>";
                echo "<a href='edit_product.php?id={$id}' class='btn btn-secondary'>Edit</a> ";
                echo "<a href='delete_product.php?id={$id}' class='btn' onclick=\"return confirm('Yakin ingin menghapus produk ini?');\">Hapus</a>";
                echo "</div>";
                echo "</div>";
            }

            fclose($file);
        } else {
            echo "<p>Tidak ada produk tersedia.</p>";
        }
        ?>
    </div>
</div>
</body>
</html>
