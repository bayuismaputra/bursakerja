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

    <title>DAFTAR</title>

</head>

<body>
    <div class="container-fluid">
        <div class="login">
            <?php
            include "require/koneksi.php";

            if (isset($_POST['nama_lengkap']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
                $user = new User();

                $nama_lengkap = $_POST['nama_lengkap'];
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                $email = $_POST['email'];

                $qry = $user->Register($nama_lengkap, $username, $password, $email);
                if ($qry) {
                    echo "<script language='javascript'>alert('Register berhasil, silahkan login');document.location='index.php'</script>";
                } else {
                    echo "<script language='javascript'>alert('Gagal');document;location='index.php'</script>";
                }
            }
            ?>
            <h2 class="text-center mb-3">DAFTAR</h2>
            <form method="post" action="daftar.php">
                <div class="form-group">
                    <!-- <label for="">Nama Lengkap</label> -->
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                        </div>
                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
                    </div>
                </div>
                <div class="form-group">
                    <!-- <label for="">Email</label> -->
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-envelope-square"></i></div>
                        </div>
                        <input type="text" name="email" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <!-- <label for="">Username</label> -->
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                        </div>
                        <input type="text" name="username" class="form-control" placeholder="username">
                    </div>
                </div>
                <div class="form-group">
                    <!-- <label for="">Password</label> -->
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                        </div>
                        <input type="Password" name="" class="form-control" placeholder="Password">
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-block">DAFTAR</button>
                <small class="text-center mt-2">Sudah Punya Akun ? <a href="login.php">Masuk</a> Sekarang</small>
                <!-- <p class="text-center mb-2 "><small><i>Atau daftar dengan</i></small></p>
            <button class=" btn btn-light btn-block btn-outline-info text-center"><i class="fab fa-google"></i>  Daftar dengan Google</button>
             -->
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