<?php
if(isset($_POST['submit']) && $_POST['submit'] == "submit") {


 list($tgl,$bln,$thn)=explode("/",$_POST['tanggal_lahir']);
$Q = mysql_query("INSERT INTO `siswa`
            (`nis`,
             `nama_siswa`,
             `tempat_lahir`,
             `tanggal_lahir`,
             `alamat`,
             `agama`,
             `jenis_kelamin`,
             `nama_orangtua`,
             `telepon_orangtua`,
             `password`,
			 kode_kelas,
			 tahun,
             `status_siswa`)
VALUES ('$_POST[nis]',
        '$_POST[nama_siswa]',
        '$_POST[tempat_lahir]',
        '$thn-$bln-$tgl',
        '$_POST[alamat]',
        '$_POST[agama]',
        '$_POST[jenis_kelamin]',
        '$_POST[nama_orangtua]',
        '$_POST[telepon_orangtua]',
        '".md5($_POST['password'])."',
		'$_POST[kode_kelas]',
		'$_POST[tahun]',
        '1')");	

echo "<script>alert('Data berhasil tersimpan'); location.href='?page=siswa';</script";

}
?>