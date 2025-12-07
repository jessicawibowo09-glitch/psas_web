<?php 

// menghubungkan dengan koneksi
include '../koneksi.php';

// menangkap data dari form
$kendaraan_nomor        = $_POST['kendaraan_nomor'];
$kendaraan_nama         = $_POST['kendaraan_nama'];
$kendaraan_tipe         = $_POST['kendaraan_tipe'];
$kendaraan_harga_perhari = $_POST['kendaraan_harga_perhari'];

// input data ke tabel kendaraan
mysqli_query($koneksi, "INSERT INTO kendaraan VALUES(
    '$kendaraan_nomor',
    '$kendaraan_nama',
    '$kendaraan_tipe',
    '$kendaraan_harga_perhari'
)");

echo "<script>alert('Data Kendaraan Tersimpan'); window.location.href='kendaraan.php'</script>";

?>
