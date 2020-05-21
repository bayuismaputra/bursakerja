<div class="col-lg-10 main-container">
    <div class="container">
        <div class="judul-content">
            <h5><i class="fas fa-tachometer-alt mr-2"></i> Cari Lowongan</h5>
        </div>
        <?php include('../require/kelas_lowongan.php');
        $cari_lowongan = new lowongan();
        $data_lowongan = $cari_lowongan->GetData("where nama_lowongan LIKE '%$_GET[posisi]%'");
        $no = 1;
        while ($value = $data_lowongan->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <div class="content">
                <div class="row">
                    <div class="col-lg-3">
                        <img src="../img/undraw_sign_in_e6hj.png" class="img-fluid" alt="bayu">
                    </div>
                    <div class="col-lg-7 cari-lowongan">
                        <h5><strong><?php echo $value['nama_lowongan']; ?></strong></h5>
                        <p>
                            <i class="fas fa-building"></i>
                            <span><?php echo $value['departemen']; ?></span>
                        </p>
                        <p>
                            <i class="fas fa-map-marker-alt"></i>
                            <span><?php echo $value['kota']; ?></span>
                        </p>
                        <p><?php echo $value['pengalaman_kerja']; ?></p>
                        <p>
                            <?php echo $value['tanggal_buka']; ?> |
                            <?php echo $value['tanggal_tutup']; ?>
                        </p>
                        <p><?php echo 'Rp. ' . $value['gaji']; ?></>
                    </div>
                    <div class="col-lg-2">
                        <a href="?menu=detail_lowongan&id_lowongan=<?php echo $value['id_lowongan']; ?>" class="btn btn-success"> Lamar</a>

                    </div>
                </div>


            </div>
        <?php
        }
        ?>

    </div>
</div>