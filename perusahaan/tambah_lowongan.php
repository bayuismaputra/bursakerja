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
                $kuota = $_POST['kuota'];
                $tanggal_tutup = $_POST['tanggal_tutup'];
                $pengalaman_kerja = $_POST['pengalaman_kerja'];
                $deskripsi = $_POST['deskripsi'];

                $jurusan = $_POST['jurusan'];

                $qcekId = $lowongan->queryCustom("SELECT * FROM lowongan where nama_lowongan='-' and departemen='-' and gaji='-' order by id_lowongan DESC limit 1");
                if ($qcekId->rowCount() > 0) {
                    $res = $qcekId->fetch();
                    $id_lowongan = $res['id_lowongan'];
                } else {
                    $qinsert = $lowongan->queryCustom("INSERT INTO `lowongan` (`id_lowongan`, `nama_lowongan`, `departemen`, `gaji`, `kota`, `kuota`, `tanggal_tutup`, `pengalaman_kerja`, `deskripsi`, `id_perusahaan`, `status_lowongan`, `status_pengumuman`) VALUES (NULL, '-', '-', '-', '-', 0, '0000-00-00', '-', '-', '{$id_perusahaan}', 'ada', '0')");

                    $qId = $lowongan->queryCustom("SELECT * FROM lowongan where nama_lowongan='-' and departemen='-' and gaji='-' order by id_lowongan DESC limit 1");
                    $res = $qId->fetch();
                    $id_lowongan = $res['id_lowongan'];
                }

                for ($i = 0; $i < count($jurusan); $i++) {
                    $lowongan->queryCustom("INSERT INTO lowongan_detail (id_lowongan,id_jurusan) VALUES ({$id_lowongan},{$jurusan[$i]})");
                }
                $qry = $lowongan->EditData($nama_lowongan, $departemen, $gaji, $kota, $kuota, $tanggal_tutup, $pengalaman_kerja, $deskripsi, $id_lowongan);
                // die;
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
                                <label class="control-label" for="kuota">Kuota</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="kuota" class="form-control" id="kuota" required>
                            </div>
                            <div class="col-md-2">
                                <label class="control-label" for="tanggal_tutup">Tanggal Tutup</label>
                            </div>
                            <div class="col-md-4">
                                <input type="date" value="<?php echo date('Y-m-d') ?>" name="tanggal_tutup" class="form-control" id="tanggal_tutup" required>
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
                    <div class="form-group jurusan_custom jurusan">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="jurusan">Kategori Jurusan</label>
                            </div>
                            <div class="col-md-10">
                                <?php $qry_jurusan = $lowongan->queryCustom("SELECT * From jurusan ORDER BY jurusan ASC") ?>
                                <select class="customx-select selectpicker" name="jurusan[]" multiple required>
                                    <?php foreach ($qry_jurusan as $key) : ?>
                                        <option value="<?= $key['id_jurusan'] ?>"><?= $key['jurusan']; ?></option>
                                    <?php endforeach; ?>
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
</div>