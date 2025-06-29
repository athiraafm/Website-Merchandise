<?php
session_start();
if (!isset($_SESSION["level"]) || $_SESSION["level"] !== "admin") {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$rows = file('produk.csv');
$header = array_shift($rows);
$output = [$header];

foreach ($rows as $row) {
    $data = str_getcsv($row);
    if ($data[0] != $id) {
        $output[] = $data;
    }
}

$fp = fopen("produk.csv", "w");
foreach ($output as $line) {
    fputcsv($fp, is_array($line) ? $line : str_getcsv($line));
}
fclose($fp);

header("Location: lihat_produk_admin.php");
exit();
?>
