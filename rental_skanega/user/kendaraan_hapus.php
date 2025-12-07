<?php
include '../koneksi.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Prepared statement untuk hapus berdasarkan kendaraan_nomor (string)
    $stmt = mysqli_prepare($koneksi, "DELETE FROM kendaraan WHERE kendaraan_nomor = ?");
    if(!$stmt){
        die("Prepare statement gagal: ".mysqli_error($koneksi));
    }

    mysqli_stmt_bind_param($stmt, "s", $id); // "s" = string
    $execute = mysqli_stmt_execute($stmt);

    if($execute){
        echo "<script>
                alert('Kendaraan berhasil dihapus');
                window.location.href = 'kendaraan.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus kendaraan: ".mysqli_error($koneksi)."');
                window.location.href = 'kendaraan.php';
              </script>";
    }

    mysqli_stmt_close($stmt);

} else {
    echo "<script>
            alert('ID kendaraan tidak ditemukan');
            window.location.href = 'kendaraan.php';
          </script>";
}
?>






