<?php
include '../koneksi.php';

// Ambil data dari form
$pinjam_id       = $_POST['pinjam_id'];
$kendaraan_nomor = $_POST['kendaraan_nomor'];
$user_id         = $_POST['user_id'];
$tgl_pinjam      = $_POST['tgl_pinjam'];
$tgl_kembali     = $_POST['tgl_kembali'];
$pinjam_status   = $_POST['pinjam_status'];

// Query update
mysqli_query($koneksi, "UPDATE pinjam SET 
    kendaraan_nomor = '$kendaraan_nomor',
    user_id = '$user_id',
    tgl_pinjam = '$tgl_pinjam',
    tgl_kembali = '$tgl_kembali',
    pinjam_status = '$pinjam_status'
    WHERE pinjam_id = '$pinjam_id'
");

// Kembali ke halaman data pinjam
echo "<script>
        alert('Perubahan Data Pinjaman Berhasil Disimpan');
        window.location.href = 'pinjam.php';
      </script>";
?>

