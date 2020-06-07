<?php
if (isset($_GET['menu_utama'])) {
    $menu_utama = $_GET['menu_utama'];
    if ($menu_utama == "halaman_utama") {
        include "../index.php";
    }
    if ($menu_utama == "detail_lowongan_index") {
        include "detail_lowongan.php";
    }
    if ($menu_utama == "lowongan") {
        include "lowongan.php";
    }
    if ($menu_utama == "cari_lowongan") {
        include "cari_lowongan.php";
    }
}
