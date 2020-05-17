<div class="col-lg-10 main-container">
    <div class="container">
        <div class="judul-content">
            <h5><i class="fas fa-tachometer-alt mr-2"></i> PROFIL</h5>
            <a class="btn btn-info mb-2" href="?menu=edit_profil"><i class="fa fa-edit"></i> Edit</a>
        </div>
        <div class="content">
            <table class="table table-borderless">
                <?php
                include("../require/koneksi.php");
                $id_user = $_SESSION['id_user'];
                $user = new User();
                print_r($_SESSION);
                $profile = $user->getData("where id_user={$id_user}");
                $row = $profile->fetch(PDO::FETCH_ASSOC);
                // echo $row['nama_lengkap'];
                ?>
                Disini tampilan lengkap data diri dari tabel user dan pelamar atau perusahaan, apabila data belum atau tidak lengkap, beri notifikasi untuk melengkapi data.
                <tr>
                    <td style="width: 200px;">Nama Lengkap </td>
                    <td style="opacity: 50%;"><?= $row['nama_lengkap'] ?></td>
                </tr>
                <tr>
                    <td style="width: 200px;">Email</td>
                    <td style="opacity: 50%;"><?= $row['email'] ?></td>
                </tr>
                <tr>
                    <td>data jenis kelamin, tanggal dan bulan lahir dan data lain yang perlu ditampilkan dari user dan detailnya</td>
                </tr>
            </table>
        </div>
    </div>
</div>