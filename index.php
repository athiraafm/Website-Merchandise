<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Toko</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <div class="logo">K - PLACE</div>
        <ul class="menu">
            <li><a href="#beranda">Beranda</a></li>
            <li><a href="#produk">Produk</a></li>
            <li><a href="#testimoni">Testimoni</a></li>
            <li><a href="#order">Order</a></li>
            <li><a href="login.php">Login</a></li>
</ul>

        </ul>
    </nav>

    <section id="beranda" class="beranda">
        <div class="beranda-content">
            <h1>Selamat Datang!</h1>
            <p>Temukan produk terbaik kami dengan kualitas terjamin.</p>
            <div class="beranda-buttons">
                <a href="#produk" class="btn">Jelajahi Produk Kami</a>
                <a href="#testimoni" class="btn btn-secondary">Lihat Testimoni</a>
            </div>
        </div>
    </section>

    <section id="produk" class="produk">
        <h2>Produk Kami</h2>
        <div class="produk-container">
        <?php
        if (($handle = fopen("produk.csv", "r")) !== FALSE) {
            $header = fgetcsv($handle);
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if (count($data) < 5) continue;

                $id = $data[0];
                $nama = $data[1];
                $deskripsi = $data[2];
                $harga = is_numeric($data[3]) ? (int)$data[3] : 0;
                $gambar = $data[4];

                echo "<div class='produk-item'>";
                echo "<img src='img/{$gambar}' alt='{$nama}'>";
                echo "<h3>{$nama}</h3>";
                echo "<p>{$deskripsi}</p>";
                echo "<span class='harga'>Rp " . number_format($harga, 0, ',', '.') . "</span>";
                echo "<a href='#order' class='btn'>Pesan Sekarang</a>";
                echo "</div>";
            }
            fclose($handle);
        }
        ?>
    </div>
    </section>
    <section id="testimoni" class="testimoni">
        <h2>Apa Kata Mereka?</h2>
        <div class="testimoni-container">
            <div class="testimoni-item">
                <img src="tira.jpg" alt="Testimoni 1">
                <p>"Produk original dan pengiriman super cepat! Aku sangat puas dengan pembelian album ini."</p>
                <span>- Athira, Jakarta</span>
            </div>
            <div class="testimoni-item">
                <img src="jongu.jpg" alt="Testimoni 2">
                <p>"Pelayanan sangat ramah dan responsif! Barang dikemas dengan baik dan sampai tanpa cacat."</p>
                <span>- Khail, Jakarta</span>
            </div>
            <div class="testimoni-item">
                <img src="dinda.jpg" alt="Testimoni 3">
                <p>"Pesanan kedua saya di sini dan tetap puas! Lightsticknya asli dan sesuai deskripsi."</p>
                <span>- Dinda, Surabaya</span>
            </div>
            <div class="testimoni-item">
                <img src="alya.jpg" alt="Testimoni 4">
                <p>"Suka banget sama photocard bonusnya! Barang dikemas dengan sangat baik."</p>
                <span>- Alya, Balikpapan</span>
            </div>
            <div class="testimoni-item">
                <img src="haruto.jpg" alt="Testimoni 2">
                <p>"Albumnya original dan pengiriman super cepat. Recommended banget!"</p>
                <span>- Ruto, Bandung</span>
            </div>
        </div>
    </section>

    <section id="order" class="order">
        <h2>Form Pemesanan</h2>
        <form id="orderForm" enctype="multipart/form-data">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" required></textarea>

            <label for="telepon">No. Telepon:</label>
            <input type="tel" id="telepon" name="telepon" required pattern="[0-9]+" title="Masukkan angka saja">

            <label for="produk">Produk yang Dipesan:</label>
            <select id="produk" name="produk" required>
                <option value="">Pilih Produk</option>
                <option value="NCT - Golden Age">NCT - Golden Age</option>
                <option value="IVE - I'VE MINE">IVE - I'VE MINE</option>
                <option value="BAEMON - Album">BAEMON - Album</option>
                <option value="TREASURE - REBOOT">TREASURE - REBOOT</option>
                <option value="NCT Lightstick">NCT Lightstick</option>
                <option value="IVE Keychain">IVE Keychain</option>
            </select>

            <label for="metode">Metode Pembayaran:</label>
            <select id="metode" name="metode" required>
                <option value="">Pilih Metode</option>
                <option value="Transfer Bank">Transfer Bank</option>
                <option value="E-Wallet">E-Wallet</option>
            </select>

            <label for="bukti">Upload Bukti Pembayaran:</label>
            <input type="file" id="bukti" name="bukti" accept="image/*" required>

            <button type="submit">Submit</button>
        </form>
    </section>

    <script src="script.js"></script>

</body>
</html>