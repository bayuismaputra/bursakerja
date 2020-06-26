<div class="col-md-10 main-container">
    <div class="container">
        <div class="judul-content">
            <h5><i class="fas fa-clipboard-list"></i> EDIT DATA LOWONGAN</h5>
        </div>
        <div class="content">

            <?php include('../require/kelas_lowongan.php'); ?>
            <?php
            $lowongan = new Lowongan();
            if (isset($_POST['submit'])) {
                $id_lowongan = $_POST['id_lowongan'];
                $nama_lowongan = $_POST['nama_lowongan'];
                $departemen = $_POST['departemen'];
                $gaji = $_POST['gaji'];
                $kota = $_POST['kota'];
                $kuota = $_POST['kuota'];
                $tanggal_tutup = $_POST['tanggal_tutup'];
                $pengalaman_kerja = $_POST['pengalaman_kerja'];
                $deskripsi = $_POST['deskripsi'];
                $id_perusahaan = $_POST['id_perusahaan'];
                if (isset($_POST['jurusan'])) {
                    $jurusan = $_POST['jurusan'];
                    $lowongan->queryCustom("DELETE from lowongan_detail where id_lowongan={$id_lowongan}");

                    for ($i = 0; $i < count($jurusan); $i++) {
                        $lowongan->queryCustom("INSERT INTO lowongan_detail (id_lowongan,id_jurusan) VALUES ({$id_lowongan},{$jurusan[$i]})");
                    }
                } else {
                    $lowongan->queryCustom("DELETE from lowongan_detail where id_lowongan={$id_lowongan}");
                }

                $qry = $lowongan->EditData($nama_lowongan, $departemen, $gaji, $kota, $kuota, $tanggal_tutup, $pengalaman_kerja, $deskripsi, $id_lowongan);
                if ($qry) {
                    echo "<script language='javascript'>alert('Data berhasil diedit'); document.location='?menu=data_lowongan&id_perusahaan={$id_perusahaan}'</script>";
                } else {
                    echo "<script language='javascript'>alert('Gagal diedit'); document.location='?menu=edit_lowongan&id_lowongan={$id_lowongan}'</script>";
                }
            }
            $id_lowongan = $_GET['id_lowongan'];
            if ($id_lowongan) {
                $qry = $lowongan->GetData("where id_lowongan = " . $id_lowongan);
                while ($value = $qry->fetch(PDO::FETCH_ASSOC)) {

            ?>
                    <form action="" method="POST" class="form-lowongan">
                        <input type="hidden" name="id_perusahaan" value="<?php echo $value['id_perusahaan'] ?>">
                        <input type="hidden" name="id_lowongan" id="id_lowongan" value="<?php echo $value['id_lowongan'] ?>">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="control-label" for="nama_lowongan">Nama Lowongan</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="nama_lowongan" value="<?php echo $value['nama_lowongan'] ?>" class="form-control" id="nama_lowongan" placeholder="Nama Lowongan" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="control-label" for="departemen">Departemen</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="departemen" value="<?php echo $value['departemen'] ?>" class="form-control" id="departemen" placeholder="Departemen" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="control-label" for="gaji">Gaji</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="gaji" value="<?php echo $value['gaji'] ?>" class="form-control" id="gaji" placeholder="Gaji" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="control-label" for="kota">Kota</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="kota" value="<?php echo $value['kota'] ?>" class="form-control" id="kota" placeholder="Kota" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="control-label" for="kuota">Kuota</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="kuota" value="<?php echo $value['kuota'] ?>" class="form-control" id="kuota" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label" for="tanggal_tutup">Tanggal Tutup</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="date" name="tanggal_tutup" value="<?php echo $value['tanggal_tutup'] ?>" class="form-control" id="tanggal_tutup" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="control-label" for="pengalaman_kerja">Pengalaman Kerja</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="pengalaman_kerja" value="<?php echo $value['pengalaman_kerja'] ?>" class="form-control" id="pengalaman_kerja" placeholder="Pengalaman Kerja" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="control-label" for="deskripsi">Deskripsi</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4"><?php echo $value['deskripsi'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group jurusan_custom jurusan">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="control-label" for="jurusan">Kriteria Jurusan</label>
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
            <?php

                }
            }

            ?>

        </div>
    </div>
</div>