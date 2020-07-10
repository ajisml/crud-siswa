 <!DOCTYPE html>
 <html>
 <head>
 	<title>Halaman <?=$_SESSION['level'];?></title>
 	<link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body>
 	<div class="header mt">
 		<nav class="navigasi">
 			<ul>
 				<li><a href="index.php">Home</a></li>
 				<?php if($_SESSION['level'] !== 'user'){ ?>
 				<li><a href="kelola_siswa.php">Kelola Siswa</a></li>
 				<?php }else{ ?>
 					<li><a href="lihat_siswa.php">Lihat Siswa</a></li>
 				<?php } ?>
 				<li><a href="logout.php">Logout</a></li>
 			</ul>
 		</nav>
 	</div>