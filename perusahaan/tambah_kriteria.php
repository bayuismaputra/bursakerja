<div class="col-md-10 main-container">
    <div class="container">
        <div class="judul-content">
            <h5><i class="fas fa-clipboard-list"></i> TAMBAH DATA KRITERIA</h5>
        </div>
        <div class="content">
            <?php include('../require/kelas_kriteria.php'); ?>

            <?php
            $kriteria = new Kriteria();
            if (isset($_POST['submit'])) {
                $id_lowongan = $_POST['id_lowongan'];
                $nama_kriteria = $_POST['nama_kriteria'];
                $tipe_kriteria = $_POST['tipe_kriteria'];
                $bobot = $_POST['bobot'];
                $status_uploud = $_POST['status_uploud'];

                $qry = $kriteria->InsertData($id_lowongan, $nama_kriteria, $tipe_kriteria, $bobot, $status_uploud);

                if ($qry) {
                    echo "<script language='javascript'>alert('Data berhasil disimpan'); document.location='?menu=data_kriteria&id_lowongan={$id_lowongan}'</script>";
                } else {
                    echo "<script language='javascript'>alert('Data gagal disimpan!'); document.location='?menu=tambah_kriteria&id_lowongan={$id_lowongan}'</script>";
                }
            } ?>
            <form action="" method="POST">
                <input type="hidden" name="id_lowongan" value="<?php echo $_GET['id_lowongan'] ?>">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label" for="nama_kriteria">Nama Kriteria</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="nama_kriteria" class="form-control" id="nama_kriteria" placeholder="Nama Kriteria" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label" for="tipe_kriteria">Tipe Kriteria</label>
                        </div>
                        <div class="col-md-10">
                            <select class="form-control" name="tipe_kriteria" id="tipe_kriteria">
                                <option value="benefit">Benefit</option>
                                <option value="cost">Cost</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label" for="bobot">Bobot</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="bobot" class="form-control" id="bobot" placeholder="bobot" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label" for="status_uploud">Uploud File</label>
                        </div>
                        <div class="col-md-10">
                            <select class="form-control" name="status_uploud" id="status_uploud">
                                <option value="1">Ada</option>
                                <option value="0">Tidak Ada</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>