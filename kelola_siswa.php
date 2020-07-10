<?php 
session_start();
include 'koneksi.php';
if (isset($_SESSION['username'])) {
	if ($_SESSION['level'] !== "admin") {
		header('location:logout.php');
	}
	include 'header.php';
	// Proses Simpan
	if (isset($_POST['simpan'])) {
		$nisn = $_POST['nisn'];
		$nama_siswa = $_POST['nama_siswa'];
		$simpan = mysqli_query($kon,"INSERT INTO siswa VALUES('','$nisn','$nama_siswa')");
		if ($simpan) {
			header('location:kelola_siswa.php');
		}
	}
	// Akhiri Proses Simpan
	// Ini Proses Hapus
	if (isset($_GET['hapus'])) {
		$id = $_GET['hapus'];
		$hapus = mysqli_query($kon,"DELETE FROM siswa WHERE id_siswa='$id'");
		if ($hapus) {
			header('location:kelola_siswa.php');
		}

	}
	// Akhiri Proses Hapus
	$query = mysqli_query($kon,"SELECT * FROM siswa");
?>
<div class="container">
	<div style="width: 400px;margin: 0 auto;">
		<form method="POST" action="">
			<input type="text" name="nisn" class="form-input" placeholder="NISN...">
			<input type="text" name="nama_siswa" class="form-input" placeholder="Nama Siswa...">
			<button type="submit" name="simpan" class="btn-succ">Simpan</button>
		</form>
		<table border="1" width="100%" style="margin-top: 10px;">
			<tr>
				<th>No.</th>
				<th>Nisn</th>
				<th>Nama Lengkap</th>
				<th>Aksi</th>
			</tr>
			<?php 
			$no=1;
			while($data = mysqli_fetch_array($query)) { ?>
			<tr>
				<td><?=$no++;?></td>
				<td><?=$data['nisn'];?></td>
				<td><?=$data['nama_siswa'];?></td>
				<td><a href="kelola_siswa.php?hapus=<?php echo $data['id_siswa'] ?>" class="btn-dang btn-kecil">Hapus</a> <a href="update_siswa.php?edit=<?php echo $data['id_siswa'] ?>" class="btn-prim btn-kecil">Edit</a></td>
			</tr>
		<?php } ?>
		</table>
	</div>
</div>
<?php
include 'footer.php'; 
}
 ?>