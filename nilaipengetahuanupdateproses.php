<?php
if(isset($_POST['submit']) && $_POST['submit'] == "submit") {

$q = mysql_query("UPDATE `nilai_pengetahuan`
SET 
  `tgl_input` = NOW(),
  `tahun_ajaran` = '".$_POST['tahun_ajaran']."',
  `nip` = '".$_POST['nip']."',
  `nis` = '".$_POST['nis']."',
  `kode_pelajaran` = '".$_POST['kode_pelajaran']."',
  `kode_kelas` = '".$_POST['kode_kelas']."',
  `uh1` = '".$_POST['uh1']."',
  `uh2` = '".$_POST['uh2']."',
  `uh3` = '".$_POST['uh3']."',
  `uh4` = '".$_POST['uh4']."',
  `uh5` = '".$_POST['uh5']."',
  `uts` = '".$_POST['uts']."',
  `uas` = '".$_POST['uas']."'
WHERE `id_nilaipengetahuan` = '".$_POST['id']."'");

echo "<script>alert('Data berhasil tersimpan'); location.href='?page=nilaipengetahuanedit&id=$_POST[id]';</script";

} 
?>