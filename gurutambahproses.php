<?php
if(isset($_POST['submit']) && $_POST['submit'] == "submit") {

 list($tgl,$bln,$thn)=explode("/",$_POST['tanggal_lahir']);
$Q = mysql_query("INSERT INTO `guru`
            (`nip`,
             `nama_guru`,
             `tempat_lahir`,
             `tgl_lahir`,
             `jenis_kelamin`,
             `alamat`,
             `agama`,
             `st_menikah`,
             `tlp_rmh`,
             `hp`,
             `password`,
             `status_guru`)
VALUES ('$_POST[nip]',
        '$_POST[nama_guru]',
        '$_POST[tempat_lahir]',
        '$thn-$bln-$tgl',
        '$_POST[jenis_kelamin]',
        '$_POST[alamat]',
        '$_POST[agama]',
        '$_POST[st_menikah]',
        '$_POST[tlp_rmh]',
        '$_POST[hp]',
        '".md5($_POST['password'])."',
        '1')");	

echo "<script>alert('Data berhasil tersimpan'); location.href='?page=guru';</script";

}
?>