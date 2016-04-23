<?php
if(isset($_POST['submit']) && $_POST['submit'] == "submit") {

$q = mysql_query("UPDATE `pelajaran`
SET 
  `kode_pelajaran` = '$_POST[kode_pelajaran]',
  `nama_pelajaran` = '$_POST[nama_pelajaran]'
WHERE `kode_pelajaran` = '$_POST[kode_pelajaran]'");


echo "<script>alert('Data berhasil tersimpan'); location.href='?page=pelajaran';</script";

}
?>