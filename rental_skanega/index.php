<!DOCTYPE html>
<html>
<head>
    <title>Sistem Informasi Rental Kendaraan RPL Skanega</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
</head>

<body style="background: #f0f0f0;">

    <br><br><br>
    <center>
        <h2><strong>SISTEM INFORMASI</strong><br>RENTAL KENDARAAN RPL SKANEGA</h2>
    </center>
    <br><br><br>

    <div class="container">
        <div class="col-md-4 col-md-offset-4">

            <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "gagal") {
                    echo "<div class='alert alert-danger'>Login gagal! Username atau password salah!</div>";
                } elseif ($_GET['pesan'] == "logout") {
                    echo "<div class='alert alert-info'>Anda berhasil logout.</div>";
                } elseif ($_GET['pesan'] == "belum_login") {
                    echo "<div class='alert alert-warning'>Anda harus login untuk mengakses halaman!</div>";
                }
            }
            ?>

            <form method="post" action="login.php">
                <div class="panel">
                    <br>
                    <div class="panel-body">

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <input type="submit" class="btn btn-primary btn-block" value="Login">

                    </div>
                </div>
            </form>

        </div>
    </div>

</body>
</html>

