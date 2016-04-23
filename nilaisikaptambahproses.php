<?php
if(isset($_POST['submit']) && $_POST['submit'] == "submit") {

foreach($_POST['nis'] as $i => $nis) 
{ 
  // Get values from post.
  $kode_pelajaran = $_POST['kode_pelajaran'];
  $kode_kelas = $_POST['kode_kelas'];
  $tahun_ajaran = $_POST['tahun_ajaran'];
  $nip = $_POST['nip'];
  $nis = mysql_real_escape_string($nis);
  $ob = mysql_real_escape_string($_POST['ob'][$i]);
  $ant = mysql_real_escape_string($_POST['ant'][$i]);
  $ds = mysql_real_escape_string($_POST['ds'][$i]);
  $jg = mysql_real_escape_string($_POST['jg'][$i]);

  // Add to database
  $sql = "INSERT INTO `nilai_sikap`
            (`tgl_input`,
             `tahun_ajaran`,
             `nip`,
             `nis`,
             `kode_pelajaran`,
             `kode_kelas`,
             `observasi`,
             `antarteman`,
             `dirisendiri`,
             `jurnalguru`)
VALUES (NOW(),
        '$tahun_ajaran',
        '$nip',
        '$nis',
        '$kode_pelajaran',
        '$kode_kelas',
        '$ob',
        '$ant',
        '$ds',
        '$jg')";
  
  //echo $sql."<hr>";
  $result = mysql_query($sql);
} 

echo "<script>alert('Data berhasil tersimpan'); location.href='?page=nilaisikap';</script";

}
?>