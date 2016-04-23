<?php
/*
 [kode_pelajaran] => A021
    [kode_kelas] => AK01
    [nip] => 7538757658300023
    [tahun_ajaran] => 2015
    [submit] => submit
    [nis] => Array
        (
            [0] => 2665
            [1] => 2681
            [2] => 2689
            [3] => 2691
            [4] => 2711
        )
*/
if(isset($_POST['submit']) && $_POST['submit'] == "submit") {

$kelas = substr($_POST['kode_kelas'],2);
//echo $kelas;
//exit();

if($kelas==01 || $kelas==11 || $kelas==12 || $kelas==13 || $kelas==14) {
	$kdkelas = 1;
} elseif($kelas==02 || $kelas==21 || $kelas==22 || $kelas==23 || $kelas==24) {
	$kdkelas = 2;
} elseif($kelas==03 || $kelas==31 || $kelas==32 || $kelas==33 || $kelas==34) {
	$kdkelas = 3;
}

foreach($_POST['nis'] as $i => $nis) 
{ 
$Q = mysql_query("INSERT INTO `belajar`
            (`tgl_input`,
             `nip`,
             `nis`,
             `thn_ajaran`,
             `kode_pelajaran`,
             `kode_kelas`,
             `kelas`)
VALUES (NOW(),
        '".$_POST['nip']."',
        '".$nis."',
        '".$_POST['tahun_ajaran']."',
        '".$_POST['kode_pelajaran']."',
        '".$_POST['kode_kelas']."',
        '$kdkelas')");	
}

echo "<script>alert('Data berhasil tersimpan'); location.href='?page=kurikulum';</script";

}
?>