<?php
if(isset($_GET['id']) && $_GET['id'] != "") {

	$del = mysql_query("DELETE FROM `kelas` WHERE `kode_kelas` = '".$_GET['id']."'");

	echo "<script>alert('Data berhasil terhapus'); location.href='?page=kelas';</script";
}
?>