<?php
include('../require/koneksi.php');
$lowongan = new Bursakerja();

$data = $lowongan->queryCustom("SELECT * FROM lowongan_detail where id_lowongan={$_POST['id']}");
foreach ($data as $key) {
    $value[] = (float) $key['id_jurusan'];
}
echo json_encode($value);
