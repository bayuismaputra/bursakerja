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

            if ($_POST) {
                if (isset($_POST['nama_lengkap']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['hak_akses'])) {
                    $user = new User();
                    $pelamar = new Pelamar();
                    $perusahaan = new Perusahaan();

                    $nama_lengkap = $_POST['nama_lengkap'];
                    $username = $_POST['username'];
                    $password = md5($_POST['password']);
                    $hak_akses = $_POST['hak_akses'];

                    // register ke tabel user
                    $qry = $user->Register($nama_lengkap, $username, $hak_akses, $password);

                    // ambil id user untuk mengisi tabel pelamar atau perusahaan
                    $qry_get_user = $user->GetData("ORDER BY id_user DESC LIMIT 1");
                    $data = $qry_get_user->fetch();
                    $id_user = $data['id_user'];

                    if ($qry) {
                        // simpan detail data berdasarkan hak akses
                        if ($hak_akses == "pelamar") {
                            $insert_pelamar = $pelamar->InsertData('-', '-', '-', '0000-00-00', '-', '-', '-', '-', $id_user);
                        } else if ($hak_akses == "perusahaan") {
                            $insert_perusahaan = $perusahaan->InsertData($id_user, '-', '-', '-', 'default.png', '-');
                        }
                        echo "<script language='javascript'>alert('Register berhasil, silahkan login');document.location='http://localhost/bursakerja/index.php'</script>";
                    } else {
                        echo "<script language='javascript'>alert('Gagal');document.location='http://localhost/bursakerja/daftar.php'</script>";
                    }
                }
            }
            ?>
            <h2 class="text-center mb-3">DAFTAR</h2>
            <form method="post" action="">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                        <input type="text" name="username" class="form-control" placeholder="username">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-unlock-alt"></i>
                            </div>
                        </div>
                        <input type="Password" name="password" class="form-control" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <select id="inputState" name="hak_akses" class="form-control">
                        <option selected>Sebagai...</option>
                        <option value="pelamar">Pelamar</option>
                        <option value="perusahaan">Perusahaan</option>
                    </select>
                </div>

                <button type="submit" class="btn tombol-daftar btn-success btn-block">DAFTAR</button>
                <small class="text-center mt-2">Sudah Punya Akun ? <a href="login.php">Masuk</a> Sekarang</small>

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