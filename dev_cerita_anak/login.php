<?php
session_start();

if(!isset($_SESSION['siapa'])) {
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">

	<link rel="stylesheet" href="stylesheet_login.css">

</head>


<body>

	<div class="kotak-login">
		<h3>Login Form</h3>
		<?php echo 'saya' . @$_SESSION['siapa']; ?>
		<form action="proses/prc_login.php" method="post">
			<div>
				<input class="teks" type="text" name="username" placeholder="Username">
			</div>
			<div>
				<input class="teks" type="password" name="password" placeholder="Password">
			</div>
			<div>
				<input type="submit" value="Login">
			</div>
		</form>
	</div>

</body>
</html>

<?php
} else {
	header('location:index.php');
}
?>