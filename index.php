<?php require('require/header.php') ?>
<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Implementasi Metode <em>Simple Additive Weighting</em> <strong>(SAW)</strong><br> pada Aplikasi <strong>Bursa Kerja</strong> Bidang Teknologi Informasi.</h1>
        <form action="" method="GET" class="">
            <div class="input-group col-md-8">
                <input type="text" name="posisi" class="form-control" placeholder="Posisi atau Perusahaan" aria-label="Recipient's username" aria-describedby="button-addon2">
                <input type="text" name="kota" class="form-control kota" placeholder="Kota" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn" type="submit" name="menu_utama" value="cari_lowongan" id="button-addon2">Cari lowongan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- akhir jumbotron -->
<!-- lowongan -->
<div class="container">
    <div class="row">
        <?php
        include('require/kelas_lowongan.php');
        if ($_GET) {
            if ($_GET['menu_utama']) {
                include('menu_utama.php');
            } else {
                include('lowongan.php');
            }
        } else {
            include('lowongan.php');
        }
        ?>

    </div>
</div>
</div>
<?php require('require/footer.php') ?>