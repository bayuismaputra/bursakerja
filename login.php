<?php
session_start();
include('require/koneksi.php');
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontawesome-free/css/all.min.css">

    <title>FORM LOGIN</title>

</head>

<body>
    <div class="container-fluid">
        <div class="login">
            <h4 class="text-center">LOGIN</h4>
            <?php
            if (isset($_POST['submit'])) {
                $login = new Bursakerja();
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                $cek = $login->LoginUser($username, $password);

                if ($cek->rowCount() > 0) {
                    $hak_akses = $cek->fetch();
                    $_SESSION['id_user'] = $hak_akses['id_user'];
                    $_SESSION['nama_lengkap'] = $hak_akses['nama_lengkap'];
                    $_SESSION['hak_akses'] = $hak_akses['hak_akses'];
                    $_SESSION['username'] = $hak_akses['username'];
                    if ($hak_akses['hak_akses'] == 'perusahaan') {
                        $perusahaan = $login->getDataperusahaan($hak_akses['id_user']);
                        if ($perusahaan->rowCount() > 0) {
                            $row = $perusahaan->fetch();
                            $_SESSION['id_perusahaan'] = $row['id_perusahaan'];
                        }

                        echo "<script language='javascript'>alert('Login Sukses'); document.location='perusahaan/dashboard.php'</script>";
                    } else if ($hak_akses['hak_akses'] == 'pelamar') {
                        $pelamar = $login->getDatapelamar($hak_akses['id_user']);
                        if ($pelamar->rowCount() > 0) {
                            $row = $pelamar->fetch();
                            $_SESSION['id_pelamar'] = $row['id_pelamar'];
                        }

                        echo "<script language='javascript'>alert('Login Sukses'); document.location='pelamar/dashboard_pelamar.php?menu=pelamar'</script>";
                    } else {
                        echo "<script language='javascript'>alert('Login Sukses'); document.location='daftar.php'</script>";
                    }
                } else {
                    echo "<script language='javascript'>alert('Username atau Password tidak valid'); document.location='login.php'</script>";
                }
            }
            ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="">Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                        </div>
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                        </div>
                        <input type="Password" name="password" class="form-control" placeholder="Password">
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary tombol-masuk">Masuk</button>
                <a href="?menu=halaman_utama"><button type="submit" name="batal" class="btn btn-danger tombol-batal">Batal</button></a>
            </form>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/js/jquery-3.4.1.slim.min.js">
    </script>
    <script src="bootstrap/js/popper.min.js">
    </script>
    <script src="bootstrap/js/bootstrap.min.js">
    </script>
</body>

</html>