<?php 
    include 'header.php';
?>

<div class="container">
    <div class="panel">

        <div class="panel-heading">
            <h3 class="text-center fw-bold">Data Peminjaman</h3>
        </div>

        <div class="panel-body">

            <a href="pinjam_tambah.php" 
               class="btn btn-sm btn-info pull-right mb-3">
                + Tambah Peminjaman
            </a>

            <table class="table table-bordered table-striped table-hover mt-3">
                <thead class="table-secondary text-center">
                    <tr>
                        <th width="5%">No</th>
                        <th>No Kendaraan</th>
                        <th>Nama User</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th width="15%">Opsi</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                    include '../koneksi.php';

                    // JOIN ke tabel user
                    $sql = "
                        SELECT pinjam.*, user.user_nama 
                        FROM pinjam 
                        LEFT JOIN user ON pinjam.user_id = user.user_id
                        ORDER BY pinjam_id DESC
                    ";
                    
                    $data = mysqli_query($koneksi, $sql);

                    if (!$data) {
                        echo "<tr><td colspan='7' class='text-center text-danger'>
                                Error: " . mysqli_error($koneksi) . "
                              </td></tr>";
                    } else {

                        $no = 1;
                        while ($d = mysqli_fetch_array($data)) {
                ?>
                    <tr class="align-middle text-center">
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($d['kendaraan_nomor']); ?></td>

                        <!-- Menampilkan nama user, bukan ID -->
                        <td><?= htmlspecialchars($d['user_nama']); ?></td>

                        <td><?= $d['tgl_pinjam']; ?></td>
                        <td><?= $d['tgl_kembali']; ?></td>

                        <td>
                            <?php if ($d['pinjam_status'] == 1): ?>
                                <span class="badge bg-success">Kembali</span>
                            <?php else: ?>
                                <span class="badge bg-warning text-dark">Dipinjam</span>
                            <?php endif; ?>
                        </td>

                        <td>
                            <a href="pinjam_edit.php?id=<?= $d['pinjam_id']; ?>" 
                               class="btn btn-sm btn-info">
                                Edit
                            </a>

                            <a href="pinjam_hapus.php?id=<?= $d['pinjam_id']; ?>" 
                               onclick="return confirm('Yakin ingin menghapus data ini?');"
                               class="btn btn-sm btn-danger">
                                Hapus
                            </a>
                        </td>
                    </tr>
                <?php 
                        } 
                    }
                ?>
                </tbody>
            </table>

        </div>
    </div>
</div>




<?php include 'footer.php'; ?>
