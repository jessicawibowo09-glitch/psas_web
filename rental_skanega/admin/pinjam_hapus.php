<?php
include '../koneksi.php';

// Tangkap ID dari URL
$id = $_GET['id'];

// Hapus data dari tabel pinjam
mysqli_query($koneksi, "DELETE FROM pinjam WHERE pinjam_id='$id'");


echo "<script>
        alert('User berhasil dihapus');
        window.location.href = 'pinjam.php';
      </script>";
?>