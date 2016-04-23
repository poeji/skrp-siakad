<?php
session_start();
//error_reporting(0);
if(isset($_SESSION["userid"]) && $_SESSION["userid"] != "") {
include "config/koneksi.php";

$ds = mysql_fetch_array(mysql_query("select * from siswa where nis = '".$_GET['nis']."'"));
$dk = mysql_fetch_array(mysql_query("select * from kelas where kode_kelas = '".$ds['kode_kelas']."'"));

function Terbilang($x)
{
  $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
  if ($x < 12)
    return " " . $abil[$x];
  elseif ($x < 20)
    return Terbilang($x - 10) . "belas";
  elseif ($x < 100)
    return Terbilang($x / 10) . " puluh" . Terbilang($x % 10);
  elseif ($x < 200)
    return " seratus" . Terbilang($x - 100);
  elseif ($x < 1000)
    return Terbilang($x / 100) . " ratus" . Terbilang($x % 100);
  elseif ($x < 2000)
    return " seribu" . Terbilang($x - 1000);
  elseif ($x < 1000000)
    return Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000);
  elseif ($x < 1000000000)
    return Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000);
}
?>
<title>Raport <?php echo $ds['nama_siswa']; ?></title>
<body  onLoad="window.print();">
<table width="100%" border="0"  style="background-image:url(images/bg.png); background-repeat:no-repeat; background-position: center; padding-bottom:170px">
  <tr>
    <td><img src="images/kopsurat.jpg" width="600" height="100"></td>
  </tr>
  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td width="20%">Nama Sekolah</td>
        <td width="1%">:</td>
        <td width="42%"><strong>SMA NEGRI 66</strong></td>
        <td width="1%">&nbsp;</td>
        <td width="17%">Kelas</td>
        <td width="1%">:</td>
        <td width="18%"><strong><?php echo $dk['nama_kelas']; ?></strong></td>
      </tr>
      <tr>
        <td>Alamat Sekolah</td>
        <td>:</td>
        <td><strong>JL. BANGO III PONDOK LABU</strong></td>
        <td>&nbsp;</td>
        <td>Tahun Pelajaran</td>
        <td>:</td>
        <td><strong><?php echo $ds['tahun']; ?></strong></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>Semester</td>
        <td>:</td>
        <td><strong><?php if($_GET['semester']==1) { echo "Ganjil"; } else { echo "Genap"; } ?></strong></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td><strong><?php echo $ds['nama_siswa']; ?></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Nomor Induk/NISN</td>
        <td>:</td>
        <td><strong><?php echo $ds['nis']; ?></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>B. Pengetahuan dan Keterampilan</strong></td>
  </tr>
  <tr>
    <td><table width="100%" style="	border-collapse: collapse; 	border: 1px solid black;" border="1">
      <tr>
        <td rowspan="2"><div align="center">NO.</div></td>
        <td rowspan="2"><div align="center">MATA PELAJARAN</div></td>
        <td rowspan="2"><div align="center">KKM</div></td>
        <td colspan="2"><div align="center">Pengetahuan</div>          <div align="center"></div></td>
        <td colspan="2"><div align="center">Keterampilan</div>          <div align="center"></div></td>
        </tr>
      <tr>
        <td><div align="center">Angka</div></td>
        <td><div align="center">Huruf</div></td>
        <td><div align="center">Angka</div></td>
        <td><div align="center">Huruf</div></td>
      </tr>
      <?php
	  $no = 1;
	  $npeng = mysql_query("SELECT k.`id_belajar`, k.`kode_pelajaran`, p.`nama_pelajaran`, k.`thn_ajaran`
FROM `kurikulum` k 
LEFT JOIN `pelajaran` p ON p.`kode_pelajaran` = k.`kode_pelajaran`
WHERE k.kode_kelas = '".$ds['kode_kelas']."' AND k.thn_ajaran = '".$ds['tahun']."'");
while($d = mysql_fetch_array($npeng)) {

//nilai pengetahuan
$dip = mysql_fetch_array(mysql_query("SELECT * FROM `nilai_pengetahuan` WHERE nis = '".$_SESSION['userid']."' AND kode_pelajaran = '".$d['kode_pelajaran']."' AND tahun_ajaran = '".$ds['tahun']."' AND semester = '".$_GET['semester']."'"));

//nilai keterampilan
$dk = mysql_fetch_array(mysql_query("SELECT * FROM `nilai_keterampilan` WHERE nis = '".$_SESSION['userid']."' AND kode_pelajaran = '".$d['kode_pelajaran']."' AND tahun_ajaran = '".$ds['tahun']."' AND semester = '".$_GET['semester']."'"));

//nilai remed
$dr = mysql_fetch_array(mysql_query("SELECT * FROM `nilai_remed` WHERE nis = '".$_SESSION['userid']."' AND kode_pelajaran = '".$d['kode_pelajaran']."' AND tahun_ajaran = '".$ds['tahun']."' AND semester = '".$_GET['semester']."'"));

//nilai rata-rata
$nilaipeng = $dip['uh1'] + $dip['uh2'] + $dip['uh3'] + $dip['uh4'] + $dip['uts'] + $dip['uas'];
$nilairataratapeng = $nilaipeng / 6;
$nilairataratapeng2 = ceil($nilairataratapeng);

$nilaiket = $dk['np1'] + $dk['np2'] + $dk['np3'] + $dk['np4'];
$nilairatarataket = $nilaiket / 4;
$nilairatarataket2 = ceil($nilairatarataket);
  ?>
      <tr>
        <td><div align="center"><?php echo $no; ?></div></td>
        <td><div align="center"><?php echo $d['nama_pelajaran']; ?></div></td>
        <td><div align="center">75</div></td>
        <td><div align="center"><?php echo $nilairataratapeng2; ?></div></td>
        <td><div align="center"><?php echo ucwords(Terbilang($nilairataratapeng2)); ?></div></td>
        <td><div align="center"><?php echo $nilairatarataket2; ?></div></td>
        <td><div align="center"><?php echo ucwords(Terbilang($nilairatarataket2)); ?></div></td>
      </tr>
      <?php $no++; } ?>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<?php } ?>
</body>