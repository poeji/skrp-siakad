<?php
if(isset($_POST['submit']) && $_POST['submit'] == "submit") {

//hapus data lama
$del = mysql_query("DELETE FROM `nilai_pengetahuan` WHERE nip = '".$_POST['nip']."' AND kode_pelajaran = '".$_POST['kode_pelajaran']."' 
  AND kode_kelas = '".$_POST['kode_kelas']."' AND tahun_ajaran = '".$_POST['tahun_ajaran']."' AND semester = '".$_POST['semester']."'");

foreach($_POST['nis'] as $i => $nis) 
{ 
  // Get values from post.
  $kode_pelajaran = $_POST['kode_pelajaran'];
  $kode_kelas = $_POST['kode_kelas'];
  $tahun_ajaran = $_POST['tahun_ajaran'];
  $nip = $_POST['nip'];
  $semester = $_POST['semester'];
  $nis = mysql_real_escape_string($nis);
  $uh1 = mysql_real_escape_string($_POST['uh1'][$i]);
  $uh2 = mysql_real_escape_string($_POST['uh2'][$i]);
  $uh3 = mysql_real_escape_string($_POST['uh3'][$i]);
  $uh4 = mysql_real_escape_string($_POST['uh4'][$i]);
  $uts = mysql_real_escape_string($_POST['uts'][$i]);
  $uas = mysql_real_escape_string($_POST['uas'][$i]);

  // Add to database
  $sql = "INSERT INTO `nilai_pengetahuan`
            (`tgl_input`,
             `tahun_ajaran`,
             `nip`,
             `nis`,
             `kode_pelajaran`,
             `kode_kelas`,
             `uh1`,
             `uh2`,
             `uh3`,
             `uh4`,
             `uts`,
             `uas`,
			 semester)
VALUES (NOW(),
        '$tahun_ajaran',
        '$nip',
        '$nis',
        '$kode_pelajaran',
        '$kode_kelas',
        '$uh1',
        '$uh2',
        '$uh3',
        '$uh4',
        '$uts',
        '$uas',
		'$semester')";
  
  //echo $sql."<hr>";
  $result = mysql_query($sql);
} 

echo "<script>alert('Data berhasil tersimpan'); location.href='?page=nilaipengetahuandata';</script";

}
?>