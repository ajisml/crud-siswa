<?php 
session_start();
if (isset($_SESSION['username'])) {
	include 'header.php';
 ?>
 <div class="container">
 	<h2>Selamat Datang <?php echo $_SESSION['nama_lengkap'];?><sup>(<?php echo $_SESSION['level'] ?>)</sup></h2>
 </div>
<?php 
	include 'footer.php';
}else{
	header('location:login.php');
}
?>