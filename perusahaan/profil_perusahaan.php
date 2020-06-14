<div class="col-lg-10 main-container">
    <div class="container">
        <div class="judul-content">
            <h5><i class="fas fa-tachometer-alt mr-2"></i> PROFIL</h5>
            <a class="btn btn-info mb-2" href="?menu=edit_profil_perusahaan"><i class="fa fa-edit"></i> Edit</a>
        </div>
        <div class="content">


            <!-- <table class="table table-borderless tabel-profil"> -->
            <?php
            $id_user = $_SESSION['id_user'];
            $user = new User();
            // print_r($_SESSION);
            $profile = $user->getData("INNER JOIN perusahaan WHERE user.id_user=perusahaan.id_user AND user.id_user={$id_user}");
            $row = $profile->fetch(PDO::FETCH_ASSOC);
            // print_r($row);
            if ($row['nama_perusahaan'] == '-' || $row['alamat'] == '-' || $row['kota'] == '-' || $row['email'] == '-') {
                echo '
                <div class="alert alert-warning" role="alert">
                    Lengkapi Profil Perusahaan Anda
                </div>
                ';
            }
            ?>


            <div class="row profil-user">

                <div class="col-lg-3">
                    <img src="../uploud/<?= $row['logo_perusahaan'] ?>" class="img img-thumbnail" alt="Logo Perusahaan">
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-4">
                            <ul>
                                <li><i class="fas fa-building"></i>Nama Perusahaan</li>
                                <li><i class="fas fa-envelope-square"></i>Email</li>
                                <li><i class="fas fa-map-marker-alt"></i>Alamat</li>
                                <li><i class="fas fa-street-view"></i>Kota</li>
                            </ul>
                        </div>
                        <div class="col-lg-8">
                            <ul>
                                <li><i class="fas fa-user i"></i><?= ($row['nama_perusahaan'] == '-') ? " : " : $row['nama_perusahaan'] ?></li>
                                <li><i class="fas fa-user i"></i><?= ($row['email'] == '-') ? ": " : $row['email'] ?></li>
                                <li><i class="fas fa-user i"></i><?= ($row['alamat'] == '-') ? ": " : $row['alamat'] ?></li>
                                <li><i class="fas fa-user i"></i><?= ($row['kota'] == '-') ? ": " : $row['kota'] ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>