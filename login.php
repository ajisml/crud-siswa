<?php 
	include 'koneksi.php';
	if (isset($_POST['login'])) {
		$user 								=	$_POST['username'];
		$pass 								=	$_POST['password'];
		if (empty($user) || empty($pass)) {
			echo "<script>alert('Harap Disi Semua')</script>";
		}else{
			$qcek 							=	mysqli_query($kon, "SELECT * FROM users WHERE username='$user' AND password='$pass'");
			$cek							=	mysqli_fetch_array($qcek);
			if ($user === $cek['username'] AND $pass === $cek['password']) {
				session_start();
				$_SESSION['nama_lengkap']	=	$cek['nama_lengkap'];
				$_SESSION['username']		=	$cek['username'];
				$_SESSION['password']		=	$cek['password'];
				$_SESSION['level']			=	$cek['level'];
				header('location:index.php');
			}
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Masuk</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<div class="kotak">
			<form method="POST" action="">
				<input type="text" placeholder="Username" name="username" class="form-input">
				<input type="password" name="password" class="form-input">
				<button type="submit" name="login" class="btn btn-succ">Masuk</button>
			</form>
			<a href="register.php" class="btn btn-prim">Daftar</a>
		</div>
	</div>

</body>
</html>