<?php

session_start();

require_once '../config/library.php';

$data = new Login();

$lokasi = '../index.php';
$lokasi2 = '../login.php';

$username = $_POST['username'];
$password = $_POST['password'];

$proses = $data->login($username, $password, $lokasi, $lokasi2);