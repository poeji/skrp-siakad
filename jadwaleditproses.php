<?php
if(isset($_POST['submit']) && $_POST['submit'] == "submit") {

$Q = mysql_query("UPDATE `jadwal`
SET 
  `nip` = '$_POST[nip]',
  `kode_kelas` = '$_POST[kode_kelas]',
  `kode_pelajaran` = '$_POST[kode_pelajaran]',
  `jam` = '$_POST[jam]',
  `hari` = '$_POST[hari]',
  `thn_ajaran` = '$_POST[tahun_ajaran]'
WHERE `id_jadwal` = '$_POST[id]'");	

echo "<script>alert('Data berhasil tersimpan'); location.href='?page=jadwal';</script";

}
?>