<div class="col-md-10 main-container">
    <div class="container">
        <div class="judul-content">
            <h5><i class="fas fa-suitcase mr-2"></i> EDIT PROFIL PELAMAR</h5>
        </div>
        <div class="content">
            <div class="wrapper">
                <form action="" method="POST">
                    <input type="hidden" name="id_perusahaan" value="<?php echo $_GET['id_perusahaan'] ?>">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="nama_pelamar">Nama Pelamar</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="nama_pelamar" class="form-control" id="nama_pelamar" placeholder="Nama Pelamar" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="jenis_kelamin">Jenis Kelamin</label>
                            </div>
                            <div class="col-md-10">
                                <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                    <option selected>--Jenis Kelamin--</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
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
                                <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                    <option selected>--Status Nikah--</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
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
                                <textarea class="form-control" name="alamat" id="alamat" rows="4"></textarea>
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
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                                <button type="submit" name="batal" class="btn btn-success">Batal</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>