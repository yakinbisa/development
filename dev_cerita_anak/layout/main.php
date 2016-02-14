<!-- Dokumen khusus M A I N atau isi/konten website -->

<?php

	if(isset($_GET['halaman'])) {
		if($_GET['halaman'] == 'keluar') {
			require_once 'proses/prc_logout.php';
		}

		require_once HALAMAN . $_GET['halaman'] . '.php';
	} else {
		require_once HALAMAN . 'beranda.php';
	}
