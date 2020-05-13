<?php require('require/header.php') ?>

<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Implementasi Metode <em>Simple Additive Weighting</em> <strong>(SAW)</strong><br> pada Aplikasi <strong>Bursa Kerja</strong> Bidang Teknologi Informasi.</h1>
        <div class="input-group col-md-8">
            <input type="text" class="form-control" placeholder="Posisi atau Perusahaan" aria-label="Recipient's username" aria-describedby="button-addon2">
            <input type="text" class="form-control kota" placeholder="Kota" aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn " type="button" id="button-addon2">Cari lowongan</button>
                <!-- <a href="" class="btn btn-primary tombol">Cari lowongan</a> -->
            </div>
        </div>
    </div>
</div>
<!-- akhir jumbotron -->
<!-- lowongan -->
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <img src="img/undraw_sign_in_e6hj.png" class="img-fluid" alt="">
                    <h5 class="card-title">IT Support</h5>
                    <p class="card-text">PT. Sejahtera abadi jaya Tbk.</p>
                    <ul class="list-group">
                        <li><i class="fas fa-building"></i>Teknologi Informasi</li>
                        <li><i class="fas fa-map-marker-alt"></i>Yogyakarta</li>
                        <li><i class="fas fa-money-bill-wave"></i>IDR.4.000.000-10.000.000
                        </li>
                        <li><i class="fas fa-briefcase"></i>0 Tahun</li>
                    </ul>
                    <a href="#" class="btn btn-block tombol-lamar">Lamar</a>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
<?php require('require/footer.php') ?>