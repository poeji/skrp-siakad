<?php
$dl = mysql_fetch_array(mysql_query("select * from nilai_sikap where id_nilaisikap = '".$_GET['id']."'"));

$q = mysql_query("SELECT * FROM `belajar` b
LEFT JOIN `siswa` s ON s.`nis` = b.`nis`
WHERE b.nip = '".$dl['nip']."' AND b.thn_ajaran = ".$dl['tahun_ajaran']." AND b.kode_pelajaran = '".$dl['kode_pelajaran']."' AND b.kode_kelas = '".$dl['kode_kelas']."'  AND b.`nis` = '".$dl['nis']."'
ORDER BY s.`nama_siswa` ASC");
$total = mysql_num_rows($q);
		
$d = mysql_fetch_array($q); 
?>
<div class="row-fluid sortable">		
				<div class="box span12"> 
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Tambah Data Nilai Sikap</h2>
						
					</div>
					<div class="box-content"> 
					<form action="?page=nilaisikapupdateproses" method="post">
					<input type="hidden" value="<?php echo $_GET['id']; ?>" name="id">
					<input type="hidden" value="<?php echo $d['kode_pelajaran']; ?>" name="kode_pelajaran">
					<input type="hidden" value="<?php echo $d['kode_kelas']; ?>" name="kode_kelas">
					<input type="hidden" value="<?php echo $d['nip']; ?>" name="nip">
					<input type="hidden" value="<?php echo $d['thn_ajaran']; ?>" name="tahun_ajaran">
					<?php if($total > 0) { ?>
					<button type="submit" class="btn btn-primary" name="submit" value="submit">Save changes</button>
					<?php } ?>
					<button type="button" class="btn" onclick="location.href='?page=nilaisikapdetail&id=<?php echo $d['nis']; ?>'">Cancel</button>
					<br><br>		
					
						<table class="tabel">
							  <tr>
								  <td>NIS</td>
								  <td>Nama Siswa</td>
								  <td>Observasi</td>
								  <td>Antar Teman</td>
								  <td>Diri Sendiri</td>
								  <td>Jurnal Guru</td>
							  </tr>
						  <?php
						  $no = 10;
						  $no2 = 15;
						  $no3 = 20;
						  $no4 = 25;
						  $no5 = 35;
						  $no6 = 40;
						  $no7 = 45;
						  ?>
						  <input type="hidden" name="total" value="<?php echo $total; ?>">		
							<tr>
								<input type="hidden" name="nis" value="<?php echo $d['nis']; ?>">
								<td class="center"><?php echo $d['nis']; ?></td>
								<td class="center"><?php echo $d['nama_siswa']; ?></td>
								<td class="center"><input type="text" name="ob" style="width:40px" title="Observasi" value="<?php echo $dl['observasi']; ?>"></td>
								<td class="center"><input type="text" name="ant" style="width:40px" title="Antar Teman" value="<?php echo $dl['antarteman']; ?>"></td>
								<td class="center"><input type="text" name="ds" style="width:40px" title="Diri Sendiri" value="<?php echo $dl['dirisendiri']; ?>"</td>
								<td class="center"><input type="text" name="jg" style="width:40px" title="Jurnal Guru" value="<?php echo $dl['jurnalguru']; ?>"</td>
							</tr>
					  </table>   