<?php
include '../koneksi.php';

// Menangkap data dari form
$nomor      = $_POST['kendaraan_nomor'];
$nama       = $_POST['kendaraan_nama'];
$tipe       = $_POST['kendaraan_tipe'];
$harga      = $_POST['kendaraan_harga_perhari'];

// Query update
mysqli_query($koneksi, "UPDATE kendaraan SET 
    kendaraan_nama='$nama',
    kendaraan_tipe='$tipe',
    kendaraan_harga_perhari='$harga'
    WHERE kendaraan_nomor='$nomor'
");

// Setelah update, kembali ke halaman kendaraan dengan alert
echo "<script>
        alert('Perubahan Data Kendaraan Berhasil Disimpan');
        window.location.href = 'kendaraan.php';
      </script>";
?>
