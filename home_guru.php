<?php 
$dsis = mysql_fetch_array(mysql_query("SELECT s.*, DATE_FORMAT(tgl_lahir, '%d %M %Y') AS tgl FROM `guru` s  where s.nip = '".$_SESSION['userid']."'"));
?>
<br />
<table width="100%" border="0">
  <tr>
    <td width="15%">NIS</td>
    <td width="2%">:</td>
    <td width="83%"><?php echo $dsis['nip']; ?></td>
  </tr>
  <tr>
    <td>Nama Guru</td>
    <td>:</td>
    <td><strong><?php echo $dsis['nama_guru']; ?></strong></td>
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
    <td>Status Menikah</td>
    <td>:</td>
    <td><?php echo $dsis['st_menikah']; ?></td>
  </tr>
  <tr>
    <td>Telepon Rumah</td>
    <td>:</td>
    <td><?php echo $dsis['tlp_rmh']; ?></td>
  </tr>
  <tr>
    <td>HP</td>
    <td>:</td>
    <td><?php echo $dsis['hp']; ?></td>
  </tr>
  <tr>
    <td colspan="3"><button type="button" class="btn" onclick="location.href='?page=dataguru'">Edit Data</button></td>
  </tr>
</table>
