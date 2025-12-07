<?php
    include 'header.php';
    include '../koneksi.php';
?>

<style>
    .panel-modern {
        background: #fdceceff;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        margin-top: 20px;
    }
    .table thead th {
        background: #a3c4f5ff;
        color: white;
        text-align: center;
    }
    .status-badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        color: white;
        font-weight: bold;
    }

    .status-pinjam { background: #3498db; }      /* Dipinjam */
    .status-kembali { background: #ff69b4; }     /* Dikembalikan */
    .status-unknown { background: #7f8c8d; }
</style>

<div class="container">

    <div class="alert alert-primary text-center mt-3">
        <h4 style="margin-bottom: 0;">
            <b>Selamat Datang!</b> Sistem Informasi Rental Kendaraan RPL Skanega
        </h4>
    </div>

    <div class="panel-modern">
        <h4 class="mb-3 text-primary">
            <i class="bi bi-clock-history"></i> <b>Riwayat Pinjam Terbaru</b>
        </h4>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama User</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Kendaraan</th>
                        <th>Tgl. Pinjam</th>
                        <th>Tgl. Kembali</th>
                    </tr>
                </thead>

                <tbody>
                <?php

                   $query = "
                       SELECT 
                           pinjam.*, 
                           user.user_nama, 
                           user.user_alamat, 
                           kendaraan.kendaraan_nama
                       FROM pinjam
                       LEFT JOIN user 
                           ON pinjam.user_id = user.user_id
                       LEFT JOIN kendaraan 
                           ON pinjam.kendaraan_nomor = kendaraan.kendaraan_nomor
                       ORDER BY pinjam.pinjam_id DESC
                       LIMIT 10
                   ";

                    $data = mysqli_query($koneksi, $query);
                    $no = 1;

                    while ($d = mysqli_fetch_array($data)) {

                        // Status badge -- SUDAH DIBENERIN
                        if ($d['pinjam_status'] == '1') {
                            $badge = "<span class='status-badge status-pinjam'>DIPINJAM</span>";
                        } elseif ($d['pinjam_status'] == '2') {
                            $badge = "<span class='status-badge status-kembali'>DIKEMBALIKAN</span>";
                        } else {
                            $badge = "<span class='status-badge status-unknown'>UNKNOWN</span>";
                        }

                        // Jika kendaraan kosong
                        $kendaraan = $d['kendaraan_nama'] ?? "<span style='color:red;'>Tidak ditemukan</span>";
                ?>

                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $d['user_nama']; ?></td>
                        <td><?= $d['user_alamat']; ?></td>
                        <td class="text-center"><?= $badge; ?></td>
                        <td><?= $kendaraan; ?></td>
                        <td><?= date('d-m-Y', strtotime($d['tgl_pinjam'])); ?></td>
                        <td><?= date('d-m-Y', strtotime($d['tgl_kembali'])); ?></td>
                    </tr>

                <?php } ?>
                </tbody>

            </table>
        </div>

    </div>
</div>

<?php
include 'footer.php';
?>




