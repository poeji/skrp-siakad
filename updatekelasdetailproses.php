<?php
if(isset($_POST['submit']) && $_POST['submit'] == "submit") {

foreach($_POST['nis'] as $i => $nis) 
{ 
   $nis = mysql_real_escape_string($nis);
 
  $sql = "UPDATE `siswa`
SET 
  `kode_kelas` = '$_POST[kode_kelas]',
  `tahun` = '$_POST[tahun_ajaran]'
  
WHERE `nis` = '$nis'";
  
  //echo $sql."<hr>";
  $result = mysql_query($sql);
} 

echo "<script>alert('Data berhasil tersimpan'); location.href='?page=updatekelas';</script";

}
?>