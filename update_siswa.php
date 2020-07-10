<?php 
session_start();
include 'koneksi.php';
if (isset($_SESSION['username'])) {
	if ($_SESSION['level'] !== "admin") {
		header('location:logout.php');
	}
	include 'header.php';
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$query = mysqli_query($kon,"SELECT * FROM siswa WHERE id_siswa='$id'");
		$data_siswa = mysqli_fetch_array($query);
		if (isset($_POST['edit'])) {
			$nisn = $_POST['nisn'];
			$nama = $_POST['nama_siswa'];
			$update = mysqli_query($kon,"UPDATE siswa SET nisn='$nisn',nama_siswa='$nama' WHERE id_siswa='$id'");
			if ($update) {
				header('location:kelola_siswa.php');
			}
		}
	}else{
		header('location:kelola_siswa.php');
	}
 ?>
<div class="container">
	<div style="width: 400px;margin: 0 auto;">
		<form method="POST" action="">
			<input type="text" name="nisn" class="form-input" value="<?php echo $data_siswa['nisn'] ?>">
			<input type="text" name="nama_siswa" class="form-input" value="<?php echo $data_siswa['nama_siswa'] ?>">
			<button type="submit" name="edit" class="btn-prim">Edit</button>
		</form>
	</div>
</div>


 <?php 
 include 'footer.php';
}else{
	header('location:login.php'); 
}
  ?>
