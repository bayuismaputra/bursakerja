<?php //require('koneksi.php');
class Lamaran extends Bursakerja
{
    private $sqlDataLowongan;
    private $sqlInsert;
    private $sqlEdit;
    private $sqlHapus;
    private $sqlHapusLamaran;

    function __construct()
    {
        $this->sqlDataLowongan = $this->bukaKoneksi()->prepare("select * from lamaran where id_lamaran=:id_lamaran");
        $this->sqlInsert = $this->bukaKoneksi()->prepare("insert into lamaran (`id_lamaran`, `id_pelamar`, `id_lowongan`, `id_kriteria`, `file`) values ('', :id_pelamar, :id_lowongan, :id_kriteria, :file)");
        $this->sqlEdit = $this->bukaKoneksi()->prepare("update lamaran set nama_kriteria=:nama_kriteria, tipe_kriteria=:tipe_kriteria, bobot=:bobot, status_uploud=:status_uploud where id_kriteria=:id_kriteria");
        $this->sqlHapusLamaran = $this->bukaKoneksi()->prepare("delete from lamaran where id_lowongan=:id_lowongan");
        $this->sqlUpdtLamaran = $this->bukaKoneksi()->prepare("UPDATE `pelamar` SET `email`=:email,`alamat`=:alamat,`tempat_lahir`=:tempat_lahir,`tanggal_lahir`=:tanggal_lahir,`jenis_kelamin`=:jenis_kelamin,`no_telpon`=:no_telpon,`status_nikah`=:status_nikah,`curriculum_vitae`=:curriculum_vitae WHERE `id_user`=:id_user");
    }

    function GetData($qry_custom)
    {
        try {
            $sql = $this->bukaKoneksi()->prepare("select * from kriteria " . $qry_custom);
            $sql->execute();
            return $sql;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function GetDataPelamar($qry_custom)
    {
        try {
            $sql = $this->bukaKoneksi()->prepare("select * from pelamar " . $qry_custom);
            $sql->execute();
            return $sql;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function InsertData($id_pelamar, $id_lowongan, $id_kriteria, $file)
    {
        try {
            $this->sqlInsert->bindParam(':id_pelamar', $id_pelamar);
            $this->sqlInsert->bindParam(':id_lowongan', $id_lowongan);
            $this->sqlInsert->bindParam(':id_kriteria', $id_kriteria);
            $this->sqlInsert->bindParam(':file', $file);
            $this->sqlInsert->execute();
            return $this->sqlInsert;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function GetDataLowongan($id_lowongan)
    {
        try {
            $this->sqlDataLowongan->bindParam(':id_lowongan', $id_lowongan);
            $this->sqlDataLowongan->execute();
            return $this->sqlDataLowongan;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function EditData($nama_kriteria, $tipe_kriteria, $bobot, $status_uploud, $id_kriteria)
    {
        try {
            $this->sqlEdit->bindParam(':nama_kriteria', $nama_kriteria);
            $this->sqlEdit->bindParam(':tipe_kriteria', $tipe_kriteria);
            $this->sqlEdit->bindParam(':bobot', $bobot);
            $this->sqlEdit->bindParam(':status_uploud', $status_uploud);
            $this->sqlEdit->bindParam(':id_kriteria', $id_kriteria);
            $this->sqlEdit->execute();
            return $this->sqlEdit;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function updateLamaran($email, $alamat, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $no_telpon, $status_nikah, $curriculum_vitae, $id_user)
    {
        try {
            $this->sqlUpdtLamaran->bindParam(':email', $email);
            $this->sqlUpdtLamaran->bindParam(':alamat', $alamat);
            $this->sqlUpdtLamaran->bindParam(':tempat_lahir', $tempat_lahir);
            $this->sqlUpdtLamaran->bindParam(':tanggal_lahir', $tanggal_lahir);
            $this->sqlUpdtLamaran->bindParam(':jenis_kelamin', $jenis_kelamin);
            $this->sqlUpdtLamaran->bindParam(':no_telpon', $no_telpon);
            $this->sqlUpdtLamaran->bindParam(':status_nikah', $status_nikah);
            $this->sqlUpdtLamaran->bindParam(':curriculum_vitae', $curriculum_vitae);
            $this->sqlUpdtLamaran->bindParam(':id_user', $id_user);
            $this->sqlUpdtLamaran->execute();
            return $this->sqlUpdtLamaran;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function HapusData($id_kriteria)
    {
        try {
            $this->sqlHapus->bindParam(':id_kriteria', $id_kriteria);
            $this->sqlHapus->execute();
            return $this->sqlHapus;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function HapusLamaran($id_lowongan)
    {
        try {
            $this->sqlHapusLamaran->bindParam(':id_lowongan', $id_lowongan);
            $this->sqlHapusLamaran->execute();
            return $this->sqlHapusLamaran;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }
}
