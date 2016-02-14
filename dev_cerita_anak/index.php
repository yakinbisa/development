<!-- I N D E X -->

<?php
session_start();

if(isset($_SESSION['siapa'])) {

require_once 'config/library.php';
require_once 'config/settings.php';

$data = new Database('db_dev_app_cerita_anak');
?>





<!DOCTYPE html>
<html>
<head>
	<title>Cerita Anak</title>
	<meta charset="utf-8">

	<link rel="stylesheet" href="stylesheet.css">

</head>






<body>

	<div id="kotak-bingkai">
	<?php echo "who? ".$_SESSION['siapa']; ?>
		<header><?php require_once LAYOUT.'header.php'; ?></header>
		<nav><?php require_once LAYOUT.'nav.php'; ?></nav>
		<main><?php require_once LAYOUT.'main.php'; ?></main>
		<footer><?php require_once LAYOUT.'footer.php'; ?></footer>
	</div>

</body>
</html>

<?php
} else {
	header('location:login.php');
}