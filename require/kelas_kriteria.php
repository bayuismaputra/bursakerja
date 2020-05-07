<?php require('koneksi.php');
class Kriteria extends Bursakerja
{
    private $sqlDataLowongan;
    private $sqlInsert;
    private $sqlEdit;
    private $sqlHapus;
    private $sqlHapusLamaran;

    function __construct()
    {
        $this->sqlDataLowongan = $this->bukaKoneksi()->prepare("select * from kriteria where id_lowongan=:id_lowongan");
        $this->sqlInsert = $this->bukaKoneksi()->prepare("insert into kriteria values ('', :id_lowongan, :nama_kriteria, :tipe_kriteria, :bobot)");
        $this->sqlEdit = $this->bukaKoneksi()->prepare("update kriteria set nama_kriteria=:nama_kriteria, tipe_kriteria=:tipe_kriteria, bobot=:bobot where id_kriteria=:id_kriteria");
        $this->sqlHapus = $this->bukaKoneksi()->prepare("delete from kriteria where id_kriteria=:id_kriteria");
        $this->sqlHapuskriteria = $this->bukaKoneksi()->prepare("delete from pelamar where id_lowongan=:id_lowongan and kriteria=:kriteria");
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

    function InsertData($id_lowongan, $nama_kriteria, $tipe_kriteria, $bobot)
    {
        try {
            $this->sqlInsert->bindParam(':id_lowongan', $id_lowongan);
            $this->sqlInsert->bindParam(':nama_kriteria', $nama_kriteria);
            $this->sqlInsert->bindParam(':tipe_kriteria', $tipe_kriteria);
            $this->sqlInsert->bindParam(':bobot', $bobot);
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

    function EditData($nama_kriteria, $tipe_kriteria, $bobot, $id_kriteria)
    {
        try {
            $this->sqlEdit->bindParam(':nama_kriteria', $nama_kriteria);
            $this->sqlEdit->bindParam(':tipe_kriteria', $tipe_kriteria);
            $this->sqlEdit->bindParam(':bobot', $bobot);
            $this->sqlEdit->bindParam(':id_kriteria', $id_kriteria);
            $this->sqlEdit->execute();
            return $this->sqlEdit;
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

    function HapusKriteriaLamaran($id_lowongan, $kriteria)
    {
        try {
            $this->sqlHapusLamaran->bindParam(':id_lowongan', $id_lowongan);
            $this->sqlHapusLamaran->bindParam(':kriteria', $kriteria);
            $this->sqlHapusLamaran->execute();
            return $this->sqlHapusLamaran;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }
}
