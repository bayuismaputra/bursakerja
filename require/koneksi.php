<?php
class Bursakerja
{

    protected $koneksi;

    function bukaKoneksi()
    {
        try {
            $this->koneksi = new PDO("mysql:host=localhost;dbname=bursakerja", "root", "", array(PDO::ATTR_PERSISTENT => TRUE));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $this->koneksi;
    }

    function LoginUser($username, $password)
    {
        try {
            $sql = $this->bukaKoneksi()->prepare("select * from user where username = :username and password = :password");
            $sql->bindParam(':username', $username);
            $sql->bindParam(':password', $password);
            $sql->execute();
            return $sql;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }
    function getDataperusahaan($id_user)
    {
        try {
            $sql = $this->bukaKoneksi()->prepare("select * from perusahaan where id_user=:id_user");
            $sql->bindParam(':id_user', $id_user);
            $sql->execute();
            return $sql;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function getDatapelamar($id_user)
    {
        try {
            $sql = $this->bukaKoneksi()->prepare("select * from pelamar where id_user=:id_user");
            $sql->bindParam(':id_user', $id_user);
            $sql->execute();
            return $sql;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}

class Perusahaan extends Bursakerja
{
    private $sqlInsert;
    private $sqlEdit;
    private $sqlHapus;

    function __construct()
    {
        $this->sqlInsert = $this->bukaKoneksi()->prepare("insert into perusahaan values ('', :nama_perusahaan, :alamat, :kota, :logo_perusahaan)");
        $this->sqlEdit = $this->bukaKoneksi()->prepare("update perusahaan set nama_perusahaan=:nama_perusahaan, alamat=:alamat, kota=:kota where id_perusahaan=:perusahaan");
        $this->sqlHapus = $this->bukaKoneksi()->prepare("delete from perusahaan where id_perusahaan=:id_perusahaan");
        $this->sqlHapusLamaran = $this->bukaKoneksi()->prepare("delete from pelamar where id_lowongan=:id_lowongan and kriteria=:kriteria");
    }

    function GetData($qry_custom)
    {
        try {
            $sql = $this->bukaKoneksi()->prepare("select * from perusahaan " . $qry_custom);
            $sql->execute();
            return $sql;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function InsertData($nama_perusahaan, $alamat, $kota, $logo_perusahaan)
    {
        try {
            $this->sqlInsert->bindParam(':nama_perusahaan', $nama_perusahaan);
            $this->sqlInsert->bindParam(':alamat', $alamat);
            $this->sqlInsert->bindParam(':kota', $kota);
            $this->sqlInsert->bindParam(':logo_perusahaan', $logo_perusahaan);
            $this->sqlInsert->execute();
            return $this->sqlInsert;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function EditData($nama_perusahaan, $alamat, $kota, $logo_perusahaan, $id_perusahaan)
    {
        try {
            $this->sqlEdit->bindParam(':nama_perusahaan', $nama_perusahaan);
            $this->sqlEdit->bindParam(':alamat', $alamat);
            $this->sqlEdit->bindParam(':kota', $kota);
            $this->sqlEdit->bindParam(':logo_perusahaan', $logo_perusahaan);
            $this->sqlEdit->bindParam(':id_perusahaan', $id_perusahaan);
            $this->sqlEdit->execute();
            return $this->sqlEdit;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function HapusData($id_perusahaan)
    {
        try {
            $this->sqlHapus->bindParam(':id_perusahaan', $id_perusahaan);
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

class User extends Bursakerja
{
    private $sqlRegister;
    private $sqlUpdate;

    function __construct()
    {
        $this->sqlRegister = $this->bukaKoneksi()->prepare("insert into user (nama_lengkap, email, username, password) values (:nama_lengkap, :email, :username, :password)");
        $this->sqlUpdate = $this->bukaKoneksi()->prepare("update users set nama_lengkap=:nama_lengkap, alamat=:alamat, tempat_lahir=:tempat_lahir, tanggal_lahir=:tanggal_lahir, no_hp=:no_hp, email=:email, pendidikan=:pendidikan, file_cv=:file_cv, foto=:foto where id_user=:id_user");
    }

    function GetData($qry_custom)
    {
        try {
            $sql = $this->bukaKoneksi()->prepare("select * from user " . $qry_custom);
            $sql->execute();
            return $sql;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function GetDataRinci($hak_akses, $id_user, $id)
    {
        try {
            $sql = $this->bukaKoneksi()->prepare("select * from user inner join {$hak_akses} where id_user={$id_user} AND id_{$hak_akses}={$id}");
            $sql->execute();
            return $sql;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function Register($nama_lengkap, $email, $username, $password)
    {
        try {
            $this->sqlRegister->bindParam(':nama_lengkap', $nama_lengkap);
            $this->sqlRegister->bindParam(':username', $username);
            $this->sqlRegister->bindParam(':password', $password);
            $this->sqlRegister->bindParam(':email', $email);
            $this->sqlRegister->execute();
            return $this->sqlRegister;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function LoginUser($username, $password)
    {
        try {
            $sql = $this->bukaKoneksi()->prepare("select * from user where username=:username and password=:password");
            $sql->bindParam(':username', $username);
            $sql->bindParam(':password', $password);
            $sql->execute();
            return $sql;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function UpdateData($nama_lengkap, $alamat, $tempat_lahir, $tanggal_lahir, $no_hp, $email, $pendidikan, $file_cv, $foto,  $id_user)
    {
        try {
            $this->sqlUpdate->bindParam(':nama_lengkap', $nama_lengkap);
            $this->sqlUpdate->bindParam(':alamat', $alamat);
            $this->sqlUpdate->bindParam(':tempat_lahir', $tempat_lahir);
            $this->sqlUpdate->bindParam(':tanggal_lahir', $tanggal_lahir);
            $this->sqlUpdate->bindParam(':no_hp', $no_hp);
            $this->sqlUpdate->bindParam(':email', $email);
            $this->sqlUpdate->bindParam('pendidikan', $pendidikan);
            $this->sqlUpdate->bindParam(':file_cv', $file_cv);
            $this->sqlUpdate->bindParam(':foto', $foto);
            $this->sqlUpdate->bindParam(':id_user', $id_user);
            $this->sqlUpdate->execute();
            return $this->sqlUpdate;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }
}

class Pelamar extends Bursakerja
{
    private $sqlCekLamaran;
    private $sqlInsertAwal;
    private $sqlUploadBerkas;
    private $sqlSetNilai;
    private $sqlInsertAwalHitung;

    function __construct()
    {
        $this->sqlCekLamaran = $this->bukaKoneksi()->prepare("select * from pelamar where id_user=:id_user and id_lowongan=:id_lowongan");
        $this->sqlInsertAwal = $this->bukaKoneksi()->prepare("insert into pelamar (id_user, id_lowongan, kriteria) values (:id_user, :id_lowongan, :kriteria)");
        $this->sqlUploadBerkas = $this->bukaKoneksi()->prepare("update pelamar set file=:file where id_user=:id_user and id_lowongan=:id_lowongan and kriteria=:kriteria");
        $this->sqlSetNilai = $this->bukaKoneksi()->prepare("update pelamar set nilai=:nilai where id_user=:id_user and id_lowongan=:id_lowongan and kriteria=:kriteria");
        $this->sqlInsertAwalHitung = $this->bukaKoneksi()->prepare("insert into hitung (id_user, id_lowongan) values (:id_user, :id_lowongan)");
    }

    function GetData($qry_custom)
    {
        try {
            $sql = $this->bukaKoneksi()->prepare("select * from pelamar " . $qry_custom);
            $sql->execute();
            return $sql;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function CekLamaran($id_user, $id_lowongan)
    {
        try {
            $this->sqlCekLamaran->bindParam(':id_user', $id_user);
            $this->sqlCekLamaran->bindParam(':id_lowongan', $id_lowongan);
            $this->sqlCekLamaran->execute();
            return $this->sqlCekLamaran;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function InsertAwal($id_user, $id_lowongan, $kriteria)
    {
        try {
            $this->sqlInsertAwal->bindParam(':id_user', $id_user);
            $this->sqlInsertAwal->bindParam(':id_lowongan', $id_lowongan);
            $this->sqlInsertAwal->bindParam(':kriteria', $kriteria);
            $this->sqlInsertAwal->execute();
            return $this->sqlInsertAwal;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function InsertAwalHitung($id_user, $id_lowongan)
    {
        try {
            $this->sqlInsertAwalHitung->bindParam(':id_user', $id_user);
            $this->sqlInsertAwalHitung->bindParam(':id_lowongan', $id_lowongan);
            $this->sqlInsertAwalHitung->execute();
            return $this->sqlInsertAwalHitung;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function UploadBerkas($file, $id_user, $id_lowongan, $kriteria)
    {
        try {
            $this->sqlUploadBerkas->bindParam(':file', $file);
            $this->sqlUploadBerkas->bindParam(':id_user', $id_user);
            $this->sqlUploadBerkas->bindParam(':id_lowongan', $id_lowongan);
            $this->sqlUploadBerkas->bindParam(':kriteria', $kriteria);
            $this->sqlUploadBerkas->execute();
            return $this->sqlUploadBerkas;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function SetNilai($nilai, $id_user, $id_lowongan, $kriteria)
    {
        try {
            $this->sqlSetNilai->bindParam(':nilai', $nilai);
            $this->sqlSetNilai->bindParam(':id_user', $id_user);
            $this->sqlSetNilai->bindParam(':id_lowongan', $id_lowongan);
            $this->sqlSetNilai->bindParam(':kriteria', $kriteria);
            $this->sqlSetNilai->execute();
            return $this->sqlSetNilai;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }
}
