<?php include 'header.php'; ?>

<style>
    body {
        background: #ffe6f2;
        font-family: "Poppins", sans-serif;
    }

    .panel {
        background: white;
        border-radius: 15px;
        padding: 25px;
        border: 2px solid #ff99cc;
        box-shadow: 0 0 12px rgba(255, 153, 204, 0.3);
    }

    .panel-heading h4 {
        text-align: center;
        font-weight: 700;
        color: #ff4da6;
    }

    label {
        font-weight: 600;
        color: #ff1a8c;
    }

    .form-control {
        border: 2px solid #ffb3d9;
        background: #fff0f7;
        border-radius: 10px;
        padding: 10px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #ff4da6 !important;
        box-shadow: 0 0 7px rgba(255, 77, 166, 0.6);
    }

    .btn-primary {
        width: 100%;
        background: #ff4da6;
        border-color: #ff1a8c;
        font-weight: 600;
        border-radius: 10px;
        padding: 10px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: #ff1a8c;
        border-color: #e60073;
    }

    @media (max-width: 768px) {
        .col-md-5 {
            width: 90%;
            margin: 0 auto;
        }
    }
</style>

<div class="container">
    <br/><br/><br/>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Tambah Pinjaman Baru</h4>
            </div>

            <div class="panel-body">
                <form method="post" action="pinjam_aksi.php">

                    <!-- Kendaraan sekarang pakai input text -->
                    <div class="form-group mb-3">
                        <label>Kendaraan</label>
                        <input type="text" class="form-control" name="kendaraan_nomor" placeholder="Masukkan nomor atau nama kendaraan..." required>
                    </div>

                    <div class="form-group mb-3">
                        <label>User</label>
                        <select class="form-control" name="user_id" required>
                            <option value="">-- Pilih User --</option>
                            <?php
                            include '../koneksi.php';
                            $users = mysqli_query($koneksi, "SELECT * FROM user");
                            while($u = mysqli_fetch_array($users)) {
                                echo "<option value='".$u['user_id']."'>".$u['user_nama']."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label>Tanggal Pinjam</label>
                        <input type="date" class="form-control" name="tgl_pinjam" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Tanggal Kembali</label>
                        <input type="date" class="form-control" name="tgl_kembali" required>
                    </div>

                    <div class="form-group mb-4">
                        <label>Status Pinjam</label>
                        <select class="form-control" name="pinjam_status" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="1">Dipinjam</option>
                            <option value="2">Dikembalikan</option>
                        </select>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Simpan Pinjaman">
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>








