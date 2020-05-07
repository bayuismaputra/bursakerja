<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../fontawesome-free/css/all.min.css">
    <title>Bursa Kerja</title>
</head>

<body>
    <div class="wrapper">
        <div class="top-navbar">
            <div class="brand">Bursa <span>SAW</span></div>

            <div class="input-group col-md-5">
                <form action="" method="GET">
                    <input type="text" name="posisi" class="form-control" placeholder="Posisi atau Perusahaan" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <input type="text" name="kota" class="form-control kota" placeholder="Kota" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-success btn-sm" type="submit" name="menu" value="cari_lowongan" id="button-addon2">Cari lowongan</button>
                        <!-- <a href="" class="btn btn-primary tombol">Cari lowongan</a> -->
                    </div>
                </form>
            </div>
            <div class="menu">
                <div class="profile-wrap">
                    <div class="profile">
                        <span class="name"> Hi, <?php echo ucfirst($_SESSION["username"]) ?></span>
                        <a href="?menu=logout"><span class="logout btn btn-success btn-sm" href="?menu=logout"><i class="fas fa-sign-out-alt"></i> Logout</span></a>
                    </div>
                    <!-- <h6>
                            <a href="#" class="name text-white" style="text-decoration: none;"></a>
                            <a class="logout text-white btn btn-dark btn-sm" style="text-decoration: none;" href="?menu=logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </h6> -->
                </div>
            </div>
        </div>

        <div class="row no-gutters mt-5">

            <!-- sidebar -->
            <?php include("sidebar_pelamar.php") ?>

            <!-- .sidebar -->
            <?php include("../perusahaan/menu.php") ?>

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="../bootstrap/js/jquery-3.4.1.slim.min.js">
            </script>
            <script src="../bootstrap/js/popper.min.js">
            </script>
            <script src="../bootstrap/js/bootstrap.min.js">
            </script>
</body>

</html>