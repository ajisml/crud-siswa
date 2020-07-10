<?php 
session_start();
include 'koneksi.php';
if (isset($_SESSION['username'])) {
	if ($_SESSION['level'] !== "user") {
		header('location:logout.php');
	}
	include 'header.php';
	$query = mysqli_query($kon,"SELECT * FROM siswa");
 ?>
 <div class="container">
	<div style="width: 400px;margin: 0 auto;">
		<table border="1" width="100%" style="margin-top: 10px;">
			<tr>
				<th>No.</th>
				<th>Nisn</th>
				<th>Nama Lengkap</th>
			</tr>
			<?php 
			$no=1;
			while($data = mysqli_fetch_array($query)) { ?>
			<tr>
				<td><?=$no++;?></td>
				<td><?=$data['nisn'];?></td>
				<td><?=$data['nama_siswa'];?></td>
			</tr>
		<?php } ?>
		</table>
	</div>
</div>
 <?php 
include 'footer.php';
}else{
	header('location:login.php');
}
  ?>
