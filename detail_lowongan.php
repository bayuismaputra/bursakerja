<?php
session_start();
?>
<div class="container">
    <div class="judul-content">
        <h5><i class="fas fa-tachometer-alt mr-2"></i> Detail lowongan</h5>
    </div>
    <div class="content">
        <h5>Profil Perusahaan</h5>
        <hr>
        <?php
        // include('require/kelas_lowongan.php');
        require("require/kelas_kriteria.php");
        $detail_lowongan = new lowongan();
        $kriteria = new Kriteria();
        $data_lowongan = $detail_lowongan->GetData("JOIN perusahaan ON lowongan.id_perusahaan=perusahaan.id_perusahaan where lowongan.id_lowongan=$_GET[id_lowongan]");
        $data_kriteria = $kriteria->GetData("where id_lowongan=$_GET[id_lowongan]");
        // $no = 1;
        while ($value = $data_lowongan->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <div class="row profil-perusahaan">
                <div class="col-lg-4">
                    <img src="uploud/<?php echo $value['logo_perusahaan'] ?>" class="img-fluid logo_perusahaan" alt="logo_perusahaan">
                </div>
                <div class="col-lg-8">
                    <h5><i class="fas fa-building"></i><?php echo 'Nama Perusahaan : ' . $value['nama_perusahaan'] ?></h5>
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
            if ($_SESSION) {
                if ($_SESSION['id_user'] || $_SESSION['username'] == '') {
                    echo 'Silahkan Login Dulu';
                } else {
                    echo "<script language='javascript'>alert('Berkas berhasil diupload'); document.location='?menu=lamaran'</script>";
                }
            } else {
                echo "<script language='javascript'>alert(' Untuk Dapat Melakukan Lamaran, Silahkan Login');</script>";
            }
            ?>
        </div>
    </div>
<?php } ?>
</div>
</div>
</div>