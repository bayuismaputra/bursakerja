<?php require('koneksi.php');
class Lowongan extends Bursakerja
{
    private $sqlInsert;
    private $sqlEdit;
    private $sqlHapus;
    private $sqlUmumkan;

    function __construct()
    {
        try {
            $this->sqlInsert = $this->bukaKoneksi()->prepare("insert into lowongan values ('', :nama_lowongan, :departemen, :gaji, :kota, :tanggal_buka, :tanggal_tutup, :pengalaman_kerja, :deskripsi, :id_perusahaan)");
            $this->sqlHapus = $this->bukaKoneksi()->prepare("delete from lowongan where id_lowongan = :id_lowongan");
            $this->sqlEdit = $this->bukaKoneksi()->prepare("update lowongan set nama_lowongan=:nama_lowongan, departemen=:departemen, gaji=:gaji, kota=:kota, tanggal_buka=:tanggal_buka, tanggal_tutup=:tanggal_tutup, pengalaman_kerja=:pengalaman_kerja, deskripsi=:deskripsi) where id_lowongan=:id_lowongan");
            $this->sqlUmumkan = $this->bukaKoneksi()->prepare("update lowongan set pengumuman=:pengumuman where id_lowongan=:id_lowongan");
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function GetData($qry_custom)
    {
        try {
            $sql = $this->bukaKoneksi()->prepare("select * from lowongan " . $qry_custom);
            $sql->execute();
            return $sql;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function InsertData($id_perusahaan, $nama_lowongan, $departemen, $gaji, $kota, $tanggal_buka, $tanggal_tutup, $pengalaman_kerja, $deskripsi)
    {
        try {
            $this->sqlInsert->bindParam(':id_perusahaan', $id_perusahaan);
            $this->sqlInsert->bindParam(':nama_lowongan', $nama_lowongan);
            $this->sqlInsert->bindParam(':departemen', $departemen);
            $this->sqlInsert->bindParam(':gaji', $gaji);
            $this->sqlInsert->bindParam(':kota', $kota);
            $this->sqlInsert->bindParam(':tanggal_buka', $tanggal_buka);
            $this->sqlInsert->bindParam(':tanggal_tutup', $tanggal_tutup);
            $this->sqlInsert->bindParam(':pengalaman_kerja', $pengalaman_kerja);
            $this->sqlInsert->bindParam(':deskripsi', $deskripsi);
            $this->sqlInsert->execute();
            return $this->sqlInsert;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function HapusData($id_lowongan)
    {
        try {
            $this->sqlHapus->bindParam(':id_lowongan', $id_lowongan);
            $this->sqlHapus->execute();
            return $this->sqlHapus;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function EditData($nama_lowongan, $departemen, $gaji, $kota, $tanggal_buka, $tanggal_tutup, $pengalaman_kerja, $deskripsi, $id_lowongan)
    {
        try {
            $this->sqlInsert->bindParam(':nama_lowongan', $nama_lowongan);
            $this->sqlInsert->bindParam(':departemen', $departemen);
            $this->sqlInsert->bindParam(':gaji', $gaji);
            $this->sqlInsert->bindParam(':kota', $kota);
            $this->sqlInsert->bindParam(':tanggal_buka', $tanggal_buka);
            $this->sqlInsert->bindParam(':tanggal_tutup', $tanggal_tutup);
            $this->sqlInsert->bindParam(':pengalaman_kerja', $pengalaman_kerja);
            $this->sqlInsert->bindParam(':deskripsi', $deskripsi);
            $this->sqlEdit->bindParam(':id_lowongan', $id_lowongan);
            $this->sqlEdit->execute();
            return $this->sqlEdit;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function SetPengumuman($pengumuman, $id_lowongan)
    {
        try {
            $this->sqlUmumkan->bindParam(':pengumuman', $pengumuman);
            $this->sqlUmumkan->bindParam(':id_lowongan', $id_lowongan);
            $this->sqlUmumkan->execute();
            return $this->sqlUmumkan;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }
}
