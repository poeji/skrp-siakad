<?php
if(isset($_GET['id']) && $_GET['id'] != "") {

	$del = mysql_query("DELETE FROM `siswa` WHERE `nis` = '".$_GET['id']."'");

	echo "<script>alert('Data berhasil terhapus'); location.href='?page=siswa';</script";
}
?>