<div class="col-lg-10 main-container">
    <div class="container">
        <div class="judul-content">
            <h5><i class="fas fa-tachometer-alt mr-2"></i> PENGUMUMAN</h5>
        </div>
        <?php
        include('../require/kelas_lowongan.php');
        include('../require/kelas_kriteria.php');
        include('../require/kelas_lamaran.php');
        $lowongan = new Lowongan();

        $lamaran = new Lamaran();
        $user = new User();
        $Ckriteria = new Kriteria();
        $bursaKerja = new Bursakerja();
        ?>
        <div class="content">
            <div class="pengumuman">

                <?php
                $id_lowongan = '';
                if ($_GET) {
                    if (isset($_GET['id_lowongan'])) {
                        $id_lowongan = $_GET['id_lowongan'];
                    } else {
                        $id_lowongan = "kosong";
                    }
                } else {
                    $id_lowongan = "kosong";
                }
                $data_nilai = $bursaKerja->queryCustom("SELECT * FROM `ranking` JOIN pelamar on pelamar.id_pelamar=ranking.id_pelamar JOIN user ON user.id_user=pelamar.id_user JOIN lowongan ON lowongan.id_lowongan=ranking.id_lowongan WHERE ranking.id_lowongan={$id_lowongan} AND user.id_user=$_SESSION[id_user]");
                $no = 1;
                // var_dump($data_nilai);
                while ($value = $data_nilai->fetch(PDO::FETCH_ASSOC)) {
                ?>


                    <?php
                    $qR = $lowongan->queryCustom("SELECT status from ranking where id_pelamar={$value['id_pelamar']}");
                    $resR = $qR->fetch();
                    // var_ dump($resR['status']);
                    if ($resR['status'] == '1') {
                        echo "<div class='row diterima'>
                                <div class='col-md-2'>
                                    <img src='../uploud/" . $value['foto_pelamar'] . " ?>' alt=''>
                                </div>
                                <div class='col-md-2'>
                                    <p>Nama</p>
                                    <p>Email</p> 
                                    </div>
                                    <div class='col-md-8'>
                                    <p>: {$value['nama_lengkap']}</p>
                                    <p>: {$value['email']}</p>
                                    <h6>Selamat {$value['nama_lengkap']} Anda <span class='badge badge-success'>Diterima</span></h6>
                                </div>
                            </div>";
                    } else {
                        echo "<div class='row tidak_diterima'>
                                <div class='col-md-2'>
                                    <img src='../uploud/" . $value['foto_pelamar'] . " ?>' alt=''>
                                </div>
                                <div class='col-md-2'>
                                    <p>Nama</p>
                                    <p>Email</p> 
                                    </div>
                                    <div class='col-md-8'>
                                    <p>: {$value['nama_lengkap']}</p>
                                    <p>: {$value['email']}</p>
                                    <h6>Maaf {$value['nama_lengkap']}, Anda <span class='badge badge-danger'>Belum Diterima</span></h6>
                                    </div>
                            </div>";
                    }
                    ?>

                <?php
                    $no++;
                }
                ?>


            </div>
        </div>
    </div>
</div>