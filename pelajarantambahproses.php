<?php
if(isset($_POST['submit']) && $_POST['submit'] == "submit") {

$q = mysql_query("INSERT INTO `pelajaran` (`kode_pelajaran`,`nama_pelajaran`)
VALUES ('$_POST[kode_pelajaran]','$_POST[nama_pelajaran]')");

echo "<script>alert('Data berhasil tersimpan'); location.href='?page=pelajaran';</script";

}
?>