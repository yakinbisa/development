<?php

class Database {

	protected function SetDatabase() {
		return $db = new mysqli('localhost', 'root', '', 'db_dev_app_cerita_anak'); // Memilih database yang digunakan
	}


	public function tampilkan_anggota() {
		$q = "SELECT * FROM tb_anggota";
		return $this->SetDatabase()->query($q);
	}

}

