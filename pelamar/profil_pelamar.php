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
            $profile = $user->getData("JOIN pelamar ON user.id_user=pelamar.id_user 
            JOIN jurusan on pelamar.id_jurusan=jurusan.id_jurusan WHERE user.id_user=pelamar.id_user AND user.id_user={$id_user}");
            $row = $profile->fetch(PDO::FETCH_ASSOC);
            // print_r($row);
            if ($row['email'] == '-' || $row['alamat'] == '-' || $row['tempat_lahir'] == '-' || $row['tanggal_lahir'] == '0000-00-00' || $row['jenis_kelamin'] == '-' || $row['no_telpon'] == '-' || $row['status_nikah'] == '-' || $row['curriculum_vitae'] == '-') {
                echo '
                <div class="alert alert-warning" role="alert">
                    Lengkapi Data Profil Anda
                </div>
                ';
            }
            ?>
            <div class="row profil-user">
                <div class="col-lg-3">
                    <img src="../uploud/<?php echo $row['foto_pelamar'] ?>" class="img img-thumbnail" alt="Foto Pelamar">
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-3">
                            <ul>
                                <li><i class="fas fa-user"></i>Nama Lengkap</li>
                                <li><i class="fas fa-envelope-square"></i>Email</li>
                                <li><i class="fas fa-street-view"></i>Tempat Lahir</li>
                                <li><i class="fas fa-birthday-cake"></i>Tanggal Lahir</li>
                                <li><i class="fas fa-venus-mars"></i>jenis Kelamin</li>
                                <li><i class="fas fa-phone-square"></i>No. Telepon</li>
                                <li><i class="fas fa-ring"></i>Status Nikah</li>
                                <li><i class="fas fa-ring"></i>Nama Sekolah</li>
                                <li><i class="fas fa-user-graduate"></i>Pendidikan</li>
                                <li><i class="fas fa-user-graduate"></i>Jurusan</li>
                                <li><i class="fas fa-calendar-check"></i>Tahun Lulus</li>
                                <li><i class="fas fa-book-reader"></i>IPK</li>
                                <li><i class="fas fa-file"></i>Curriculum Vitae</li>
                                <li><i class="fas fa-map-marker-alt"></i>Alamat</li>
                            </ul>
                        </div>
                        <div class="col-lg-7">
                            <ul>
                                <li><i class="fas fa-user i"></i> <?php echo ': ' . $row['nama_lengkap'] ?></li>
                                <li><i class="fas fa-user i"></i> <?php echo ': ' . $row['email'] ?></li>
                                <li><i class="fas fa-user i"></i> <?php echo ': ' . $row['tempat_lahir'] ?></li>
                                <li><i class="fas fa-user i"></i> <?php echo ': ' . date("d-m-Y", strtotime($row['tanggal_lahir'])) ?></li>
                                <li><i class="fas fa-user i"></i> <?php echo ': ' . $row['jenis_kelamin'] ?></li>
                                <li><i class="fas fa-user i"></i> <?php echo ': ' . $row['no_telpon'] ?></li>
                                <li><i class="fas fa-user i"></i> <?php echo ': ' . $row['status_nikah'] ?></li>
                                <li><i class="fas fa-user i"></i> <?php echo ': ' . $row['nama_sekolah'] ?></li>
                                <li><i class="fas fa-user i"></i> <?php echo ': ' . $row['pendidikan'] ?></li>
                                <li><i class="fas fa-user i"></i> <?php echo ': ' . $row['jurusan'] ?></li>
                                <li><i class="fas fa-user i"></i> <?php echo ': ' . $row['tahun_lulus'] ?></li>
                                <li><i class="fas fa-user i"></i> <?php echo ': ' . $row['ipk'] ?></li>
                                <li><i class="fas fa-user i"></i> <?php echo ': ' . $row['curriculum_vitae'] ?></li>
                                <li><i class="fas fa-user i"></i> <?php echo ': ' . $row['alamat'] ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>