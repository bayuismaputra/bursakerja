<div class="col-lg-10 main-container">
    <div class="container">
        <div class="judul-content">
            <h5><i class="fas fa-tachometer-alt mr-2"></i> DASHBOARD</h5>
        </div>
        <div class="content">
            <div class="row text-white">
                <div class="card bg-danger ml-3" style="width: 18rem;">
                    <div class="card-body-icon">
                        <i class="fas fa-suitcase mr-2"></i>
                    </div>
                    <?php
                    include('../require/kelas_lowongan.php');
                    include('../require/kelas_lamaran.php');
                    $lowongan = new Lowongan();
                    $pelamar = new Lamaran();
                    $jml_lowongan = $lowongan->GetData("where status_lowongan='ada' AND id_perusahaan=" . $_SESSION['id_perusahaan']);
                    $jml_pelamar = $pelamar->GetDataPelamar("JOIN lamaran ON pelamar.id_pelamar=lamaran.id_pelamar JOIN lowongan ON lowongan.id_lowongan=lamaran.id_lowongan WHERE lowongan.id_perusahaan=" . $_SESSION['id_perusahaan'] . " GROUP BY lamaran.id_pelamar");
                    $jumlah = $jml_lowongan->rowCount();
                    $jumlah_pelamar = $jml_pelamar->rowCount();

                    ?>
                    <div class="card-body">
                        <h5 class="card-title">Data Lowongan</h5>
                        <div class="display-4"><?php echo $jumlah ?></div>
                    </div>
                </div>
                <div class="card bg-success ml-5" style="width: 18rem;">
                    <div class="card-body-icon">
                        <i class="fas fa-users mr-2"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Data Pelamar</h5>
                        <div class="display-4"><?php echo $jumlah_pelamar ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>