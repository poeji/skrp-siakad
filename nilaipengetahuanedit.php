<?php
$dl = mysql_fetch_array(mysql_query("select * from nilai_pengetahuan where id_nilaipengetahuan = '".$_GET['id']."'"));

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
						<h2><i class="halflings-icon user"></i><span class="break"></span>Tambah Data Nilai Pengetahuan</h2>
						
					</div>
					<div class="box-content"> 
					<form action="?page=nilaipengetahuanupdateproses" method="post">
					<input type="hidden" value="<?php echo $_GET['id']; ?>" name="id">
					<input type="hidden" value="<?php echo $d['kode_pelajaran']; ?>" name="kode_pelajaran">
					<input type="hidden" value="<?php echo $d['kode_kelas']; ?>" name="kode_kelas">
					<input type="hidden" value="<?php echo $d['nip']; ?>" name="nip">
					<input type="hidden" value="<?php echo $d['thn_ajaran']; ?>" name="tahun_ajaran">
					<?php if($total > 0) { ?>
					<button type="submit" class="btn btn-primary" name="submit" value="submit">Save changes</button>
					<?php } ?>
					<button type="button" class="btn" onclick="location.href='?page=nilaipengetahuandetail&id=<?php echo $d['nis']; ?>'">Cancel</button>
					<br><br>		
					
						<table class="tabel">
							  <tr>
								  <th>NIS</th>
								  <th>Nama Siswa</th>
								  <th>UH1</th>
								  <th>UH2</th>
								  <th>UH3</th>
								  <th>UH4</th>
								  <th>UH5</th>
								  <th>UTS</th>
								  <th>UAS</th>
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
								<td class="center"><input type="text" name="uh1" style="width:40px" title="UH 1" value="<?php echo $dl['uh1']; ?>"></td>
								<td class="center"><input type="text" name="uh2" style="width:40px" title="UH 2" value="<?php echo $dl['uh2']; ?>"></td>
								<td class="center"><input type="text" name="uh3" style="width:40px" title="UH 3" value="<?php echo $dl['uh3']; ?>"</td>
								<td class="center"><input type="text" name="uh4" style="width:40px" title="UH 4" value="<?php echo $dl['uh4']; ?>"</td>
								<td class="center"><input type="text" name="uh5" style="width:40px" title="UH 5" value="<?php echo $dl['uh5']; ?>"</td>
								<td class="center"><input type="text" name="uts" style="width:40px" title="UTS" value="<?php echo $dl['uts']; ?>"</td>
								<td class="center"><input type="text" name="uas" style="width:40px" title="UAS" value="<?php echo $dl['uas']; ?>"</td>
							</tr>
					  </table>   