<div class="col-md-10 main-container">
    <div class="container">
        <div class="judul-content">
            <h5><i class="fas fa-suitcase mr-2"></i> DATA LOWONGAN</h5>
            <a class="btn btn-success mb-2" href="?menu=tambah_lowongan&id_perusahaan=<?php echo $_SESSION['id_user'] ?>"><i class="fa fa-plus mr-1"></i> Tambah</a>
        </div>
        
        <div class="content">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTables" cellspacing="0">
                    <thead class="tabel" align="center">
                        <tr>
                            <th>No.</th>
                            <th>LOWONGAN</th>
                            <th>GAJI</th>
                            <th>DEPARTEMEN</th>
                            <th>OPSI</th>
                        </tr>
                    </thead>
                    <?php include('../require/kelas_lowongan.php');
                    $lowongan = new lowongan();
                    $data_lowongan = $lowongan->GetData("");
                    $no = 1;
                    while ($value = $data_lowongan->fetch(PDO::FETCH_ASSOC)) {
                        echo ' <tr>
                        <td align="center">' . $no . '</td>
                        <td>' . $value['nama_lowongan'] . '</td>
                        <td>Rp. ' . $value['gaji'] . '</td>
                        <td>' . $value['departemen'] . '</td>
                        <td align="center">
                        <a href="?menu=data_kriteria&id_lowongan=' . $value['id_lowongan'] . '" class="btn btn-warning btn-sm"><i class="fas fa-clipboard-list mr-1"></i> Kriteria</a>
                            <a href="" class="btn btn-info btn-sm"><i class="fa fa-edit mr-1"></i> Edit</a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash mr-1"></i> Hapus</a>
                        </td>
                </tr>';
                        $no++;
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
</div>