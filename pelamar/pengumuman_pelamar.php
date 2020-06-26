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
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTables">
                    <thead class="tabel" align="center">
                        <tr>
                            <th>No.</th>
                            <th>PELAMAR</th>
                            <th>HASIL</th>
                        </tr>
                    </thead>
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
                    $data_nilai = $bursaKerja->queryCustom("SELECT * FROM `ranking` JOIN pelamar on pelamar.id_pelamar=ranking.id_pelamar JOIN user ON user.id_user=pelamar.id_user JOIN lowongan ON lowongan.id_lowongan=ranking.id_lowongan WHERE ranking.id_lowongan={$id_lowongan} ORDER BY ranking.nilai_akhir DESC");
                    $no = 1;
                    while ($value = $data_nilai->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td align="center"><?php echo $no ?></td>
                            <td><?php echo $value['nama_lengkap'] ?></td>
                            <td align="center">
                                <?php
                                $qR = $lowongan->queryCustom("SELECT status from ranking where id_pelamar={$value['id_pelamar']}");
                                $resR = $qR->fetch();
                                // var_ dump($resR['status']);
                                if ($resR['status'] == '1') {
                                    echo "<span class='badge badge-success'>Diterima<span>";
                                } else {
                                    echo "<span class='badge badge-danger'>Tidak Diterima<span>";
                                }
                                ?>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>


                </table>
            </div>
        </div>
    </div>
</div>