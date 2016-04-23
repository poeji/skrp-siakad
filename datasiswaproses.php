<?php
if(isset($_POST['submit']) && $_POST['submit'] == "submit") {

//print_r($_POST);
//exit();
list($buln,$tangl,$tahn)=explode("/",$_POST['tanggal_lahir']);
$Q = mysql_query("UPDATE `siswa`
SET 
  `nama_siswa` = '$_POST[nama_siswa]',
  `tempat_lahir` = '$_POST[tempat_lahir]',
  `tanggal_lahir` = '".$tahn."-".$buln."-".$tangl."',
  `alamat` = '$_POST[alamat]',
  `agama` = '$_POST[agama]',
  `jenis_kelamin` = '$_POST[jenis_kelamin]',
  `nama_orangtua` = '$_POST[nama_orangtua]',
  `telepon_orangtua` = '$_POST[telepon_orangtua]'
WHERE `nis` = '$_POST[nis]';");	

echo "<script>alert('Data berhasil tersimpan'); location.href='?page=home_siswa';</script";

}
?>