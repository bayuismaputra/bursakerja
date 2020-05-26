<div class="col-lg-10 main-container">
    <div class="container">
        <div class="judul-content">
            <h5><i class="fas fa-tachometer-alt mr-2"></i> Detail lowongan</h5>
        </div>
        <div class="content">
            <h4>Profil Perusahaan</h4>
            <hr>
            <?php include('../require/kelas_lowongan.php');
            $detail_lowongan = new lowongan();
            $data_lowongan = $detail_lowongan->GetData("where id_lowongan=$_GET[id_lowongan]");
            $no = 1;
            while ($value = $data_lowongan->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <div class="row profil-perusahaan">
                    <div class="col-lg-3">

                        <img src="../img/undraw_sign_in_e6hj.png" alt="bayu">
                    </div>
                    <div class="col-lg-9">
                        <h5>Nama Perusahaan</h5>

                    </div>
                </div>
        </div>
        <div class="content">
            <h4>Lowongan</h4>
            <hr>
            <h5><strong><?php echo $value['nama_lowongan']; ?></strong></h5>
            <span>
                <?php echo $value['departemen']; ?> |
                <?php echo $value['kota']; ?>
            </span>
            <p><?php echo $value['pengalaman_kerja']; ?></p>
            <p><?php echo $value['tanggal_buka']; ?></p>
            <p><?php echo $value['tanggal_tutup']; ?></p>
            <p><?php echo 'Rp. ' . $value['gaji']; ?></p>
            <div align="right">
                <?php
                require("../require/kelas_kriteria.php");
                require("../require/kelas_lamaran.php");
                $kriteria = new Kriteria();
                $lamaran = new Lamaran();
                $id_user = $_SESSION['id_user'];
                $id_pelamar = $_SESSION['id_pelamar'];
                $id_lowongan = $_GET['id_lowongan'];
                $qry_lamaran = $lamaran->GetDataLamaran("WHERE id_lowongan='{$id_lowongan}' AND id_pelamar='{$id_pelamar}'");
                // validasi belum selesai
                if ($qry_lamaran->rowCount() > 0) {
                ?>
                    <button type="button" disabled class="btn btn-success">Sudah Lamar</button>
                <?php
                } else {
                ?>
                    <a href="?menu=lamaran&id_lowongan=<?php echo $value['id_lowongan']; ?>" class="btn btn-success"> Lamar</a>
                <?php
                }
                ?>
            </div>
        </div>
        <br>
    <?php
            }
    ?>
    </div>

</div>
</div>