<?php
if(isset($_GET['id']) && $_GET['id'] != "") {

	$del = mysql_query("DELETE FROM `guru` WHERE `nip` = '".$_GET['id']."'");

	echo "<script>alert('Data berhasil terhapus'); location.href='?page=guru';</script";
}
?>