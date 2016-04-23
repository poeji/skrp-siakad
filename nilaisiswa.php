<?php
session_start();
error_reporting(0);
if(isset($_SESSION["userid"]) && $_SESSION["userid"] != "") {
include "config/koneksi.php";

$ds = mysql_fetch_array(mysql_query("SELECT nis, nama_siswa FROM `siswa` WHERE nis = '".$_GET['id']."'"));
$dk = mysql_fetch_array(mysql_query("SELECT k.`nama_kelas`, b.thn_ajaran, k.kode_kelas FROM `belajar` b LEFT JOIN `kelas` k ON k.`kode_kelas` = b.`kode_kelas` WHERE nis = '".$_GET['id']."' GROUP BY b.`kode_kelas`"));
//$totalsiswakelas = mysql_num_rows(mysql_query("SELECT k.`nama_kelas` FROM `belajar` b LEFT JOIN `kelas` k ON k.`kode_kelas` = b.`kode_kelas` GROUP BY b.`kode_kelas`"));
?>
<title>Nilai Rapor <?php echo $ds['nama_siswa']; ?> [<?php echo $ds['nis']; ?>] - <?php echo $dk['nama_kelas']; ?></title>
<table width="100%" border="0">
  <tr>
    <td align="center"><h2>NILAI RAPOR</h2></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="50%" border="0">
      <tr>
        <td width="24%">Nama Siswa</td>
        <td width="3%">:</td>
        <td width="73%"><strong><?php echo $ds['nama_siswa']; ?></strong></td>
      </tr>
      <tr>
        <td>NIS</td>
        <td>:</td>
        <td><?php echo $ds['nis']; ?></td>
      </tr>
      <tr>
        <td>Kelas</td>
        <td>:</td>
        <td><?php echo $dk['nama_kelas']; ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="1" style="border-collapse:collapse; border: 1px solid #000;display:table;">
      <tr>
        <td colspan="2" rowspan="2" align="center" valign="middle" bgcolor="#CCCCCC">Program Pendidikan dan Pelatihan</td>
        <td colspan="2" bgcolor="#CCCCCC"><div align="center"><strong>Nilai Pengetahuan</strong></div></td>
        <td colspan="2" bgcolor="#CCCCCC"><div align="center"><strong>Nilai Keterampilan</strong></div></td>
        <td colspan="2" bgcolor="#CCCCCC"><div align="center"><strong>Nilai Sikap</strong></div></td>
        </tr>
      <tr>
        <td width="7%" bgcolor="#CCCCCC"><div align="center">Angka</div></td>
        <td width="7%" bgcolor="#CCCCCC"><div align="center">Huruf</div></td>
        <td width="7%" bgcolor="#CCCCCC"><div align="center">Angka</div></td>
        <td width="7%" bgcolor="#CCCCCC"><div align="center">Huruf</div></td>
        <td width="7%" bgcolor="#CCCCCC"><div align="center">Angka</div></td>
        <td width="9%" bgcolor="#CCCCCC"><div align="center">Huruf</div></td>
      </tr>
      <?php
	  $no = 1;
	  $a = 0;
	  $nilairatarata1 = 0;
	  $nilairatarata2 = 0;
	  $nilairatarata3 = 0;
	  $qbl = mysql_query("SELECT b.`id_belajar`, p.`nama_pelajaran`, b.thn_ajaran, b.kode_pelajaran, b.nip, b.kode_kelas FROM `belajar` b LEFT JOIN `pelajaran` p ON p.`kode_pelajaran` = b.`kode_pelajaran` WHERE nis = '".$_GET['id']."'");
	  while($dbl = mysql_fetch_array($qbl)) {
	  
	  //nilai angka pengetahuan ============================================================================================
						  		$dnp = mysql_fetch_array(mysql_query("SELECT SUM(uh1+uh2+uh3+uh4+uh5) AS total_uh, uts, uas FROM nilai_pengetahuan 
						  			WHERE nis = '".$_GET['id']."' AND tahun_ajaran = '".$dbl['thn_ajaran']."'  AND nip = '".$dbl['nip']."' AND kode_pelajaran = '".$dbl['kode_pelajaran']."' AND kode_kelas = '".$dbl['kode_kelas']."'"));
						  		$nilaiproses = $dnp['total_uh'] / 5;
						  		$nilaiangka1 = $nilaiproses + $dnp['uts'];
						  		$nilaiangka2 = $dnp['uas']*3;
						  		$nilaiangka3 = $nilaiangka1 + $nilaiangka2;
						  		$nilaiangka4 = $nilaiangka3/5;
								
								//nilai predikat
						  		if($nilaiangka4 > 95) {
						  			$predikat = "A";
						  		} elseif($nilaiangka4 > 90) {
						  			$predikat = "A-";
						  		} elseif($nilaiangka4 > 85) {
						  			$predikat = "B+";
						  		} elseif($nilaiangka4 > 80) {
						  			$predikat = "B";
						  		} elseif($nilaiangka4 > 74) {
						  			$predikat = "B-";
						  		} elseif($nilaiangka4 > 69) {
						  			$predikat = "C+";
						  		} elseif($nilaiangka4 > 64) {
						  			$predikat = "C";
						  		} elseif($nilaiangka4 > 59) {
						  			$predikat = "C-";
						  		} elseif($nilaiangka4 > 54) {
						  			$predikat = "D+";
						  		} else {
						  			$predikat = "D";
						  		}
 		
		//nilai keterampilan =======================================================================
						  		$dnp2 = mysql_fetch_array(mysql_query("SELECT SUM(np1+np2+np3+np4+np5) AS total_uh, nfolio, nproyek  FROM nilai_keterampilan 
						  			WHERE nis = '".$_GET['id']."' AND tahun_ajaran = '".$dbl['thn_ajaran']."'  AND nip = '".$dbl['nip']."' AND kode_pelajaran = '".$dbl['kode_pelajaran']."' AND kode_kelas = '".$dbl['kode_kelas']."'"));
						  		$nilaiproses2 = $dnp2['total_uh'] / 5;

						  		//nilai angka
						  		//$nilaiangka1 = ($nilaiproses + $d['uts']+($d['uas']*3))/5;
						  		$nilaiangka12 = $nilaiproses2 + $dnp2['nfolio'] + $dnp2['nproyek'];
						  		$nilaiangka22 = $nilaiangka12/3;
								
								//nilai predikat
						  		if($nilaiangka22 > 95) {
						  			$predikat2 = "A";
						  		} elseif($nilaiangka22 > 90) {
						  			$predikat2 = "A-";
						  		} elseif($nilaiangka22 > 85) {
						  			$predikat2 = "B+";
						  		} elseif($nilaiangka22 > 80) {
						  			$predikat2 = "B";
						  		} elseif($nilaiangka22 > 74) {
						  			$predikat2 = "B-";
						  		} elseif($nilaiangka22 > 69) {
						  			$predikat2 = "C+";
						  		} elseif($nilaiangka22 > 64) {
						  			$predikat2 = "C";
						  		} elseif($nilaiangka22 > 59) {
						  			$predikat2 = "C-";
						  		} elseif($nilaiangka22 > 54) {
						  			$predikat2 = "D+";
						  		} else {
						  			$predikat2 = "D";
						  		}

//nilai sikap ===================================================================================================================
						  		$dnp3 = mysql_fetch_array(mysql_query("SELECT SUM(observasi+antarteman+dirisendiri+jurnalguru) AS total_uh FROM nilai_sikap 
						  			WHERE nis = '".$_GET['id']."' AND tahun_ajaran = '".$dbl['thn_ajaran']."'  AND nip = '".$dbl['nip']."' AND kode_pelajaran = '".$dbl['kode_pelajaran']."' AND kode_kelas = '".$dbl['kode_kelas']."'"));

						  		//nilai angka
								$nilaiangka3 = $dnp3['total_uh'] / 4;
						  		
						  		//nilai predikat
						  		if($nilaiangka3 > 90) {
						  			$predikat3 = "SB";
						  		} elseif($nilaiangka3 > 70) {
						  			$predikat3 = "B";
						  		} elseif($nilaiangka3 > 60) {
						  			$predikat3 = "C";
						  		} else {
									$predikat3 = "K";
								}
	  ?>
      <tr>
        <td width="2%"><div align="center"><?php echo $no; ?></div></td>
        <td width="54%" style="font-size:13px">&nbsp;<?php echo $dbl['nama_pelajaran']; ?></td>
        <td><div align="center">
          <?php  print number_format($nilaiangka4,2);  ?>
        </div></td>
        <td><div align="center"><?php echo $predikat; ?></div></td>
        <td><div align="center"><?php  print number_format($nilaiangka22,2);  ?></div></td>
        <td><div align="center"><?php echo $predikat2; ?></div></td>
        <td><div align="center"><?php  print number_format($nilaiangka3,2);  ?></div></td>
        <td><div align="center"><?php echo $predikat3; ?></div></td>
      </tr>
      <?php 
	  $nilairatarata1 += $nilaiangka4; 
	  $nilairatarata2 += $nilaiangka22;
	  $nilairatarata3 += $nilaiangka3;
	  $no++; $a++; } ?>
      <tr>
        <td colspan="2">Nilai Rata-Rata</td>
        <td colspan="6">
        <?php 
		$nilairatarata4 = $nilairatarata1 + $nilairatarata2 + $nilairatarata3; 
		$nilairatarata5 = $nilairatarata4 / $a;
		//echo "N1:".$nilairatarata1." | N2:".$nilairatarata2." | N3:".$nilairatarata3." | N4:".$nilairatarata4." | N5:".$nilairatarata5." | No:".$a;
		print number_format($nilairatarata5,2); ?>        </td>
        </tr>
      <tr>
        <td colspan="2">Peringkat</td>
        <?php
		list($nilai,$koma)=explode(".",$nilairatarata5);
		$cekdgt = strlen($nilai);
		
		if($cekdgt==1) {
			$nilairatarata6 = "0".$nilairatarata5;
		} else {
			$nilairatarata6 = $nilairatarata5;
		}
		//update nilai rapor
		//cek sudah ada datanya atau belum
$qcn = mysql_query("select * from rapor where nis = '".$_GET['id']."' and kode_kelas = '".$dk['kode_kelas']."' and thn_ajaran = '".$dk['thn_ajaran']."'");
$dcn = mysql_fetch_array($qcn);
		//cek nilainya ada atau tidak
		if(isset($dcn['id_rapor']) && $dcn['id_rapor'] != "") { 
			if($dcn['nilai'] != $nilairatarata6) {
				//jika nilai tidak sama maka update nilai yang terbaru
				mysql_query("UPDATE `rapor` SET `nilai` = '$nilairatarata6' WHERE `id_rapor` = '".$dcn['id_rapor']."'");
			}
		} else {
				mysql_query("INSERT INTO `rapor` (`kode_kelas`,`thn_ajaran`,`nis`,`nilai`) VALUES ('".$dk['kode_kelas']."','".$dk['thn_ajaran']."','".$_GET['id']."','$nilairatarata6')");
		}
		
		$qrapor = mysql_query("SELECT nis, nilai, FIND_IN_SET( nilai, (    
SELECT GROUP_CONCAT( nilai
ORDER BY nilai DESC ) 
FROM rapor WHERE kode_kelas = '".$dk['kode_kelas']."' and thn_ajaran = '".$dk['thn_ajaran']."' )
) AS rangking
FROM rapor WHERE nis = '".$_GET['id']."'");

				$draport = mysql_fetch_array($qrapor);
				$totalsiswakelasnya = mysql_num_rows(mysql_query("select id_rapor from rapor where kode_kelas = '".$dk['kode_kelas']."' and thn_ajaran = '".$dk['thn_ajaran']."'"));
		?>
        <td colspan="6">Ke <strong><?php echo $draport['rangking']; ?></strong> dari <strong><?php echo $totalsiswakelasnya; ?></strong> Siswa</td>
      </tr>
      
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td width="81%">Orang Tua / Wali Murid</td>
        <td width="19%">Jakarta, <?php echo date("d M Y"); ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Wali Kelas</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>______________________</td>
        <td>Adi Nugraha, S.pd</td>
      </tr>
    </table></td>
  </tr>
</table>
<?php } ?>