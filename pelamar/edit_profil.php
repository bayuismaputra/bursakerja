<div class="col-md-10 main-container">
    <div class="container">
        <div class="judul-content">
            <h5><i class="fas fa-suitcase mr-2"></i> EDIT PROFIL PELAMAR</h5>
        </div>
        <div class="content">
            <div class="wrapper">

                <?php
                require("../require/kelas_lamaran.php");

                $id_user = $_SESSION['id_user'];
                $hak_akses = $_SESSION['hak_akses'];
                $user = new User();
                $lamaran = new Lamaran();
                $profile = $user->getData("INNER JOIN pelamar WHERE user.id_user=pelamar.id_user AND user.id_user={$id_user}");
                $row = $profile->fetch(PDO::FETCH_ASSOC);

                if ($_POST) {
                    if ($_POST['update']) {
                        $id_pelamar = $_POST['id_pelamar'];
                        $nama_lengkap = $_POST['nama_lengkap'];
                        $jenis_kelamin = $_POST['jenis_kelamin'];
                        $no_telpon = $_POST['no_telpon'];
                        $email = $_POST['email'];
                        $tempat_lahir = $_POST['tempat_lahir'];
                        $tanggal_lahir = $_POST['tanggal_lahir'];
                        $status_nikah = $_POST['status_nikah'];
                        $alamat = $_POST['alamat'];

                        if (empty($_FILES['logo']['tmp_name']) && $row['foto_pelamar'] == "default.png") {
                            echo '
                            <div class="alert alert-warning fade show" role="alert">
                                <strong>Data Profil Kosong!</strong>
                            </div>
                            ';
                        } else {
                        }

                        if ($jenis_kelamin == "" || $status_nikah == "" || empty($_FILES['cv']['tmp_name'])) {
                            echo "data kosong";
                        } else {
                            // ketika gambar diubah maka file yang sebelumnya harus di hapus kecuali file default.png
                            if ($row['foto_pelamar'] != 'default.png') {
                                $hps = unlink('../uploud/' . $row['foto_pelamar']);
                            }

                            // upload gambar
                            $explode = explode(".", $_FILES['logo']['name']);
                            $file_Foto = $id_user . "_" . rand(0, 100) . $_FILES['logo']['name'];
                            move_uploaded_file($_FILES['logo']['tmp_name'], "../uploud/" . $file_Foto);

                            // upload cv
                            $explode = explode(".", $_FILES['cv']['name']);
                            $file_Cv = $id_user . "_" . rand(0, 100) . $_FILES['cv']['name'];
                            move_uploaded_file($_FILES['cv']['tmp_name'], "../uploud/" . $file_Cv);

                            $updt_user = $user->UpdateData($nama_lengkap, $_SESSION['username'], $id_user);

                            $updt_user_rinci = $lamaran->updateLamaran($file_Foto, $email, $alamat, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $no_telpon, $status_nikah, $file_Cv, $id_user);

                            echo "<script>document.location='?menu=profil_pelamar';</script>";
                        }
                    }
                }
                ?>

                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_pelamar" value="<?= $row['id_pelamar'] ?>">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="foto_pelamar">Foto Pelamar</label>
                            </div>
                            <div class="col-md-10">
                                <div class="col-12 pl-0 mb-3">
                                    <img src="../uploud/<?= $row['foto_pelamar'] ?>" width="25%" class="img img-thumbnail" alt="Foto Pelamar">
                                </div>
                                <div class="col-12 pl-0">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" name="logo" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="nama_lengkap">Nama Pelamar</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="nama_lengkap" value="<?= $row['nama_lengkap'] ?>" class="form-control" id="nama_pelamar" placeholder="Nama Pelamar" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="jenis_kelamin">Jenis Kelamin</label>
                            </div>
                            <div class="col-md-10">
                                <select class="custom-select" name="jenis_kelamin">
                                    <option <?= ($row['jenis_kelamin'] == '-') ? 'selected' : '' ?> value="">Jenis Kelamin</option>
                                    <option value="Laki-Laki" <?= ($row['jenis_kelamin'] == 'Laki-Laki') ? 'selected' : '' ?>>Laki - Laki</option>
                                    <option value="Perempuan" <?= ($row['jenis_kelamin'] == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="no_telpon">Nomor Telpon</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="no_telpon" class="form-control" id="no_telpon" placeholder="Nomor_telepon" value="<?= ($row['no_telpon'] == '-') ? '' : $row['no_telpon'] ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="email">Email</label>
                            </div>
                            <div class="col-md-10">
                                <input class="form-control" name="email" id="email" rows="4" placeholder="Email" value="<?= ($row['email'] == '-') ? '' : $row['email'] ?>"></input>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="tempat_lahir">Tempat Lahir</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" required value="<?= ($row['tempat_lahir'] == '-') ? '' : $row['tempat_lahir'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="tanggal_lahir">Tanggal Lahir</label>
                            </div>
                            <div class="col-md-10">
                                <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" required value="<?= ($row['tanggal_lahir'] == '-') ? '' : $row['tanggal_lahir'] ?>">
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="status_nikah">Status Nikah</label>
                            </div>
                            <div class="col-md-10">
                                <select class="custom-select" name="status_nikah">
                                    <option <?= ($row['status_nikah'] == '-') ? 'selected' : '' ?> value="">Status Nikah</option>
                                    <option value="Nikah" <?= ($row['status_nikah'] == 'Nikah') ? 'selected' : '' ?>>Nikah</option>
                                    <option value="Belum Nikah" <?= ($row['status_nikah'] == 'Belum Nikah') ? 'selected' : '' ?>>Belum Nikah</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="alamat">Alamat</label>
                            </div>
                            <div class="col-md-10">
                                <textarea class="form-control" name="alamat" id="alamat" rows="4" placeholder="<?= ($row['alamat'] == '-') ? 'Alamat' : '' ?>"><?= ($row['alamat'] == '-') ? '' : $row['alamat'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class=" form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="curriculum_vitae">Curriculum Vitae</label>
                            </div>
                            <div class="col-md-10">
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="cv" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <div class="col-sm-10">
                            <button type="submit" name="update" value="update" class="btn btn-primary">Update</button>
                            <a href="?menu=profil_pelamar"><button type="button" class="btn btn-danger">Batal</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>