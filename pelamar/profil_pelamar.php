<div class="col-lg-10 main-container">
    <div class="container">
        <div class="judul-content">
            <h5><i class="fas fa-tachometer-alt mr-2"></i> PROFIL</h5>
            <a class="btn btn-info mb-2" href="?menu=edit_profil"><i class="fa fa-edit"></i> Edit</a>
        </div>
        <div class="content">
            <!-- <table class="table table-borderless tabel-profil"> -->
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
            <div class="row profil-pelamar">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-5">
                            <ul>
                                <li><i class="fas fa-user"></i> <?php echo $row['nama_lengkap'] ?></li>
                                <li><i class="fas fa-envelope-square"></i> <?php echo $row['email'] ?></li>
                                <li><i class="fas fa-map-marker-alt"></i> Alamat</li>
                                <li><i class="fas fa-street-view"></i> Tempat Lahir</li>
                                <li><i class="fas fa-birthday-cake"></i> Tanggal Lahir</li>
                            </ul>
                        </div>
                        <div class="col-lg-5">
                            <ul>
                                <li><i class="fas fa-venus-mars"></i> Jenis Kelamin</li>
                                <li><i class="fas fa-phone-square"></i> Nomor Telpon</li>
                                <li><i class="fas fa-ring"></i> Status Nikah</li>
                                <li><i class="fas fa-file"></i> Curriculum Vitae</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>