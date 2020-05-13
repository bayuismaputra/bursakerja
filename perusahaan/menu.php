<?php
if (isset($_GET['menu'])) {
	$menu = $_GET['menu'];

	if ($menu == "data_pelamar") {
		include "data_pelamar.php";
	}

	if ($menu == "tambah_lowongan") {
		include "tambah_lowongan.php";
	}
	if ($menu == "tambah_kriteria") {
		include "tambah_kriteria.php";
	}
	if ($menu == "edit_kriteria") {
		include "edit_kriteria.php";
	}
	if ($menu == "data_lowongan") {
		include "data_lowongan.php";
	}

	if ($menu == "data_kriteria") {
		include "data_kriteria.php";
	}
	if ($menu == "data_nilai") {
		include "data_nilai.php";
	}
	if ($menu == "ranking") {
		include "ranking.php";
	}
	if ($menu == "dashboard_content") {
		include "dashboard_content.php";
	}
	if ($menu == "logout") {
		include "../logout.php";
	}
	if ($menu == "pelamar") {
		include "../pelamar/pelamar.php";
	}
	if ($menu == "profil_pelamar") {
		include "../pelamar/profil_pelamar.php";
	}
	if ($menu == "edit_profil") {
		include "../pelamar/edit_profil.php";
	}
	if ($menu == "pengumuman_pelamar") {
		include "../pelamar/pengumuman_pelamar.php";
	}
	if ($menu == "detail_lowongan") {
		include "../pelamar/detail_lowongan.php";
	}
	if ($menu == "cari_lowongan") {
		include "../pelamar/cari_lowongan.php";
	}
	if ($menu == "lamaran") {
		include "../pelamar/lamaran.php";
	}
	if ($menu == "pengumuman") {
		include "pengumuman.php";
	}
	if ($menu == "penilaian_kriteria") {
		include "penilaian_kriteria.php";
	}
} else {
	include "dashboard_content.php";
}
