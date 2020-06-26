<div class="col-md-10 main-container">
    <div class="container">
        <div class="judul-content">
            <h5><i class="fas fa-book-open mr-2"></i> DATA NILAI</h5>
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

                $kuota = 0;

                $pilih_lowongan = $lowongan->GetData("where status_lowongan='ada' AND id_perusahaan=" . $_SESSION['id_perusahaan']);
                ?>
                <div class="col-lg-12 pilih-lowongan">
                    <form action="" method="GET">
                        <input type="hidden" name="menu" value="data_nilai">
                        <div class="input-group mb-3">
                            <select class="custom-select" name="id_lowongan" id="inputGroupSelect04" aria-label="Example select with button addon">
                                <?php
                                while ($row = $pilih_lowongan->fetch()) {
                                    if ($_GET) {
                                        if ($row['id_lowongan'] == $_GET['id_lowongan']) {
                                            echo "<option value='$row[id_lowongan]' selected>$row[nama_lowongan]</option>";
                                            $kuota = $row['kuota'];
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
        <!-- <?= $kuota ?> -->
        <div class="content">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTables">
                    <thead class="tabel" align="center">
                        <tr>
                            <th>No.</th>
                            <th>PELAMAR</th>
                            <th>NILAI</th>
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
                    $data_nilai = $lowongan->GetData("JOIN lamaran ON lowongan.id_lowongan=lamaran.id_lowongan JOIN pelamar ON lamaran.id_pelamar=pelamar.id_pelamar JOIN user ON pelamar.id_user=user.id_user WHERE lowongan.id_lowongan=" . $id_lowongan . " GROUP BY pelamar.id_pelamar");
                    // var_dump($data_nilai);
                    $no = 1;
                    while ($value = $data_nilai->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td align="center"><?php echo $no ?></td>
                            <td><?php echo $value['nama_lengkap'] ?></td>
                            <td align="center">
                                <?php
                                $qR = $lowongan->queryCustom("SELECT nilai from lamaran where id_lowongan={$value['id_lowongan']} AND id_pelamar={$value['id_pelamar']} ");
                                $resR = $qR->fetch();
                                ?>
                                <a href="?menu=penilaian_kriteria&id_pelamar=<?= $value['id_pelamar']  ?>&id_lowongan=<?= $value['id_lowongan'] ?>" class="btn <?= ($resR['nilai'] == 0) ? 'btn-secondary' : 'btn-success' ?> btn-sm"><i class="fas fa-book-open mr-1"></i> Penilain</a>
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
                        <a href="?menu=data_nilai&id_lowongan=' . $_GET['id_lowongan'] . '&action=hitung">
                            <button class="btn btn-success"><i class="fas fa-calculator mr-1"></i> Hitung</button>
                        </a>
                    ';
                    } else {
                        echo '
                        <button class="btn btn-success" disabled><i class="fas fa-calculator mr-1"></i> Hitung</button>
                    ';
                    }
                }
                ?>

            </div>
        </div>



        <?php
        if (isset($_GET['action'])) {
            $r = [];
            $nilai_v = [];

            $kriteria = [];
            $alternatif = [];





            // $alternatif[] = ['A1', 3, 2, 3, 4];
            // $alternatif[] = ['A2', 2, 4, 3, 3];
            // $alternatif[] = ['A3', 4, 5, 5, 5];

            // mendapatkan value column array
            // - array_column(array,index)

            // mencari nilai min atau max dalam array
            // - min(array) // untuk mencari nilai minimal
            // - max(array) // untuk mencari nilai maximal

        ?>
            <!-- C -->
            <div class="content">
                <?php
                $krit = $Ckriteria->GetData("Where id_lowongan={$id_lowongan}");
                foreach ($krit as $C) {
                    $kriteria[] = [
                        'id_kriteria' => $C['id_kriteria'],
                        'nama_kriteria' => $C['nama_kriteria'],
                        'tipe_kriteria' => $C['tipe_kriteria'],
                        'nilai_bobot' => $C['bobot'],
                    ];
                }
                ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTables">
                        <h5 class="mb-3">KRITERIA</h5>
                        <thead class="tabel" align="center">
                            <tr>
                                <th>No.</th>
                                <th>Kriteria</th>
                                <th>Bobot</th>
                            </tr>
                        </thead>
                        <?php
                        $i = 0;
                        foreach ($kriteria as $row) {
                        ?>
                            <tr>
                                <td align="center"><?= $i += 1 ?></td>
                                <td><?= $row['nama_kriteria'] ?></td>
                                <td><?= $row['nilai_bobot'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>

            <!-- A -->
            <div class="content">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTables">
                        <h5 class="mb-3">NILAI PELAMAR</h5>
                        <thead class="tabel" align="center">
                            <tr>
                                <th>No.</th>
                                <th>Pelamar</th>
                                <?php
                                $kC = $Ckriteria->GetData("Where id_lowongan={$id_lowongan}");
                                foreach ($kC as $C) {
                                    echo '
                                    <th>' . $C['nama_kriteria'] . '</th>
                                    ';
                                }
                                ?>
                            </tr>
                        </thead>
                        <?php
                        // set alternative
                        $o = 1;
                        $pelamar = $lowongan->GetData("JOIN lamaran ON lowongan.id_lowongan=lamaran.id_lowongan JOIN pelamar ON lamaran.id_pelamar=pelamar.id_pelamar JOIN user ON pelamar.id_user=user.id_user WHERE lowongan.id_lowongan=" . $id_lowongan . " GROUP BY pelamar.id_pelamar");
                        foreach ($pelamar as $A) {
                            $k = $bursaKerja->queryCustom("SELECT * FROM lamaran where id_lowongan={$A['id_lowongan']} AND id_pelamar={$A['id_pelamar']}");
                            $k_l = [];

                            $k_l[] = $A['id_pelamar'];
                            $k_l[] = $A['nama_lengkap'];
                            echo '
                            <tr>
                                <td>' . $o  . '</td>
                                <td>' . $A['nama_lengkap'] . '</td>
                                
                            ';
                            foreach ($k as $list) {
                                $k_l[] =
                                    $list['nilai'];
                                echo '<td class="text-center">' . $list['nilai'] . '</td>';
                            }
                            echo '
                            </tr>
                            ';

                            $alternatif[] = $k_l;
                            $o++;
                        }
                        ?>
                    </table>
                </div>
            </div>

            <!-- R -->
            <div class="content">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTables">
                        <h5 class="mb-3">NILAI R</h5>
                        <thead class="tabel" align="center">
                            <tr>
                                <th>R</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // // mendapatkan nilai matrik R (normalisasi X) Array rumusnya 
                            $index_alt = 0;
                            foreach ($alternatif as $alt) {
                                $index_kriteria = 2;
                                foreach ($kriteria as $c) {
                                    if ($c['tipe_kriteria'] == "cost") {
                                        echo '
                                        <tr>
                                            <td>R' . $index_alt . $index_kriteria . '</td>
                                            <td  class="text-center">' . min(array_column($alternatif, $index_kriteria)) . "/" . $alternatif[$index_alt][$index_kriteria] . '</td>
                                        </tr>
                                        ';
                                        $r[$index_alt][$index_kriteria] = min(array_column($alternatif, $index_kriteria)) / $alternatif[$index_alt][$index_kriteria];
                                    } else if ($c['tipe_kriteria'] == "benefit") {
                                        echo '
                                        <tr>
                                            <td>R' . $index_alt . $index_kriteria . '</td>
                                            <td  class="text-center">' . $alternatif[$index_alt][$index_kriteria] . "/" . max(array_column($alternatif, $index_kriteria)) . '</td>
                                        </tr>
                                        ';
                                        $r[$index_alt][$index_kriteria] = $alternatif[$index_alt][$index_kriteria] / max(array_column($alternatif, $index_kriteria));
                                    }
                                    $index_kriteria++;
                                }
                                $index_alt++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php
            // // mendapatkan nilai V
            $index_alt = 0;
            foreach ($alternatif as $alt) {
                // $index_w = 0;
                $index_r = 2;
                $v = 0;
                foreach ($kriteria as $c) {

                    $v += (($c['nilai_bobot']) * $r[$index_alt][$index_r]);
                    $index_r++;
                    // $index_w++;
                }
                $nilai_v[$index_alt]['id_pelamar'] = $alt[0];
                $nilai_v[$index_alt]['nama_pelamar'] = $alt[1];
                $nilai_v[$index_alt]['nilai'] = $v;
                $index_alt++;
            }

            // sorting array dengan usort (default data sort ASCENDING)
            usort($nilai_v, function ($a, $b) {
                return $a['nilai'] <=> $b['nilai'];
            });

            // var_dump(array_reverse($nilai_v));
            // die;
            // simpan Rank ke database
            foreach (array_reverse($nilai_v) as $row) {
                $status = 0;
                $qryCustom = $bursaKerja->queryCustom("SELECT * FROM ranking WHERE id_pelamar={$row['id_pelamar']} AND id_lowongan={$id_lowongan}");
                if ($kuota > 0) {
                    $status = 1;
                    $kuota--;
                }
                // echo $status . "-:-";
                if ($qryCustom->rowCount() > 0) {
                    $q = $bursaKerja->queryCustom("UPDATE `ranking` SET `nilai_akhir` = '{$row['nilai']}', `status` = '{$status}' WHERE `id_pelamar`={$row['id_pelamar']} AND `id_lowongan`={$id_lowongan}");
                } else {
                    $q = $bursaKerja->queryCustom("INSERT INTO `ranking`(`id_pelamar`, `id_lowongan`, `nilai_akhir`,`status`) VALUES ({$row['id_pelamar']},{$id_lowongan},{$row['nilai']},{$status})");
                }
            }
            ?>

            <!-- rekomendasi -->
            <div class="content">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTables">
                        <h5 class="mb-3">NILAI PREFERENSI</h5>
                        <thead class="tabel" align="center">
                            <tr>
                                <th>No.</th>
                                <th>PELAMAR</th>
                                <th>PREFERENSI</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                        <?php

                        // // menentukan Rangking V
                        $rank = 1;
                        foreach (array_reverse($nilai_v) as $v) {
                            // var_dump($v);
                            // die;
                        ?>
                            <tr>
                                <td align="center"><?= $rank ?></td>
                                <td><?= $v['nama_pelamar'] ?></td>
                                <td class="text-center"><?= round($v['nilai'], 2) ?></td>
                                <td class="text-center">
                                    <?php
                                    $qR = $lowongan->queryCustom("SELECT status from ranking where id_pelamar={$v['id_pelamar']}");
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
                            $rank++;
                        }
                        ?>
                    </table>
                </div>
            </div>
    </div>
</div>
<?php
        }
?>