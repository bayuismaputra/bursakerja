<div class="col-md-10 main-container">
    <div class="container">
        <div class="judul-content">
            <h5><i class="fas fa-suitcase mr-2"></i> EDIT PROFIL PERUSAHAAN</h5>
        </div>
        <div class="content">
            <div class="wrapper">
                <form action="" method="POST">
                    <input type="hidden" name="id_perusahaan" value="<?php echo $_GET['id_perusahaan'] ?>">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="nama_perusahaan">Nama Perusahaan</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="nama_perusahaan" class="form-control" id="nama_perusahaan" placeholder="Nama Perusahaan" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="email">Email</label>
                            </div>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="email" placeholder="Nama Perusahaan" id="email" rows="4" required></input>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="kota">Kota</label>
                            </div>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="kota" id="Kota" placeholder="Kota" rows="4"></input>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="alamat">Alamat</label>
                            </div>
                            <div class="col-md-10">
                                <textarea class="form-control" name="alamat" placeholder="Alamat" id="alamat" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" for="logo_perusahaan">Logo Perusahaan</label>
                            </div>
                            <div class="col-md-10">
                                <div class="input-group mb-3">
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