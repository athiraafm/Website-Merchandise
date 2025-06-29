document.getElementById('orderForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let formData = new FormData(this);

    fetch('save_order.php', {
        method: 'POST',
        body: formData
    }).then(response => response.text())
    .then(data => {
        alert("Pemesanan berhasil dilakukan. Silahkan tunggu kabar melalui email dan nomor telepon.");
        document.getElementById('orderForm').reset();
    }).catch(error => {
        console.error("Error:", error);
    });
});
const inputHarga = document.getElementById('harga_produk');
const inputHidden = document.getElementById('harga_produk_hidden');

if (inputHarga && inputHidden) {
    // Format saat input
    inputHarga.addEventListener('input', function () {
        let angka = this.value.replace(/\D/g, '');
        let formatRupiah = new Intl.NumberFormat('id-ID').format(angka);
        this.value = 'Rp ' + formatRupiah;
        inputHidden.value = angka;
    });

    // Isi hidden juga saat submit (backup)
    inputHarga.form.addEventListener('submit', function () {
        let angka = inputHarga.value.replace(/\D/g, '');
        inputHidden.value = angka;
    });

    // Isi awal saat halaman dimuat
    window.addEventListener('DOMContentLoaded', function () {
        let angka = inputHarga.value.replace(/\D/g, '');
        inputHidden.value = angka;
    });
}
