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
$qry_kriteria = $kriteria->GetData("JOIN lowongan ON lowongan.id_lowongan=kriteria.id_lowongan JOIN lamaran ON kriteria.id_kriteria=lamaran.id_kriteria WHERE lowongan.id_lowongan='{$id_lowongan}'GROUP BY kriteria.id_kriteria");
$qry_kriteria1 = $kriteria->GetData("JOIN lowongan ON lowongan.id_lowongan=kriteria.id_lowongan JOIN lamaran ON kriteria.id_kriteria=lamaran.id_kriteria WHERE lowongan.id_lowongan='{$id_lowongan}'");
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
                // var_dump($_FILES);
                // die;
                while ($berkas = $qry_kriteria1->fetch()) {
                    if (!empty($_FILES['fileberkas_' . $berkas['id_kriteria']]['tmp_name'])) {
                        $explode = explode(".", $_FILES['fileberkas_' . $berkas['id_kriteria']]['name']);
                        $file = $id_user . "_" . $id_lowongan . "_" . $_FILES['fileberkas_' . $berkas['id_kriteria']]['name'] . rand(0, 100) . "." . end($explode);
                        move_uploaded_file($_FILES['fileberkas_' . $berkas['id_kriteria']]['tmp_name'], "../uploud/" . $file);

                        // insert to tabel lamaran
                        $qry = $lamaran->InsertData($id_pelamar, $id_lowongan, $berkas['id_kriteria'], $file);

                        if ($qry) {
                            echo "<script language='javascript'>alert('Berkas berhasil diupload'); document.location='?menu=pelamar'</script>";
                        } else {
                            echo "<script language='javascript'>alert('Gagal');document.location='?menu=lamaran&id_lowongan=$id_lowongan'</script>";
                        }
                    } else {
                        echo "<script language='javascript'>console.log({$berkas['id_kriteria']}+'kosong');</script>";
                    }
                }
            }

            ?>
            <form action="" method="post" enctype="multipart/form-data">

                <?php
                while ($row = $qry_kriteria->fetch()) {
                    // var_dump($row);
                ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for=""><?= $row['nama_kriteria'] ?></label>
                                <input type="hidden" name="fileberkas_kriteria_<?= $row['id_kriteria'] ?>" value="<?= $row['id_kriteria'] ?>">
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="kriteria 1" value="" class="form-control" id="kriteiria 1" placeholder="Masukkan Nilai" required>
                                <?php
                                if ($row['status_uploud'] == '1') {
                                ?>
                                    <div class='control'><a target='blank' href=<?php echo '../uploud/' . $row['file'] ?> class='span8'>Berkas Pelamar</a></div>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>