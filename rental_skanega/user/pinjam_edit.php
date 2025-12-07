<?php 
    include 'header.php';
?>

<div class="container">
    <br><br><br>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Edit Pinjam</h4>
            </div> 
            <div class="panel-body">

            <?php
            include '../koneksi.php';

            if(!isset($_GET['id'])) {
                die("Error: ID tidak ditemukan.");
            }

            $id = mysqli_real_escape_string($koneksi, $_GET['id']);
            $data = mysqli_query($koneksi, "SELECT * FROM pinjam WHERE pinjam_id='$id'");

            if(!$data){
                die("Query Error: " . mysqli_error($koneksi));
            }

            $d = mysqli_fetch_array($data);
            if(!$d){
                die("Data tidak ditemukan!");
            }
            ?>

            <form method="POST" action="pinjam_update.php">
                
                <!-- ID Pinjam (hidden agar tidak bisa diubah) -->
                <input type="hidden" name="pinjam_id" value="<?php echo $d['pinjam_id']; ?>">

                <div class="form-group">
                    <label>Nomor Kendaraan</label>
                    <input type="text" name="kendaraan_nomor" class="form-control"
                           value="<?php echo $d['kendaraan_nomor']; ?>" required>
                </div>

                <div class="form-group">
                    <label>ID User</label>
                    <input type="text" name="user_id" class="form-control"
                           value="<?php echo $d['user_id']; ?>" required>
                </div>

                <div class="form-group">
                    <label>Tanggal Pinjam</label>
                    <input type="date" name="tgl_pinjam" class="form-control"
                           value="<?php echo $d['tgl_pinjam']; ?>" required>
                </div>

                <div class="form-group">
                    <label>Tanggal Kembali</label>
                    <input type="date" name="tgl_kembali" class="form-control"
                           value="<?php echo $d['tgl_kembali']; ?>" required>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="pinjam_status" class="form-control" required>
                        <option value="0" <?php if($d['pinjam_status']==0) echo "selected"; ?>>Dipinjam</option>
                        <option value="1" <?php if($d['pinjam_status']==1) echo "selected"; ?>>Kembali</option>
                    </select>
                </div>

                <br>
                <input type="submit" class="btn btn-primary" value="Simpan">
            </form>

            </div>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>


