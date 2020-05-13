<div class="col-md-10 main-container">
    <div class="container">
        <div class="judul-content">
            <h5><i class="fas fa-suitcase mr-2"></i> TAMBAH DATA LOWONGAN</h5>
        </div>
        <div class="content">
            <?php include('../require/kelas_lowongan.php'); ?>

            <?php
            $lowongan = new Lowongan();

            if (isset($_POST['submit'])) {

                $id_perusahaan = $_POST['id_perusahaan'];
                $nama_lowongan = $_POST['nama_lowongan'];
                $departemen = $_POST['departemen'];
                $gaji = $_POST['gaji'];
                $kota = $_POST['kota'];
                $tanggal_buka = $_POST['tanggal_buka'];
                $tanggal_tutup = $_POST['tanggal_tutup'];
                $pengalaman_kerja = $_POST['pengalaman_kerja'];
                $deskripsi = $_POST['deskripsi'];
                $qry = $lowongan->InsertData($id_perusahaan, $nama_lowongan, $departemen, $gaji, $kota, $tanggal_buka, $tanggal_tutup, $pengalaman_kerja, $deskripsi);
                if ($qry) {
                    echo "<script language='javascript'>alert('Data berhasil disimpan'); document.location='?menu=data_lowongan&id_perusahaan={$id_perusahaan}'</script>";
                } else {
                    echo "<script language='javascript'>alert('Data gagal disimpan!'); document.location='?menu=tambah_lowongan&id_perusahaan={$id_perusahaan}'</script>";
                }
            }

            ?>
            <div class="wrapper">
                <form action="" method="POST">
                    <input type="hidden" name="id_perusahaan" value="<?php echo $_GET['id_perusahaan'] ?>">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="nama_lowongan">Nama Lowongan</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="nama_lowongan" class="form-control" id="nama_lowongan" placeholder="Nama Lowongan" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="departemen">Departemen</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="departemen" class="form-control" id="departemen" placeholder="Departemen" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="gaji">Gaji</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="gaji" class="form-control" id="gaji" placeholder="Gaji" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="kota">Kota</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="kota" class="form-control" id="kota" placeholder="Kota" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="tanggal_buka">Tanggal Buka</label>
                            </div>
                            <div class="col-md-5">
                                <input type="date" name="tanggal_buka" class="form-control" id="tanggal_buka" required>
                            </div>
                            <div class="col-md-5">
                                <input type="date" name="tanggal_tutup" class="form-control" id="tanggal_tutup" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="pengalaman_kerja">Pengalaman Kerja</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="pengalaman_kerja" class="form-control" id="pengalaman_kerja" placeholder="Pengalaman Kerja" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="deskripsi">Deskripsi</label>
                            </div>
                            <div class="col-md-10">
                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="4"></textarea>
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
</div>