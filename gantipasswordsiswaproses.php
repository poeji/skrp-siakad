<?php
if(isset($_POST['submit']) && $_POST['submit'] == "Update") {

 
  $sql = "UPDATE `siswa`
SET 
  `password` = '".md5($_POST['password'])."'
  
WHERE `nis` = '".$_SESSION['userid']."'";
  
  //echo $sql."<hr>";
  $result = mysql_query($sql);

echo "<script>alert('Data berhasil tersimpan'); location.href='?page=gantipasswordsiswa';</script";

}
?>