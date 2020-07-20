<?php
require("../require/kelas_kriteria.php");
include('../require/kelas_lowongan.php');
require("../require/kelas_lamaran.php");
$kriteria = new Kriteria();
$lamaran = new Lamaran();
$lowongan = new Lowongan();
$user = new User();

$id_user = $_SESSION['id_user'];
$id_pelamar = $_GET['id_pelamar'];
$id_lowongan = $_GET['id_lowongan'];
$qry_kriteria = $kriteria->GetData("JOIN lowongan ON lowongan.id_lowongan=kriteria.id_lowongan JOIN lamaran ON kriteria.id_kriteria=lamaran.id_kriteria WHERE lowongan.id_lowongan='{$id_lowongan}' AND lamaran.id_pelamar='{$id_pelamar}'");
$qry_kriteria1 = $kriteria->GetData("JOIN lowongan ON lowongan.id_lowongan=kriteria.id_lowongan JOIN lamaran ON kriteria.id_kriteria=lamaran.id_kriteria WHERE lowongan.id_lowongan='{$id_lowongan} AND lamaran.id_pelamar='{$id_pelamar}'");
// var_dump($qry_kriteria);
$jml_uploud_berkas = $qry_kriteria->rowCount();
?>
<div class="col-md-10 main-container">
    <div class="container">
        <div class="judul-content">
            <h5><i class="fas fa-clipboard-list"></i> PENILAIAN KRITERIA</h5>
        </div>
        <div class="content">
            <?php
            if (isset($_POST['submit'])) {
                // var_dump($_POST);
                for ($i = 1; $i <= $jml_uploud_berkas; $i++) {
                    $insertNilai = $lamaran->updateNilai($_POST['kriteria_' . $i], $id_pelamar, $_POST['id_kriteria_' . $i], $id_lowongan);
                }
                echo "<script language='javascript'>alert('Nilai berhasil diberikan'); document.location='?menu=data_nilai'</script>";

                // die;
            }

            ?>
            <?php
            $qR = $lowongan->queryCustom("SELECT * from ranking where id_pelamar={$_GET['id_pelamar']}");
            $resR = $qR->fetch();
            ?>
            <form action="dashboard.php" method="get" enctype="multipart/form-data">
                <input type="hidden" name="menu" value="<?= "data_nilai" ?>">
                <input type="hidden" name="id_lowongan" value="<?= $_GET['id_lowongan'] ?>">
                <input type="hidden" name="id" value="<?= $resR['id_ranking'] ?>">

                <?php
                $i = 1;
                while ($row = $qry_kriteria->fetch()) {
                    // var_dump($row);
                ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <label for=""><?= $row['nama_kriteria'] ?></label>
                                <input type="hidden" readonly id="id_kriteria_<?= $i ?>" value="<?= $row['id_kriteria'] ?>">
                            </div>
                            <div class="col-md-7">
                                <input type="text" readonly id="kriteria_<?= $i ?>" value="<?= ($row['nilai'] == 0) ? "" : $row['nilai'] ?>" class="form-control" id="kriteiria 1" placeholder="Masukkan Nilai" required>
                                <?php
                                if ($row['status_uploud'] == '1') {
                                ?>
                                    <div class='control'><a target='blank' href="<?= '../uploud/' . $row['file'] ?>" class='span8'>Berkas Pelamar</a></div>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>

                <?php
                    $i++;
                }
                ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-7">
                            <button type="submit" class="btn btn-success" name='action' value="konfirmasi">Konfirmasi</button>
                            <button type="button" name="Back" onclick="window.history.back()" class="btn btn-danger">Kembali</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>