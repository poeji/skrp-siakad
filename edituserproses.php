<?php
if(isset($_POST['submit']) && $_POST['submit'] == "Update") {

if($_POST['akses']=="guru") {
$q = mysql_query("UPDATE `guru`
SET 
  `password` = '".md5($_POST['password'])."'
WHERE `nip` = '$_POST[userid]'");
} elseif($_POST['akses']=="siswa") {
$q = mysql_query("UPDATE `siswa`
SET 
  `password` = '".md5($_POST['password'])."'
WHERE `nis` = '$_POST[userid]'");
} elseif($_POST['akses']=="admin") {
$q = mysql_query("UPDATE `admin`
SET 
  `password` = '".md5($_POST['password'])."'
WHERE `userid` = '$_POST[userid]'");
}

if(isset($_POST['useredit']) && $_POST['useredit']== 1) {
	echo "<script>alert('Data berhasil tersimpan'); location.href='?page=user';</script>";
} else {
	echo "<script>alert('Data berhasil tersimpan'); location.href='?page=edituser';</script>";
}

}
?>