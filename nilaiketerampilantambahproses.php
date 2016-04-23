<?php
if(isset($_POST['submit']) && $_POST['submit'] == "submit") {

//hapus data lama
$del = mysql_query("DELETE FROM `nilai_keterampilan` WHERE nip = '".$_POST['nip']."' AND kode_pelajaran = '".$_POST['kode_pelajaran']."' 
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
  $np1 = mysql_real_escape_string($_POST['np1'][$i]);
  $np2 = mysql_real_escape_string($_POST['np2'][$i]);
  $np3 = mysql_real_escape_string($_POST['np3'][$i]);
  $np4 = mysql_real_escape_string($_POST['np4'][$i]);
  // Add to database
  $sql = "INSERT INTO `nilai_keterampilan`
            (`tgl_input`,
             `tahun_ajaran`,
             `nip`,
             `nis`,
             `kode_pelajaran`,
             `kode_kelas`,
             `np1`,
             `np2`,
             `np3`,
             `np4`,
			 semester)
VALUES (NOW(),
        '$tahun_ajaran',
        '$nip',
        '$nis',
        '$kode_pelajaran',
        '$kode_kelas',
        '$np1',
        '$np2',
        '$np3',
        '$np4',
		'$semester')";
  
  //echo $sql."<hr>";
  $result = mysql_query($sql);
} 

echo "<script>alert('Data berhasil tersimpan'); location.href='?page=nilaiketerampilan';</script";

}
?>