<?php 
	include 'koneksi.php';
	if (isset($_POST['reg'])) {
		$nama 		=	$_POST['nama_lengkap'];
		$user 		=	$_POST['username'];
		$pass 		=	$_POST['password'];
		if (empty($nama) || empty($user) || empty($pass)) {
			echo "<script>alert('Harap Isi Data Semua')</script>";
		}else{
			$simpan =	mysqli_query($kon, "INSERT INTO users VALUES('','$nama','$user','$pass','user')");
			if ($simpan) {
				echo "<script>alert('Berhasil Daftar')</script>";
			}
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<div class="kotak">
			<form method="POST" action="">
				<label>Nama Lengkap</label>
				<input type="text" name="nama_lengkap" placeholder="Nama Lengkap.." class="form-input" required="">
				<label>Username</label>
				<input type="text" placeholder="Username" name="username" max="50" class="form-input" required="">
				<label>Password</label>
				<input type="password" name="password" max="100" class="form-input" required="">
				<button type="submit" name="reg" class="btn-prim">Daftar</button>
			</form>
			<i>Sudah punya akun ? silahkan &nbsp;<a href="login.php">Masuk</a></i>
		</div>
	</div>

</body>
</html>