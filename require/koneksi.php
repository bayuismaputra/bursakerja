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
        $this->sqlInsert = $this->bukaKoneksi()->prepare("INSERT INTO `perusahaan`(`id_perusahaan`, `id_user`, `nama_perusahaan`, `alamat`, `kota`, `logo_perusahaan`, `email`) VALUES (null, :id_user, :nama_perusahaan, :alamat, :kota, :logo_perusahaan, :email)");
        $this->sqlEdit = $this->bukaKoneksi()->prepare("update perusahaan set nama_perusahaan=:nama_perusahaan, alamat=:alamat, kota=:kota, logo_perusahaan=:logo_perusahaan, email=:email where id_perusahaan=:perusahaan");
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

    function InsertData($id_user, $nama_perusahaan, $alamat, $kota, $logo_perusahaan, $email)
    {
        try {
            $this->sqlInsert->bindParam(':id_user', $id_user);
            $this->sqlInsert->bindParam(':nama_perusahaan', $nama_perusahaan);
            $this->sqlInsert->bindParam(':alamat', $alamat);
            $this->sqlInsert->bindParam(':kota', $kota);
            $this->sqlInsert->bindParam(':logo_perusahaan', $logo_perusahaan);
            $this->sqlInsert->bindParam(':email', $email);
            $this->sqlInsert->execute();
            return $this->sqlInsert;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function EditData($nama_perusahaan, $alamat, $kota, $logo_perusahaan, $email, $id_perusahaan)
    {
        try {
            $this->sqlEdit->bindParam(':nama_perusahaan', $nama_perusahaan);
            $this->sqlEdit->bindParam(':alamat', $alamat);
            $this->sqlEdit->bindParam(':kota', $kota);
            $this->sqlEdit->bindParam(':logo_perusahaan', $logo_perusahaan);
            $this->sqlEdit->bindParam(':email', $email);
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
        $this->sqlRegister = $this->bukaKoneksi()->prepare("INSERT into user (nama_lengkap, username, hak_akses, password) values (:nama_lengkap, :username, :hak_akses, :password)");
        $this->sqlUpdate = $this->bukaKoneksi()->prepare("UPDATE user set nama_lengkap=:nama_lengkap, username=:username where id_user=:id_user");
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

    function Register($nama_lengkap, $username, $hak_akses, $password)
    {
        try {
            $this->sqlRegister->bindParam(':nama_lengkap', $nama_lengkap);
            $this->sqlRegister->bindParam(':username', $username);
            $this->sqlRegister->bindParam(':hak_akses', $hak_akses);
            $this->sqlRegister->bindParam(':password', $password);
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

    function UpdateData($nama_lengkap, $username,  $id_user)
    {
        try {
            $this->sqlUpdate->bindParam(':nama_lengkap', $nama_lengkap);
            $this->sqlUpdate->bindParam(':username', $username);
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
    private $sqlInsert;
    private $sqlUploadBerkas;

    function __construct()
    {
        $this->sqlCekLamaran = $this->bukaKoneksi()->prepare("select * from pelamar where id_user=:id_user and id_lowongan=:id_lowongan");
        $this->sqlInsert = $this->bukaKoneksi()->prepare("INSERT INTO `pelamar`(`id_pelamar`, `email`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `no_telpon`, `status_nikah`, `curriculum_vitae`, `id_user`) VALUES (null, :email, :alamat, :tempat_lahir, :tanggal_lahir, :jenis_kelamin, :no_telpon, :status_nikah, :curriculum_vitae, :id_user)");
        $this->sqlUpdate = $this->bukaKoneksi()->prepare("UPDATE `pelamar` SET `email`=:email,`alamat`=:alamat,`tempat_lahir`=:tempat_lahir,`tanggal_lahir`=:tanggal_lahir,`jenis_kelamin`=:jenis_kelamin,`no_telpon`=:no_telpon,`status_nikah`=:status_nikah,`curriculum_vitae`=:curriculum_vitae,`id_user`=:id_user WHERE `id_pelamar`=:id_pelamar");
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

    function InsertData($email, $alamat, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $no_telpon, $status_nikah, $curriculum_vitae, $id_user)
    {
        try {
            $this->sqlInsert->bindParam(':email', $email);
            $this->sqlInsert->bindParam(':alamat', $alamat);
            $this->sqlInsert->bindParam(':tempat_lahir', $tempat_lahir);
            $this->sqlInsert->bindParam(':tanggal_lahir', $tanggal_lahir);
            $this->sqlInsert->bindParam(':jenis_kelamin', $jenis_kelamin);
            $this->sqlInsert->bindParam(':no_telpon', $no_telpon);
            $this->sqlInsert->bindParam(':status_nikah', $status_nikah);
            $this->sqlInsert->bindParam(':curriculum_vitae', $curriculum_vitae);
            $this->sqlInsert->bindParam(':id_user', $id_user);
            $this->sqlInsert->execute();
            return $this->sqlInsert;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }
}
