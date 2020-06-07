<div class="container">
    <div class="judul-content">
        <h5><i class="fas fa-tachometer-alt mr-2"></i> Cari lowongan</h5>
    </div>
    <?php
    // include('require/kelas_lowongan.php');
    $cari_lowongan = new lowongan();
    $data_lowongan = $cari_lowongan->GetData("JOIN perusahaan ON lowongan.id_perusahaan=perusahaan.id_perusahaan WHERE lowongan.nama_lowongan LIKE '%$_GET[posisi]%'");
    $no = 1;
    while ($value = $data_lowongan->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <div class="content">
            <div class="row">
                <div class="col-lg-3">
                    <img src="../uploud/<?php echo $value['logo_perusahaan'] ?>" class="img-fluid" alt="Logo Perusahaan">
                </div>
                <div class="col-lg-7 cari-lowongan">
                    <ul>
                        <li><i class="fas fa-user"></i> <strong><?php echo $value['nama_lowongan'] ?></strong></li>
                        <li><i class="fas fa-building"></i> <strong><?php echo $value['nama_perusahaan'] ?></strong></li>
                        <li><i class="fas fa-building"></i> <span><?php echo $value['departemen'] ?></span></li>
                        <li><i class="fas fa-map-marker-alt"></i> <span><?php echo $value['kota'] ?></span></li>
                        <li><i class="fas fa-suitcase"></i> <?php echo $value['pengalaman_kerja'] ?></li>
                        <li><i class="far fa-calendar-plus"></i> <?php echo date("d-m-Y", strtotime($value['tanggal_buka'])) ?></li>
                        <li><i class="far fa-calendar-times"></i> <?php echo date("d-m-Y", strtotime($value['tanggal_tutup'])) ?></li>
                        <li><i class="fas fa-money-bill-wave"></i> <?php echo 'Rp. ' . $value['gaji'] ?></li>
                    </ul>

                </div>
                <div class="col-lg-2">
                    <a href="?menu_utama=detail_lowongan_index&id_lowongan=<?php echo $value['id_lowongan'] ?>" class="btn btn-success"> Lamar</a>

                </div>
            </div>


        </div>
    <?php
    }
    ?>

</div>
</div>