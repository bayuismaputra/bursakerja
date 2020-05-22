<div class="col-md-10 main-container">
    <div class="container">
        <div class="judul-content">
            <h5><i class="fas fa-users mr-2"></i> DATA PELAMAR</h5>
            <div class="row">
                <div class="col-lg-2"></div>
                <?php
                include('../require/kelas_lowongan.php');
                include('../require/kelas_lamaran.php');
                $lowongan = new Lowongan();
                $lamaran = new Lamaran();
                $user = new User();
                $pilih_lowongan = $lowongan->GetData("where status_lowongan='ada'");
                ?>
                <div class="col-lg-12 pilih-lowongan">
                    <form action="#" method="GET">
                        <div class="input-group mb-3">
                            <select class="custom-select" name="pilih-lowongan" id="inputGroupSelect04" aria-label="Example select with button addon">
                                <?php
                                while ($row = $pilih_lowongan->fetch()) {
                                    echo "<option value='$row[id_lowongan]'>$row[nama_lowongan]</option>";
                                }
                                ?>
                            </select>
                            <div class="input-group-append">
                                <button name="submit" class="btn btn-success" type="button">CEK</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTables" cellspacing="0">
                    <thead class="tabel" align="center">
                        <tr>
                            <th>No.</th>
                            <th>PELAMAR</th>
                            <th>JENIS KELAMIN</th>
                            <th>TEMPAT LAHIR</th>
                            <th>TANGGAL LAHIR</th>
                        </tr>
                    </thead>
                    <?php

                    $data_pelamar = $lowongan->GetData("where id_lowongan=" . $id_lowongan);
                    $no = 1;
                    while ($value = $data_pelamar->fetch(PDO::FETCH_ASSOC)) {
                        echo ' <tr>
                        <td align="center">' . $no . '</td>
                        <td>' . $value['nama_pelamar'] . '</td>
                        <td>' . $value['jenis_kelamian'] . '</td>
                        <td>' . $value['tempat_lahir'] . '</td>
                        <td>' . $value['tanggal_lahir'] . '</td>
                        </tr>';
                        $no++;
                    }

                    ?>
                </table>
            </div>
            </>
        </div>
    </div>