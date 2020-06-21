<div class="col-lg-10 main-container">
    <div class="container">
        <div class="judul-content">
            <h5><i class="fas fa-tachometer-alt mr-2"></i> Detail lowongan</h5>
        </div>
        <div class="content">
            <h5>Profil Perusahaan</h5>
            <hr>
            <?php
            include('../require/kelas_lowongan.php');
            require("../require/kelas_kriteria.php");
            $kriteria = new Kriteria();
            $detail_lowongan = new lowongan();
            $data_lowongan = $detail_lowongan->GetData("JOIN perusahaan ON lowongan.id_perusahaan=perusahaan.id_perusahaan where lowongan.id_lowongan=$_GET[id_lowongan]");
            $data_kriteria = $kriteria->GetData("where id_lowongan=$_GET[id_lowongan]");
            $no = 1;
            while ($value = $data_lowongan->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <div class="row profil-user">
                    <div class="col-lg-3">
                        <img src="../uploud/<?php echo $value['logo_perusahaan'] ?>" class="img-fluid" alt="bayu">
                    </div>
                    <div class="col-lg-9">
                        <h5><i class="fas fa-building"></i> <?php echo 'Nama Perusahaan : ' . $value['nama_perusahaan'] ?></h5>
                    </div>
                </div>
        </div>
        <div class="content">
            <h5>Lowongan</h5>
            <hr>
            <div class="row profil-user">
                <div class="col-md-3">
                    <ul>
                        <li><i class="fas fa-user"></i>Nama Lowongan</strong></li>
                        <li><i class="fas fa-building"></i>Departemen</span></li>
                        <li><i class="fas fa-map-marker-alt"></i>Kota</span></li>
                        <li><i class="fas fa-suitcase"></i>Pengalaman Kerja</li>
                        <li><i class="far fa-calendar-plus"></i>Tanggal Buka</li>
                        <li><i class="far fa-calendar-times"></i>Tanggal Tutup</li>
                        <li><i class="fas fa-money-bill-wave"></i>Gaji</li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <ul>
                        <li><i class="fas fa-user i"></i> <strong><?php echo ': ' . $value['nama_lowongan'] ?></strong></li>
                        <li><i class="fas fa-user i"></i> <span><?php echo ': ' . $value['departemen'] ?></span></li>
                        <li><i class="fas fa-user i"></i> <span><?php echo ': ' . $value['kota'] ?></span></li>
                        <li><i class="fas fa-user i"></i> <?php echo ': ' . $value['pengalaman_kerja'] ?></li>
                        <li><i class="fas fa-user i"></i> <?php echo ': ' . date("d-m-Y", strtotime($value['tanggal_buka'])) ?></li>
                        <li><i class="fas fa-user i"></i> <?php echo ': ' . date("d-m-Y", strtotime($value['tanggal_tutup'])) ?></li>
                        <li><i class="fas fa-user i"></i> <?php echo ': ' . 'Rp. ' . $value['gaji'] ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="content">
            <h5>Persyaratan / Kriteria</h5>
            <hr>
            <?php
                while ($value1 = $data_kriteria->fetch(PDO::FETCH_ASSOC)) {
                    // var_dump($value1);
            ?>
                <ul>
                    <li> ~ <?php echo $value1['nama_kriteria'] ?></li>
                </ul>
            <?php
                }
            ?>
            <div>
                <?php
                // require("../require/kelas_kriteria.php");
                require("../require/kelas_lamaran.php");
                $kriteria = new Kriteria();
                $lamaran = new Lamaran();
                $id_user = $_SESSION['id_user'];
                $id_pelamar = $_SESSION['id_pelamar'];
                $id_lowongan = $_GET['id_lowongan'];
                $qry_lamaran = $lamaran->GetDataLamaran("WHERE id_lowongan='{$id_lowongan}' AND id_pelamar='{$id_pelamar}'");
                $cek = $lamaran->getDatapelamar("WHERE id_pelamar='{$id_pelamar}'");
                foreach ($cek as $key) {
                    // var_dump($key);
                    if ($key['foto_pelamar'] == '-' || $key['email'] == '-' || $key['alamat'] == '-' || $key['tempat_lahir'] == '-' || $key['tanggal_lahir'] == '0000-00-00' || $key['jenis_kelamin'] == '-' || $key['no_telpon'] == '-' || $key['status_nikah'] == '-' || $key['curriculum_vitae'] == '-') {
                        echo "
                        <script language='javascript'>alert('Lengkapi Data Profil Anda'); document.location='?menu=profil_pelamar'</script>                        
                        ";
                    } else if ($qry_lamaran->rowCount() > 0) {
                ?>
                        <hr>
                        <div align="right">
                            <button type="button" disabled class="tombol-lamar btn btn-success">Sudah Lamar</button>
                        </div>
                    <?php
                    } else {
                    ?>
                        <hr>
                        <div align="right">
                            <a href="?menu=lamaran&id_lowongan=<?php echo $value['id_lowongan']; ?>" type="submit" name="submit" class="tombol-lamar btn btn-success"> Lamar</a>
                        </div>
                <?php
                    }
                }
                ?>




                <!-- // validasi belum selesai
                    // echo'
                    //     <div class="alert alert-warning" role="alert">
                    //         Lengkapi Data!
                    //     </div>';
                     -->

            </div>
        </div>
    <?php
            }
    ?>
    </div>
</div>