<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'] ?? '';
    $email = $_POST['email'] ?? '';
    $alamat = $_POST['alamat'] ?? '';
    $telepon = $_POST['telepon'] ?? '';
    $produk = $_POST['produk'] ?? '';
    $metode = $_POST['metode'] ?? '';
    
    $bukti = '';
    if (isset($_FILES["bukti"]) && $_FILES["bukti"]["error"] === 0) {
        $buktiDir = "bukti_pembayaran/";
        if (!is_dir($buktiDir)) {
            mkdir($buktiDir, 0777, true);
        }
        $bukti = $buktiDir . basename($_FILES["bukti"]["name"]);
        move_uploaded_file($_FILES["bukti"]["tmp_name"], $bukti);
    }

    $file = fopen("orders.csv", "a");
    fputcsv($file, [$nama, $email, $alamat, $telepon, $produk, $metode, $bukti]);
    fclose($file);

    echo "success";
} else {
    echo "error";
}
?>
