<?php
if(isset($_POST['submit']) && $_POST['submit'] == "submit") {

$q = mysql_query("UPDATE `dbssiak`.`nilai_sikap`
SET
  `tgl_input` = NOW(),
  `tahun_ajaran` = '".$_POST['tahun_ajaran']."',
  `nip` = '".$_POST['nip']."',
  `nis` = '".$_POST['nis']."',
  `kode_pelajaran` = '".$_POST['kode_pelajaran']."',
  `kode_kelas` = '".$_POST['kode_kelas']."',
  `observasi` = '".$_POST['ob']."',
  `antarteman` = '".$_POST['ant']."',
  `dirisendiri` = '".$_POST['ds']."',
  `jurnalguru` = '".$_POST['jg']."'
WHERE `id_nilaisikap` = '".$_POST['id']."'");

echo "<script>alert('Data berhasil tersimpan'); location.href='?page=nilaisikapedit&id=$_POST[id]';</script";

} 
?>