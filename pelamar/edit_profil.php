<div class="col-md-10 main-container">
    <div class="container">
        <div class="judul-content">
            <h5><i class="fas fa-suitcase mr-2"></i> EDIT PROFIL PELAMAR</h5>
        </div>
        <div class="content">
            <div class="wrapper">

                <?php
                $id_user = $_SESSION['id_user'];
                $hak_akses = $_SESSION['hak_akses'];
                $user = new User();
                // printf($id_user);
                $profile = $user->getData("where id_user={$id_user}");
                $row = $profile->fetch(PDO::FETCH_ASSOC);
                // echo $row['nama_lengkap'];
                ?>

                <form action="" method="POST">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="nama_pelamar">Nama Pelamar</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="nama_pelamar" value="<?= $row['nama_lengkap'] ?>" class="form-control" id="nama_pelamar" placeholder="Nama Pelamar" required>
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
                                    <option selected>Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki - Laki</option>
                                    <option value="Perempuan">Perempuan</option>
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
                                <input type="text" name="no_telpon" class="form-control" id="no_telpon" placeholder="Nomor_telepon" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="email">Email</label>
                            </div>
                            <div class="col-md-10">
                                <input class="form-control" name="email" id="email" rows="4" placeholder="Email"></input>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="tempat_lahir">Tempat Lahir</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="tanggal_lahir">Tanggal Lahir</label>
                            </div>
                            <div class="col-md-10">
                                <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" required>
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
                                    <option selected>Status Nikah</option>
                                    <option value="Nikah">Nikah</option>
                                    <option value="Belum Nikah">Belum Nikah</option>
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
                                <textarea class="form-control" name="alamat" id="alamat" rows="4">Alamat</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="curriculum_vitae">Curriculum Vitae</label>
                            </div>
                            <div class="col-md-10">
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Sign in</button>
                            <a href="#"><button type="button" class="btn btn-danger">Batal</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>