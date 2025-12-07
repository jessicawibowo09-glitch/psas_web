<?php 
    include 'header.php';
?>

<div class="container">
    <div class="panel">

        <div class="panel-heading">
            <h4 class="text-center" style="font-weight:bold;">Data Kendaraan</h4>
        </div>

        <div class="panel-body">

            <a href="kendaraan_tambah.php" class="btn btn-sm btn-info pull-right" style="margin-bottom:10px;">
                + Tambah Kendaraan
            </a>

            <table class="table table-bordered table-striped table-hover">
                <thead class="bg-light">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nomor Kendaraan</th>
                        <th>Nama Kendaraan</th>
                        <th>Tipe</th>
                        <th>Harga Per Hari</th>
                        <th width="15%">Opsi</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                    include '../koneksi.php';
                    $data = mysqli_query($koneksi, "SELECT * FROM kendaraan ORDER BY kendaraan_nomor DESC");
                    $no = 1;

                    while ($d = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['kendaraan_nomor']; ?></td>
                        <td><?php echo $d['kendaraan_nama']; ?></td>
                        <td><?php echo $d['kendaraan_tipe']; ?></td>
                        <td>Rp <?php echo number_format($d['kendaraan_harga_perhari']); ?></td>

                        <td>
                            <a href="kendaraan_edit.php?id=<?php echo $d['kendaraan_nomor']; ?>" 
                               class="btn btn-sm btn-info">
                               Edit
                            </a>

                            <a href="kendaraan_hapus.php?id=<?php echo $d['kendaraan_nomor']; ?>" 
                               onclick="return confirm('Yakin hapus kendaraan ini?');"
                               class="btn btn-sm btn-danger">
                               Hapus
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
