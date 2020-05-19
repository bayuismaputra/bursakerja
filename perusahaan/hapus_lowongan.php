<?php include('../require/kelas_lowongan.php');
$lowongan = new Lowongan();
if (isset($_GET['id_lowongan'])) {

    $id_lowongan = $_GET['id_lowongan'];
    $qry = $lowongan->HapusData($id_lowongan);
    if ($qry) {
        echo "<script language='javascript'>alert('Data berhasil dihapus'); document.location='?menu=data_lowongan'</script>";
    } else {
        echo "<script language='javascript'>alert('Gagal'); document.location='?menu=penerimaan'</script>";
    }
} else {
    echo "Pilih lowongan dahulu";
}
