<?php
if(isset($_POST['submit']) && $_POST['submit'] == "submit") {

$q = mysql_query("INSERT INTO `belajar`
            (`tgl_input`, `nip`, `thn_ajaran`, `kode_pelajaran`, `kode_kelas`)
VALUES (NOW(), '$_POST[nip]', '$_POST[tahun_ajaran]', '$_POST[kode_pelajaran]', '$_POST[kode_kelas]')");

echo "<script>alert('Data berhasil tersimpan'); location.href='?page=kurikulum';</script";

}
?>