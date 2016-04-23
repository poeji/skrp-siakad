<?php 
$dsis = mysql_fetch_array(mysql_query("SELECT s.*, DATE_FORMAT(tanggal_lahir, '%d %M %Y') AS tgl FROM `siswa` s  where s.nis = '".$_SESSION['userid']."'"));
?>
<br />
<table width="100%" border="0">
  <tr>
    <td width="15%">NIS</td>
    <td width="2%">:</td>
    <td width="83%"><?php echo $dsis['nis']; ?></td>
  </tr>
  <tr>
    <td>Nama Siswa</td>
    <td>:</td>
    <td><strong><?php echo $dsis['nama_siswa']; ?></strong></td>
  </tr>
  <tr>
    <td>Tempat / Tanggal Lahir</td>
    <td>:</td>
    <td><?php echo $dsis['tempat_lahir']; ?> / <?php echo $dsis['tgl']; ?></td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td>:</td>
    <td><?php echo $dsis['alamat']; ?></td>
  </tr>
  <tr>
    <td>Agama</td>
    <td>:</td>
    <td><?php echo $dsis['agama']; ?></td>
  </tr>
  <tr>
    <td>Jenis Kelamin</td>
    <td>:</td>
    <td><?php if($dsis['jenis_kelamin']=="L") { echo "Pria"; } else { echo "Wanita"; } ?></td>
  </tr>
  <tr>
    <td>Nama Orang Tua</td>
    <td>:</td>
    <td><?php echo $dsis['nama_orangtua']; ?></td>
  </tr>
  <tr>
    <td>Tlp. Orang Tua</td>
    <td>:</td>
    <td><?php echo $dsis['telepon_orangtua']; ?></td>
  </tr>
  <tr>
    <td colspan="3"><button type="button" class="btn" onclick="location.href='?page=datasiswa'">Edit Data</button></td>
  </tr>
</table>
