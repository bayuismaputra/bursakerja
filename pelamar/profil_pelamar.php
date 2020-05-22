<div class="col-lg-10 main-container">
    <div class="container">
        <div class="judul-content">
            <h5><i class="fas fa-tachometer-alt mr-2"></i> PROFIL</h5>
            <a class="btn btn-info mb-2" href="?menu=edit_profil"><i class="fa fa-edit"></i> Edit</a>
        </div>
        <div class="content">

            <!-- <table class="table table-borderless tabel-profil"> -->
            <?php
            $id_user = $_SESSION['id_user'];
            $user = new User();
            // print_r($_SESSION);
            $profile = $user->getData("INNER JOIN pelamar WHERE user.id_user=pelamar.id_user AND user.id_user={$id_user}");
            $row = $profile->fetch(PDO::FETCH_ASSOC);
            // print_r($row);
            if ($row['email'] == '-' || $row['alamat'] == '-' || $row['tempat_lahir'] == '-' || $row['tanggal_lahir'] == '0000-00-00' || $row['jenis_kelamin'] == '-' || $row['no_telpon'] == '-' || $row['status_nikah'] == '-' || $row['curriculum_vitae'] == '-') {
                echo '
                <div class="alert alert-warning" role="alert">
                    Lengkapi Data!
                </div>
                ';
            }
            ?>
            <div class="row profil-user">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-5">
                            <ul>
                                <li><i class="fas fa-user"></i> <?php echo $row['nama_lengkap'] ?></li>
                                <li><i class="fas fa-envelope-square"></i> <?php echo $row['email'] ?></li>
                                <li><i class="fas fa-map-marker-alt"></i> <?php echo $row['alamat'] ?></li>
                                <li><i class="fas fa-street-view"></i> <?php echo $row['tempat_lahir'] ?></li>
                                <li><i class="fas fa-birthday-cake"></i> <?php echo $row['tanggal_lahir'] ?></li>
                            </ul>
                        </div>
                        <div class="col-lg-5">
                            <ul>
                                <li><i class="fas fa-venus-mars"></i> <?php echo $row['jenis_kelamin'] ?></li>
                                <li><i class="fas fa-phone-square"></i> <?php echo $row['no_telpon'] ?></li>
                                <li><i class="fas fa-ring"></i> <?php echo $row['status_nikah'] ?></li>
                                <li><i class="fas fa-file"></i> <?php echo $row['curriculum_vitae'] ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>