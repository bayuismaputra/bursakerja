<div class="col-lg-10 main-container">
    <div class="container">
        <div class="judul-content">
            <h5><i class="fas fa-tachometer-alt mr-2"></i> Cari Lowongan</h5>
        </div>
        <div class="content">
            <?php include('../require/kelas_lowongan.php');
            $cari_lowongan = new lowongan();
            $data_lowongan = $cari_lowongan->GetData("where nama_lowongan LIKE '%$_GET[posisi]%'");
            $no = 1;
            while ($value = $data_lowongan->fetch(PDO::FETCH_ASSOC)) {

                echo ' 
                        <img src="img/module_table_bottom.png" alt="bayu">
            <h5>' . $value['nama_lowongan'] . '</h5>
            <p>' . $value['gaji'] . '</p>
            <p>' . $value['departemen'] . '</p>
            <p>' . $value['pengalaman_kerja'] . '</p>
            <p>' . $value['tanggal_buka'] . '</p>
            <p>' . $value['tanggal_tutup'] . '</p>
            <a href="?menu=detail_lowongan&id_lowongan=' . $value['id_lowongan'] . '" class="btn btn-success"> lamar</a>
            <br>
            <hr>';
            }
            ?>

        </div>

    </div>
</div>