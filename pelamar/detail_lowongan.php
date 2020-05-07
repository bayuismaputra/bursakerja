<div class="col-lg-10 main-container">
    <div class="container">
        <div class="judul-content">
            <h5><i class="fas fa-tachometer-alt mr-2"></i> Detail lowongan</h5>
        </div>
        <div class="content">
            <?php include('../require/kelas_lowongan.php');
            $detail_lowongan = new lowongan();
            $data_lowongan = $detail_lowongan->GetData("where id_lowongan=$_GET[id_lowongan]");
            $no = 1;
            while ($value = $data_lowongan->fetch(PDO::FETCH_ASSOC)) {

                echo ' 
                <h5>profil perusahaan</h5>
                <p>nama_perusahaan</p>
                        <img src="img/module_table_bottom.png" alt="bayu">
                        <hr>
            <h5>' . $value['nama_lowongan'] . '</h5>
            <p>' . $value['gaji'] . '</p>
            <p>' . $value['departemen'] . '</p>
            <p>' . $value['pengalaman_kerja'] . '</p>
            <p>' . $value['tanggal_buka'] . '</p>
            <p>' . $value['tanggal_tutup'] . '</p>
            <a href="?menu=lamaran&id_lowongan=' . $value['id_lowongan'] . '" class="btn btn-success"> lamar</a>
            <br>
            <hr>';
            }
            ?>
        </div>

    </div>
</div>