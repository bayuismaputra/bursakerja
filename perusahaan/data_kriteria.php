<div class="col-md-10 main-container">
    <div class="container">
        <div class="judul-content">
            <h5><i class="fas fa-clipboard-list"></i> DATA KRITERIA</h5>
            <a class="btn btn-success mb-2" href="?menu=tambah_kriteria&id_lowongan=<?php echo $_GET['id_lowongan'] ?>"><i class="fa fa-plus mr-1"></i> Tambah</a>
        </div>
        <div class="content">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTables">
                    <thead class="tabel" align="center">
                        <tr>
                            <th>No.</th>
                            <th>KRITERIA</th>
                            <th>TIPE</th>
                            <th>BOBOT</th>
                            <th>STATUS UPLOUD</th>
                            <th>OPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include('../require/kelas_kriteria.php');
                        $kriteria = new Kriteria();
                        $id = "where id_lowongan=" . $_GET['id_lowongan'];
                        $data_kriteria = $kriteria->GetData($id);
                        $no = 1;
                        while ($value = $data_kriteria->fetch(PDO::FETCH_ASSOC)) {
                            echo ' <tr>
                        <td align="center">' . $no . '</td>
                        <td>' . $value['nama_kriteria'] . '</td>
                        <td>' . $value['tipe_kriteria'] . '</td>
                        <td>' . $value['bobot'] . '</td>
                        <td>' . $value['status_uploud'] . '</td>
                        <td align="center">
                            <a href="?menu=edit_kriteria&id_kriteria=' . $value['id_kriteria'] . '" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
            
                        </td>
                        </tr>';
                            $no++;
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>