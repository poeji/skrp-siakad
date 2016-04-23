<?php
if(isset($_POST['submit']) && $_POST['submit'] == "submit") {

list($buln,$tangl,$tahn)=explode("/",$_POST['tgl_lahir']);
$Q = mysql_query("UPDATE `guru`
SET `nip` = '$_POST[nip]',
  `nama_guru` = '$_POST[nama_guru]',
  `tempat_lahir` = '$_POST[tempat_lahir]',
  `tgl_lahir` = '".$tahn."-".$buln."-".$tangl."',
  `jenis_kelamin` = '$_POST[jenis_kelamin]',
  `alamat` = '$_POST[alamat]',
  `agama` = '$_POST[agama]',
  `st_menikah` = '$_POST[st_menikah]',
  `tlp_rmh` = '$_POST[tlp_rmh]',
  `hp` = '$_POST[hp]'
WHERE `nip` = '$_POST[nip]'");	

echo "<script>alert('Data berhasil tersimpan'); location.href='?page=home_guru';</script";

}
?>