<?php
session_start();
if (!isset($_SESSION["level"]) || $_SESSION["level"] !== "staf") {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Staf</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="staf">
    <div class="staf-container">
        <h2>Dashboard Staf</h2>
        <p class="greeting">Halo, <strong><?php echo $_SESSION["username"] ?? 'Staf'; ?></strong>! Ini adalah data order merch:</p>

        <div class="table-container">
        <table class="order-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Produk</th>
                    <th>Metode</th>
                    <th>Bukti</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if (($file = fopen("orders.csv", "r")) !== FALSE) {
                while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                    echo "<tr>";
                    foreach ($data as $key => $item) {
                        if ($key === 6) {
                            echo "<td><a href='" . htmlspecialchars($item) . "' target='_blank'>Lihat Bukti</a></td>";
                        } else {
                            echo "<td>" . htmlspecialchars($item) . "</td>";
                        }
                    }
                    echo "</tr>";
                }
                fclose($file);
            }
            ?>
            </tbody>
        </table>
        </div>

        <div class="logout-link">
            <p><a href="logout.php">Logout</a></p>
        </div>
    </div>
</body>
</html>
