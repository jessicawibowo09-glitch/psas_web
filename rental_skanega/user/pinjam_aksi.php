<?php 

// menghubungkan dengan koneksi
include '../koneksi.php';

// menangkap data dari form
$kendaraan_nomor = $_POST['kendaraan_nomor'];
$user_id         = $_POST['user_id'];
$tgl_pinjam      = $_POST['tgl_pinjam'];
$tgl_kembali     = $_POST['tgl_kembali'];
$pinjam_status   = $_POST['pinjam_status'];

// input data ke tabel pinjam
mysqli_query($koneksi, "INSERT INTO pinjam VALUES(
    '',
    '$kendaraan_nomor',
    '$user_id',
    '$tgl_pinjam',
    '$tgl_kembali',
    '$pinjam_status'
)") or die(mysqli_error($koneksi));

echo "<script>alert('Data Pinjam Tersimpan'); window.location.href='pinjam.php'</script>";

?>
