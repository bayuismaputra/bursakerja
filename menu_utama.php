<?php
if (isset($_GET['menu_utama'])) {
    $menu = $_GET['menu_utama'];

    if ($menu == "detail_lowongan_index") {
        include "detail_lowongan.php";
    }
    if ($menu == "lowongan") {
        include "lowongan.php";
    }
}
