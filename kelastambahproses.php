<?php
if(isset($_POST['submit']) && $_POST['submit'] == "submit") {

$q = mysql_query("INSERT INTO `kelas`
            (`kode_kelas`,
             `nama_kelas`)
VALUES ('$_POST[kode_kelas]',
        '$_POST[nama_kelas]')");


echo "<script>alert('Data berhasil tersimpan'); location.href='?page=kelas';</script";

}
?>