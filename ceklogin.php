<?php
session_start();
$sesid = session_id();

if(isset($_POST['userid']) && $_POST['userid'] != "" && isset($_POST['password']) && $_POST['password'] == "") {
	echo "<script>alert('Anda belum mengisikan Password'); location.href='index.php';</script>";
} elseif(isset($_POST['userid']) && $_POST['userid'] == "" && isset($_POST['password']) && $_POST['password'] != "") {
	echo "<script>alert('anda belum mengisikan User ID'); location.href='index.php';</script>";
} elseif(isset($_POST['userid']) && $_POST['userid'] == "" && isset($_POST['password']) && $_POST['password'] == "") {
	echo "<script>alert('anda belum mengisikan User ID dan Password'); location.href='index.php';</script>";
} elseif(isset($_POST['userid']) && $_POST['userid'] != "" && isset($_POST['password']) && $_POST['password'] != "") 
	{

if(isset($_POST['userid']) && $_POST['userid'] != "" && isset($_POST['password']) && $_POST['password'] != "") 
	{
			
			include "config/koneksi.php";
			//cek login
			
			//cek level sebagai apa
			if($_POST['akses']=="admin") {
				$q = mysql_query("select * from admin where userid = '".$_POST['userid']."' and password = '".md5($_POST['password'])."'");
			} elseif($_POST['akses']=="guru") {
				$q = mysql_query("select * from guru where nip = '".$_POST['userid']."' and password = '".md5($_POST['password'])."'");
			} elseif($_POST['akses']=="siswa") {
				$q = mysql_query("select * from siswa where nis = '".$_POST['userid']."' and password = '".md5($_POST['password'])."'");
			} else {
				echo "<script>alert('Anda belum memilih akses sebagai apa, silahkan ulangi kembali'); location.href='index.php';</script>";
			}
			
			//echo "select * from admin where userid = '".$_POST['userid']."' and password = '".md5($_POST['password'])."'";
			//exit();
			$ceknum = mysql_num_rows($q);
			$qckl = mysql_fetch_array($q);
			if($ceknum > 0) {
							
				//tambahin session
				$_SESSION["userid"] = $_POST['userid'];
				$_SESSION["level"] = $_POST['akses'];
				
				if($_SESSION['level']=="admin") {
				$q = mysql_fetch_array(mysql_query("select * from admin where userid = '".$_SESSION['userid']."'"));
				$_SESSION['nama'] = $q['namaadmin'];
				$_SESSION['alamat'] = "";
			} elseif($_SESSION['level']=="guru") {
				$q = mysql_fetch_array(mysql_query("select * from guru where nip = '".$_SESSION['userid']."'"));
				$_SESSION['nama'] = $q['nama_guru'];
				$_SESSION['alamat'] = $q['alamat'];
			} elseif($_SESSION['level']=="siswa") {
				$q = mysql_fetch_array(mysql_query("select * from siswa where nis = '".$_SESSION['userid']."'"));
				$_SESSION['nama'] = $q['nama_siswa'];
				$_SESSION['alamat'] = $q['alamat'];
				$_SESSION['kode_kelas'] = $q['kode_kelas'];
}

				echo "<script>alert('Login Berhasil'); location.href='media.php';</script>";				
				
			} else {
				//login gagal
				echo "<script>alert('Login Gagal'); location.href='index.php';</script>";
			
			}
			
}
			}
?>