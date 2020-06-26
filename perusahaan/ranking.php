<div class="col-md-10 main-container">
    <div class="container">
        <div class="judul-content">
            <h5><i class="fas fa-tachometer-alt mr-2"></i> DATA RANKING</h5>
            <div class="row">
                <div class="col-lg-2"></div>
                <?php
                include('../require/kelas_lowongan.php');
                include('../require/kelas_kriteria.php');
                include('../require/kelas_lamaran.php');
                $lowongan = new Lowongan();

                $lamaran = new Lamaran();
                $user = new User();
                $Ckriteria = new Kriteria();
                $bursaKerja = new Bursakerja();

                $pilih_lowongan = $lowongan->GetData("where status_lowongan='ada' AND id_perusahaan=" . $_SESSION['id_perusahaan']);
                ?>
                <div class="col-lg-12 pilih-lowongan">
                    <form action="" method="GET">
                        <input type="hidden" name="menu" value="ranking">
                        <div class="input-group mb-3">
                            <select class="custom-select" name="id_lowongan" id="inputGroupSelect04" aria-label="Example select with button addon">
                                <?php
                                while ($row = $pilih_lowongan->fetch()) {
                                    if ($_POST) {
                                        if ($row['id_lowongan'] == $_POST['id_lowongan']) {
                                            echo "<option value='$row[id_lowongan]' selected>$row[nama_lowongan]</option>";
                                        } else {
                                            echo "<option value='$row[id_lowongan]'>$row[nama_lowongan]</option>";
                                        }
                                    } else {
                                        echo "<option value='$row[id_lowongan]'>$row[nama_lowongan]</option>";
                                    }
                                }
                                ?>
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit">CEK</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTables">
                    <thead class="tabel" align="center">
                        <tr>
                            <th>No.</th>
                            <th>PELAMAR</th>
                            <th>NILAI</th>
                            <th>STATUS</th>
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
                            <td align="center"><?php echo round($value['nilai_akhir'], 2) ?></td>
                            <td align="center">
                                <?php
                                $qR = $lowongan->queryCustom("SELECT status from ranking where id_pelamar={$value['id_pelamar']}");
                                $resR = $qR->fetch();
                                // var_dump($resR['status']);
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


                <?php
                if ($_GET) {
                    if (isset($_GET['id_lowongan'])) {
                        echo '
                        <a href="?menu=ranking&id_lowongan=' . $_GET['id_lowongan'] . '&action=umumkan">
                            <button class="btn btn-success"><i class="fas fa-calculator mr-1"></i> Umumkan</button>
                        </a>
                    ';
                    } else {
                        echo '
                        <button class="btn btn-success" disabled><i class="fas fa-calculator mr-1"></i> Umumkan</button>
                    ';
                    }

                    // ketika tombol umumkan di tekan
                    if (isset($_GET['action'])) {
                        if ($_GET['action'] == "umumkan") {
                            $qupdt = $bursaKerja->queryCustom("UPDATE `lowongan` SET `status_pengumuman` = '1' WHERE `lowongan`.`id_lowongan` ={$id_lowongan}");
                            if ($qupdt) {
                                echo '
                                    <script>alert("lowongan sudah diumumkan")</script>
                                ';
                            }
                        }
                    }
                }
                ?>

            </div>
        </div>
    </div>