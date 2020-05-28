<div class="col-md-10 main-container">
    <div class="container">
        <div class="judul-content">
            <h5><i class="fas fa-book-open mr-2"></i> DATA NILAI</h5>
            <div class="row">
                <div class="col-lg-2"></div>
                <?php
                include('../require/kelas_lowongan.php');
                include('../require/kelas_lamaran.php');
                $lowongan = new Lowongan();

                $lamaran = new Lamaran();
                $user = new User();
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
                        $id_lowongan = $_GET['id_lowongan'];
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

<?php
if (isset($_GET['action'])) {
    echo '
    <div class="col-md-10 main-container">
        <div class="container">
            <div class="content">
                Anjing.... Keluar......
            </div>
        </div>
    </div>
    ';
}
?>