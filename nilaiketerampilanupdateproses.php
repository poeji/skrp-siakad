<?php
if(isset($_POST['submit']) && $_POST['submit'] == "submit") {

$q = mysql_query("UPDATE `nilai_keterampilan`
SET 
  `tgl_input` = NOW(),
  `tahun_ajaran` = '".$_POST['tahun_ajaran']."',
  `nip` = '".$_POST['nip']."',
  `nis` = '".$_POST['nis']."',
  `kode_pelajaran` = '".$_POST['kode_pelajaran']."',
  `kode_kelas` = '".$_POST['kode_kelas']."',
  `np1` = '".$_POST['np1']."',
  `np2` = '".$_POST['np2']."',
  `np3` = '".$_POST['np3']."',
  `np4` = '".$_POST['np4']."',
  `np5` = '".$_POST['np5']."',
  `nfolio` = '".$_POST['nfolio']."',
  `nproyek` = '".$_POST['nproyek']."'
WHERE `id_nilaiketerampilan` = '".$_POST['id']."'");

echo "<script>alert('Data berhasil tersimpan'); location.href='?page=nilaiketerampilanedit&id=$_POST[id]';</script";

} 
?>