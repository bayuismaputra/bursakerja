<?php

$tampil_lowongan = new lowongan();
$data_lowongan = $tampil_lowongan->GetData("JOIN perusahaan ON lowongan.id_perusahaan=perusahaan.id_perusahaan where status_lowongan='ada'");
$no = 1;
while ($value = $data_lowongan->fetch(PDO::FETCH_ASSOC)) {
?>
    <div class="col-lg-3 tampil-lowongan">
        <div class="card">
            <div class="card-body">
                <img src="uploud/<?php echo $value['logo_perusahaan'] ?>" class="img-fluid" alt="logo_perusahaan">
                <h6 class="card-title"><?php echo $value['nama_lowongan'] ?></h6>
                <p class="card-text"><?php echo $value['nama_perusahaan'] ?></p>
                <ul class="list-group">
                    <li><i class="fas fa-building"></i><?php echo $value['departemen'] ?></li>
                    <li><i class="fas fa-map-marker-alt"></i><?php echo $value['kota'] ?></li>
                    <li><i class="fas fa-money-bill-wave"></i><?php echo 'Rp. ' . $value['gaji'] ?>
                    </li>
                    <li><i class="fas fa-briefcase"></i><?php echo $value['pengalaman_kerja'] ?></li>
                </ul>
                <a href="?menu_utama=detail_lowongan_index&id_lowongan=<?php echo $value['id_lowongan'] ?>" class="btn btn-block tombol-lamar">Lamar</a>
            </div>
        </div>
    </div>
<?php
}
?>