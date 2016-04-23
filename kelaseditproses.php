<?php
if(isset($_POST['submit']) && $_POST['submit'] == "submit") {

$q = mysql_query("UPDATE `kelas`
SET 
  `nama_kelas` = '$_POST[nama_kelas]'
WHERE `kode_kelas` = '$_POST[id]'");


echo "<script>alert('Data berhasil tersimpan'); location.href='?page=kelas';</script";

}
?>