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

                $pilih_lowongan = $lowongan->GetData("where status_lowongan='ada' AND id_perusahaan=" . $_SESSION['id_perusahaan']);
                ?>
                <div class="col-lg-12 pilih-lowongan">
                    <form action="" method="GET">
                        <input type="hidden" name="menu" value="data_nilai">
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
                    $no = 1;
                    while ($value = $data_nilai->fetch(PDO::FETCH_ASSOC)) {
                        echo ' <tr>
                        <td align="center">' . $no . '</td>
                        <td>' . $value['nama_lengkap'] . '</td>
                        <td align="center"><a href="?menu=penilaian_kriteria&id_pelamar=' . $value['id_pelamar'] . '&id_lowongan=' . $value['id_lowongan'] . '" class="btn btn-success tombol-penilaian btn-sm"><i class="fas fa-book-open mr-1"></i> Penilain</a></td>
                        </tr>';
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
    </div>
</div>
<div class="col-md-10 main-container">
    <div class="container">
        <div class="content">
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
                    <tr>
                        <td align="center">1</td>
                        <td>hjdkfds</td>
                        <td>dfkjdsa</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-md-10 main-container">
    <div class="container">
        <div class="content">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTables">
                    <h5 class="mb-3">NILAI PELAMAR</h5>
                    <thead class="tabel" align="center">
                        <tr>
                            <th>No.</th>
                            <th>Pelamar</th>
                            <th>C1</th>
                            <th>C2</th>
                            <th>C3</th>
                        </tr>
                    </thead>
                    <tr>
                        <td align="center">1</td>
                        <td>hjdkfds</td>
                        <td>90</td>
                        <td>90</td>
                        <td>90</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-md-10 main-container">
    <div class="container">
        <div class="content">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTables">
                    <h5 class="mb-3">NILAI R</h5>
                    <thead class="tabel" align="center">
                        <tr>
                            <th>No.</th>
                            <th>Pelamar</th>
                            <th>R01</th>
                            <th>R02</th>
                            <th>R03</th>
                        </tr>
                    </thead>
                    <tr>
                        <td align="center">1</td>
                        <td>hjdkfds</td>
                        <td>90</td>
                        <td>90</td>
                        <td>90</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-md-10 main-container">
    <div class="container">
        <div class="content">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTables">
                    <h5 class="mb-3">NILAI PREFERENSI</h5>
                    <thead class="tabel" align="center">
                        <tr>
                            <th>No.</th>
                            <th>Pelamar</th>
                            <th>PREFERENSI</th>
                        </tr>
                    </thead>
                    <tr>
                        <td align="center">1</td>
                        <td>hjdkfds</td>
                        <td>90</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_GET['action'])) {
    $r = [];
    $nilai_v = [];

    $kriteria = [];
    $alternatif = [];

    echo '
    <div class="col-md-10 main-container">
        <div class="container">
            <div class="content">';
    echo '==============C================<br>';

    // set kriteria
    $krit = $Ckriteria->GetData("Where id_lowongan={$id_lowongan}");
    foreach ($krit as $C) {
        $kriteria[] = [
            'id_kriteria' => $C['id_kriteria'],
            'tipe_kriteria' => $C['tipe_kriteria'],
            'nilai_bobot' => $C['bobot'],
        ];
    }
    var_dump($kriteria);
    echo '
            </div>
        </div>
    </div>
    ';
    // $kriteria = ['C1', 'C2', 'C3', 'C4'];

    echo '
    <div class="col-md-10 main-container">
        <div class="container">
            <div class="content">';
    echo '==============A================<br>';
    // set alternative
    $pelamar = $lowongan->GetData("JOIN lamaran ON lowongan.id_lowongan=lamaran.id_lowongan JOIN pelamar ON lamaran.id_pelamar=pelamar.id_pelamar JOIN user ON pelamar.id_user=user.id_user WHERE lowongan.id_lowongan=" . $id_lowongan . " GROUP BY pelamar.id_pelamar");
    foreach ($pelamar as $A) {
        $k = $bursaKerja->queryCustom("SELECT * FROM lamaran where id_lowongan={$A['id_lowongan']} AND id_pelamar={$A['id_pelamar']}");
        $k_l = [];

        $k_l[] = $A['id_pelamar'];

        foreach ($k as $list) {
            $k_l[] =
                $list['nilai'];
        }

        $alternatif[] = $k_l;
    }
    var_dump($alternatif);
    echo '
            </div>
        </div>
    </div>';
    // $alternatif[] = ['A1', 3, 2, 3, 4];
    // $alternatif[] = ['A2', 2, 4, 3, 3];
    // $alternatif[] = ['A3', 4, 5, 5, 5];

    // mendapatkan value column array
    // - array_column(array,index)

    // mencari nilai min atau max dalam array
    // - min(array) // untuk mencari nilai minimal
    // - max(array) // untuk mencari nilai maximal

    echo '
    <div class="col-md-10 main-container">
        <div class="container">
            <div class="content">';
    // // mendapatkan nilai matrik R (normalisasi X) Array rumusnya 
    echo '==============R================<br>';
    $index_alt = 0;
    foreach ($alternatif as $alt) {
        $index_kriteria = 1;
        foreach ($kriteria as $c) {
            // echo "Keluar";
            // echo min(array_column($alternatif, $index_kriteria)) . " / " . $alternatif[$index_alt][$index_kriteria] . "<br>";
            if ($c['tipe_kriteria'] == "cost") {
                echo "r" . $index_alt . $index_kriteria . "=" . min(array_column($alternatif, $index_kriteria)) . "/" . $alternatif[$index_alt][$index_kriteria] . "<br>";
                $r[$index_alt][$index_kriteria] = min(array_column($alternatif, $index_kriteria)) / $alternatif[$index_alt][$index_kriteria];
            } else if ($c['tipe_kriteria'] == "benefit") {
                echo "r" . $index_alt . $index_kriteria . "=" . $alternatif[$index_alt][$index_kriteria] . "/" . max(array_column($alternatif, $index_kriteria)) . "<br>";
                $r[$index_alt][$index_kriteria] = $alternatif[$index_alt][$index_kriteria] / max(array_column($alternatif, $index_kriteria));
            }
            $index_kriteria++;
        }
        $index_alt++;
    }
    echo '
            </div>
        </div>
    </div>
    ';
    // $w = [0.4, 0.3, 0.2, 0.1]; //bobot

    // // mendapatkan nilai V
    $index_alt = 0;
    foreach ($alternatif as $alt) {
        // $index_w = 0;
        $index_r = 1;
        $v = 0;
        foreach ($kriteria as $c) {

            $v += (($c['nilai_bobot']) * $r[$index_alt][$index_r]);
            $index_r++;
            // $index_w++;
        }
        $nilai_v[$index_alt]['id_pelamar'] = $alt[0];
        $nilai_v[$index_alt]['nilai'] = $v;
        $index_alt++;
    }

    // sorting array dengan usort (default data sort ASCENDING)
    usort($nilai_v, function ($a, $b) {
        return $a['nilai'] <=> $b['nilai'];
    });

    echo '
    <div class="col-md-10 main-container">
        <div class="container">
            <div class="content">';
    echo "==========Rekomendasi===========<br>";
    // var_dump($nilai_v);
    // echo (round());
    // // menentukan Rangking V
    $rank = 1;
    foreach (array_reverse($nilai_v) as $v) {
        echo "Ranking {$rank} -> id_pelamar= {$v['id_pelamar']} Dengan Nilai {$v['nilai']}<br>";
        $rank++;
    }

    echo '
            </div>
        </div>
    </div>
        ';
}
?>