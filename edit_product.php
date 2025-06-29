<?php
session_start();
if (!isset($_SESSION["level"]) || $_SESSION["level"] !== "admin") {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$produk = [];
$rows = file('produk.csv');
$header = str_getcsv(array_shift($rows));

foreach ($rows as $row) {
    $data = str_getcsv($row);
    if ($data[0] == $id) {
        $produk = $data;
        break;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="admin">
<div class="admin-container">
    <h2>Edit Produk</h2>
    <form action="update_product.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $produk[0] ?>">
        <input type="hidden" name="gambar_lama" value="<?= $produk[4] ?>">

        <label>Nama Produk:</label>
        <input type="text" name="nama" value="<?= $produk[1] ?>" required>

        <label>Deskripsi:</label>
        <textarea name="deskripsi" required><?= $produk[2] ?></textarea>

        <label>Harga:</label>
        <input type="text" name="harga" value="<?= $produk[3] ?>" required>

        <label>Gambar Baru (opsional):</label>
        <input type="file" name="gambar">

        <button type="submit">Simpan Perubahan</button>
    </form>
</div>
</body>
</html>
