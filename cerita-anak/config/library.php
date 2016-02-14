<?php

class Database {


	public $database;
	private $batas, $halaman;


	public function __construct($database) {
		$this->database = $database;
	}


	protected function SetDatabase() {
		return $db = new mysqli('localhost', 'root', '', "db_dev_app_cerita_anak"); // Memilih database yang digunakan
	}


	public function tampilkan_anggota() {
		$q = "SELECT * FROM tb_anggota JOIN tb_kelas ON tb_kelas.idKelas = tb_anggota.idKelas ORDER BY Nama";
		return $this->SetDatabase()->query($q);
	}


	public function pagination_part_1_2($batas, $halaman) {
		$this->batas = $batas;
		$this->halaman = $halaman;
		if(empty($this->halaman)) {
			$posisi = 0;
			$this->halaman = 1;
		} else {
			$posisi = ($this->halaman - 1) * $this->batas;
		}

		$q = "SELECT * FROM tb_anggota JOIN tb_kelas ON tb_kelas.idKelas = tb_anggota.idKelas ORDER BY Nama LIMIT $posisi, $batas";
		return $this->SetDatabase()->query($q);
	}


	public function pagination_part_2_2() {
		$q = "SELECT * FROM tb_anggota";
		$r = $this->SetDatabase()->query($q);
		$jmldata = $r->num_rows;
		$jmlhalaman = ceil($jmldata / $this->batas);

		for($i = 1; $i <= $jmlhalaman; $i++) {
			if($i != $this->halaman) {
				echo "<a href=\"?halaman=anggota&amp;hal=$i\">$i</a> | ";
			} else {
				echo "<strong>$i</strong> | ";
			}
		}
	}


} // END-CLASS




class Login extends Database {

	public function __construct() {
		//Sengaja kosong untuk mengoveridden konstruktor kelas atas
	}


	public function login($username, $password, $lokasi, $lokasi2) {
		$q = "SELECT * FROM tb_users WHERE Username = \"$username\" AND Password = \"$password\"";
		$cmd = parent::SetDatabase()->query($q);
		$cocokkan = $cmd->num_rows;
		$cocok = $cmd->fetch_object();

		if (!$cocok) {
			goto here;
		}

		$q2 = "SELECT * FROM tb_users JOIN tb_anggota ON tb_users.idAnggota = tb_anggota.idAnggota WHERE tb_anggota.idAnggota = $cocok->idAnggota";
		$cmd2 = parent::SetDatabase()->query($q2);
		$data = $cmd2->fetch_object();

		if($cocokkan > 0) {
			$_SESSION['siapa'] = $data->Nama;
			header("location:$lokasi");
		} else {
			here:
			header("location:$lokasi2");
		}
	}


	public function login2($username, $password) {
		$q = "SELECT * FROM tb_users WHERE username = $username AND password = $password";
		return $this->SetDatabase()->query($q);
	}


	public function login_matching() {
		$q = "SELECT * FROM tb_users JOIN tb_anggota ON tb_users.idAnggota = tb_anggota.idAnggota";
		return $this->SetDatabase()->query($q);
	}


} // END-CLASS