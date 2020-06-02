<div class="col-lg-10 main-container">
    <div class="container">
        <div class="judul-content">
            <h5><i class="fas fa-tachometer-alt mr-2"></i> DASHBOARD</h5>
        </div>
        <div class="content">
            <?php
            include('../require/kelas_lowongan.php');
            include('../require/kelas_kriteria.php');
            include('../require/kelas_lamaran.php');
            $lowongan = new Lowongan();

            $lamaran = new Lamaran();
            $user = new User();
            $Ckriteria = new Kriteria();
            $bursaKerja = new Bursakerja();
            $dLamaran = $lamaran->queryCustom("SELECT * FROM `lamaran` JOIN lowongan ON lowongan.id_lowongan=lamaran.id_lowongan WHERE lamaran.id_pelamar={$_SESSION['id_pelamar']} GROUP BY lamaran.id_lowongan");
            ?>
            <div class="table-responsive">
                <table class="table table-bordered table table-hover" id="dataTables">
                    <thead class="tabel" align="center">
                        <tr>
                            <th align="center">No.</th>
                            <th>LOWONGAN</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($dLamaran as $row) {
                        ?>
                            <tr>
                                <td align="center"><?= $i ?></td>
                                <td><?= $row['nama_lowongan'] ?></td>
                                <td align="center">
                                    <?php
                                    if ($row['status_pengumuman'] == 1) {
                                        echo '
                                        <a href="?menu=pengumuman_pelamar&id_lowongan=' . $row['id_lowongan'] . '" class="btn btn-info btn-sm tombol-pengumuman"><i class="fa fa-edit"></i> Pengumuman</a>
                                        ';
                                    } else {
                                        echo '
                                        <button type="button" disabled class="btn btn-warning btn-sm tombol-pengumuman"><i class="fa fa-edit"></i> Tunggu</button>
                                        ';
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>