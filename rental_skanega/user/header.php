<!DOCTYPE html>
<html>
<head>
    <title>Sistem Informasi Rental</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>

    <style>
        body {
            background: #ffe6f2;
            font-family: "Poppins", sans-serif;
        }

        /* Navbar Pink */
        .navbar-pink {
            background: #ff66b3;
            border: none;
            border-radius: 0;
            box-shadow: 0 2px 6px rgba(255, 51, 153, 0.3);
        }

        .navbar-pink .navbar-brand,
        .navbar-pink .nav > li > a {
            color: white !important;
            font-weight: 500;
        }

        .navbar-pink .navbar-brand:hover,
        .navbar-pink .nav > li > a:hover {
            color: #ffe6f2 !important;
        }

        .navbar-pink .navbar-text {
            color: white;
            font-weight: 600;
        }

        .navbar-pink .glyphicon {
            margin-right: 4px;
        }
    </style>

</head>

<body>
<?php 
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../index_user.php?pesan=belum_login");
}
?>

<nav class="navbar navbar-pink">
    <div class="container-fluid">

        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">
                RENTAL
            </a>
        </div>

        <div class="collapse navbar-collapse">

            <ul class="nav navbar-nav">
                <li><a href="index_user.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                <li><a href="kendaraan.php"><i class="glyphicon glyphicon-road"></i> Kendaraan</a></li>
                <li><a href="pinjam.php"><i class="glyphicon glyphicon-list-alt"></i> Pinjam</a></li>
                <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <p class="navbar-text">
                        Halo, <b><?php echo $_SESSION['username']; ?></b>!
                    </p>
                </li>
            </ul>

        </div>

    </div>
</nav>


