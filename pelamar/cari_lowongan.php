<div class="col-lg-10 main-container">
    <div class="container">
        <div class="judul-content">
            <h5><i class="fas fa-search fa-sm"></i> Cari Lowongan</h5>
        </div>
        <?php include('../require/kelas_lowongan.php');
        include('../require/kelas_lamaran.php');

        $lamaran = new Pelamar();
        $cari_lowongan = new lowongan();
        $qPelamar = $lamaran->getDatapelamar($_SESSION['id_user']);
        $resPelamar = $qPelamar->fetch();
        $data_lowongan = $cari_lowongan->GetData("JOIN perusahaan ON lowongan.id_perusahaan=perusahaan.id_perusahaan WHERE perusahaan.nama_perusahaan LIKE '%$_GET[posisi]%' OR lowongan.nama_lowongan LIKE '%$_GET[posisi]%'");
        // $no = 1;
        $tanggal_now = new DateTime();
        while ($value = $data_lowongan->fetch(PDO::FETCH_ASSOC)) {
            // var_dump($value);
            $tanggal_tutup = new DateTime($value['tanggal_tutup']);
            $interval = $tanggal_now->diff($tanggal_tutup);
            // echo $interval->format('%R%a');
            if ($interval->format('%R%a') >= 0) {
        ?>
                <div class="content">
                    <div class="row">
                        <div class="col-lg-3">
                            <img src="../uploud/<?php echo $value['logo_perusahaan'] ?>" class="img-fluid" alt="Logo Perusahaan">
                        </div>
                        <div class="col-lg-7 cari-lowongan">
                            <div class="row profil-user">
                                <div class="col-md-5">
                                    <ul>
                                        <li><i class="fas fa-user"></i> Nama Lowongan</strong></li>
                                        <li><i class="fas fa-building"></i> Nama Perusahaan</strong></li>
                                        <li><i class="fas fa-building"></i> Departemen</span></li>
                                        <li><i class="fas fa-map-marker-alt"></i> Kota</span></li>
                                        <li><i class="fas fa-suitcase"></i> Pengalaman Kerja</li>
                                        <li><i class="far fa-calendar-times"></i> Tanggal Tutup</li>
                                        <li><i class="fas fa-money-bill-wave"></i> Gaji</li>
                                    </ul>
                                </div>
                                <div class="col-md-7">
                                    <ul>
                                        <li><i class="fas fa-user i"></i> <strong><?php echo ': ' . $value['nama_lowongan'] ?></strong></li>
                                        <li><i class="fas fa-user i"></i> <strong><?php echo ': ' . $value['nama_perusahaan'] ?></strong></li>
                                        <li><i class="fas fa-user i"></i> <span><?php echo ': ' . $value['departemen'] ?></span></li>
                                        <li><i class="fas fa-user i"></i> <span><?php echo ': ' . $value['kota'] ?></span></li>
                                        <li><i class="fas fa-user i"></i> <?php echo ': ' . $value['pengalaman_kerja'] ?></li>
                                        <li><i class="far fa-user i"></i> <?php echo ': ' . date("d-m-Y", strtotime($value['tanggal_tutup'])) ?></li>
                                        <li><i class="fas fa-user i"></i> <?php echo ': ' . 'Rp. ' . $value['gaji'] ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <?php
                            $qjurusan = $cari_lowongan->queryCustom("SELECT * FROM lowongan_detail where id_lowongan={$value['id_lowongan']} and id_jurusan={$resPelamar['id_jurusan']}");

                            ?>
                            <a href="<?= ($qjurusan->rowCount() > 0) ? '?menu=detail_lowongan&id_lowongan=' . $value['id_lowongan'] : '#' ?>" class="btn btn-success tombol-lamar" <?= ($qjurusan->rowCount() > 0) ? '' : 'onclick="alert(\'Jurusan Anda tidak sesuai untuk melamar.\')"' ?>>Lamar</a>
                            <!-- <a href="?menu=detail_lowongan&id_lowongan=<?php echo $value['id_lowongan'] ?>" class="tombol-lamar btn btn-success"> Lamar</a> -->

                        </div>
                    </div>


                </div>
        <?php
            }
        }
        ?>

    </div>
</div>