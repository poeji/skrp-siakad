<?php
if(isset($_POST['submit']) && $_POST['submit'] == "submit") {

//cek data sudah ada apa belum
$cek = mysql_num_rows(mysql_query("select id_belajar from kurikulum where nip = '".$_POST['nip']."' and kode_pelajaran = '".$_POST['kode_pelajaran']."' and thn_ajaran = '".$_POST['tahun_ajaran']."' and kode_kelas = '".$_POST['kode_kelas']."'"));

if($cek > 0) {
	echo "<script>alert('Data sudah ada, silahkan pilih yang lainnya'); location.href='?page=kurikulum';</script";
} else {

$Q = mysql_query("INSERT INTO `kurikulum`
            (`tgl_input`,
             `nip`,
             `thn_ajaran`,
             `kode_pelajaran`,
             `kode_kelas`)
VALUES (NOW(),
        '".$_POST['nip']."',
        '".$_POST['tahun_ajaran']."',
        '".$_POST['kode_pelajaran']."',
        '".$_POST['kode_kelas']."')");	


echo "<script>alert('Data berhasil tersimpan'); location.href='?page=kurikulum';</script";
}
}
?>