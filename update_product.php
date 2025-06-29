<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $deskripsi = $_POST["deskripsi"];
    $harga = $_POST["harga"];
    $gambar = $_FILES["gambar"]["name"] ? basename($_FILES["gambar"]["name"]) : $_POST["gambar_lama"];

    if ($_FILES["gambar"]["name"]) {
        move_uploaded_file($_FILES["gambar"]["tmp_name"], "img/" . $gambar);
    }

    $rows = file("produk.csv");
    $header = array_shift($rows);
    $output = [$header];

    foreach ($rows as $row) {
        $data = str_getcsv($row);
        if ($data[0] == $id) {
            $data = [$id, $nama, $deskripsi, $harga, $gambar];
        }
        $output[] = $data;
    }

    $fp = fopen("produk.csv", "w");
    foreach ($output as $line) {
        fputcsv($fp, is_array($line) ? $line : str_getcsv($line));
    }
    fclose($fp);

    header("Location: lihat_produk_admin.php");
    exit();
}
?>
