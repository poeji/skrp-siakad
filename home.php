<?php
/*if($_SESSION['akses']=="siswa") {
	include "home_siswa.php";
} elseif($_SESSION['akses']=="guru") {
	include "home_guru.php";
} elseif($_SESSION['akses']=="admin") {
	//echo $_SESSION['nama'];
	echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br>"; 
}
*/

//echo "Selamat datang ".$_SESSION['nama'];
?>

<div align="center">
Selamat datang di Sistem Informasi Akademik <br />
Anda sedang berada di halaman <?php echo ucfirst($_SESSION['level']); ?> Sistem Informasi Akademik
<br />
<img src="images/logotutwurihandayani.png" width="300px" /></div>