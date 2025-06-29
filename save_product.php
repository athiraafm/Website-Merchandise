<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    // Menentukan direktori gambar
    $imgDir = 'img/';
    if (!is_dir($imgDir)) {
        mkdir($imgDir, 0777, true);
    }

    // Proses upload gambar
    $gambar = basename($_FILES['gambar']['name']);
    $gambarPath = $imgDir . $gambar;

    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $gambarPath)) {

        // Hitung ID baru
        $id = 1;
        if (file_exists('produk.csv')) {
            $rows = file('produk.csv', FILE_SKIP_EMPTY_LINES);
            $id = count($rows); // Asumsikan baris pertama adalah header
        }

        // Simpan data ke CSV
        $data = [$id, $nama, $deskripsi, $harga, $gambar];
        $fp = fopen('produk.csv', 'a');
        if ($id === 1) {
            // Tambah header kalau baru dibuat
            fputcsv($fp, ['id', 'nama', 'deskripsi', 'harga', 'gambar']);
        }
        fputcsv($fp, $data);
        fclose($fp);

        // Redirect
        header('Location: dashboard_admin.php');
        exit();
    } else {
        echo "Gagal mengupload gambar.";
    }
}
?>
