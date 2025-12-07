<?php
include 'header.php';
include '../koneksi.php';
?>

<div class="container">
    <div class="alert alert-info text-center">
        <h4 style="margin-bottom: 0px;"><b>Selamat Datang!</b> Di Sistem Informasi Peminjaman Kendaraan</h4>
    </div>

    <div class="panel">
        <div class="panel-heading">
            <h4>Riwayat Peminjaman Terakhir</h4>
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>NO</th>
                    <th>Id pinjam</th>
                    <th>Alamat</th>
                    <th>Tanggal Pinjam</th>
                    <th>User</th>
                    <th>Kendaraan</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                </tr>

                <?php
                $data = mysqli_query($koneksi,
                    "SELECT * FROM pinjam 
                    JOIN user ON pinjam.user_id = user.user_id
                    JOIN kendaraan ON pinjam.kendaraan_nomor = kendaraan.kendaraan_nomor
                    ORDER BY pinjam_id DESC LIMIT 10");

                $no = 1;
                while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['pinjam_id']; ?></td>
                    <td><?= $d['user_alamat']; ?></td>
                    <td><?= $d['tgl_pinjam']; ?></td>
                    <td><?= $d['user_nama']; ?></td>
                    <td><?= $d['kendaraan_nama']; ?></td>
                    <td><?= $d['tgl_kembali']; ?></td>
                    <td>
                        <?php
                        if ($d['pinjam_status'] == 1) {
                            echo "<div class='label label-warning'>READY</div>";
                        } elseif ($d['pinjam_status'] == 2) {
                            echo "<div class='label label-success'>DIPINJAM</div>";
                        }
                        ?>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>

</div>