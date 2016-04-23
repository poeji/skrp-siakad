<h3>Data Nilai Keterampilan</h3>

<a href="?page=nilaiketerampilan">Kembali</a>
<br /><br />

						<table class="tabel">
							  <tr>
								  <th>NIS</th>
								  <th>Nama Siswa</th>
								  <th>Pelajaran</th>
								  <th>Nilai Praktik</th>
								  <th>Angka</th>
								  <th>Predikat</th>
								  <th>Skor</th>
								  <th>Deskripsi</th>
								  <th>Actions</th>
							  </tr>
						  <?php
						  		//echo "SELECT * FROM `nilai_keterampilan` p LEFT JOIN siswa s ON s.`nis` = p.`nis` WHERE tahun_ajaran = '".date("Y")."'";
						  		$q = mysql_query("SELECT * FROM `nilai_keterampilan` p LEFT JOIN siswa s ON s.`nis` = p.`nis` WHERE tahun_ajaran = '".date("Y")."' and p.nis = '".$_GET['id']."'");
						  		while($d = mysql_fetch_array($q)) { 

						  		//mata pelajaran
						  		$dmp = mysql_fetch_array(mysql_query("select nama_pelajaran from pelajaran where kode_pelajaran = '".$d['kode_pelajaran']."'"));	
						  		
						  		//nilai proses
						  		$dnp = mysql_fetch_array(mysql_query("SELECT SUM(np1+np2+np3+np4+np5) AS total_uh FROM nilai_keterampilan 
						  			WHERE nis = '".$d['nis']."' AND tahun_ajaran = '".$d['tahun_ajaran']."'  AND nip = '".$d['nip']."' AND kode_pelajaran = '".$d['kode_pelajaran']."' AND kode_kelas = '".$d['kode_kelas']."'"));
						  		$nilaiproses = $dnp['total_uh'] / 5;

						  		//nilai angka
						  		//$nilaiangka1 = ($nilaiproses + $d['uts']+($d['uas']*3))/5;
						  		$nilaiangka1 = $nilaiproses + $d['nfolio'] + $d['nproyek'];
						  		$nilaiangka2 = $nilaiangka1/3;

						  		//nilai predikat
						  		if($nilaiangka2 > 95) {
						  			$predikat = "A";
						  		} elseif($nilaiangka2 > 90) {
						  			$predikat = "A-";
						  		} elseif($nilaiangka2 > 85) {
						  			$predikat = "B+";
						  		} elseif($nilaiangka2 > 80) {
						  			$predikat = "B";
						  		} elseif($nilaiangka2 > 74) {
						  			$predikat = "B-";
						  		} elseif($nilaiangka2 > 69) {
						  			$predikat = "C+";
						  		} elseif($nilaiangka2 > 64) {
						  			$predikat = "C";
						  		} elseif($nilaiangka2 > 59) {
						  			$predikat = "C-";
						  		} elseif($nilaiangka2 > 54) {
						  			$predikat = "D+";
						  		} else {
						  			$predikat = "D";
						  		}

						  		if($predikat == "A") { 
						  			$skor = "4.00";
						  		} elseif($predikat == "A-") { 
						  			$skor = "3.67";
						  		} elseif($predikat == "B+") { 
						  			$skor = "3.33";
						  		} elseif($predikat == "B") { 
						  			$skor = "3.00";
						  		} elseif($predikat == "B-") { 
						  			$skor = "2.67";
						  		} elseif($predikat = "C+") { 
						  			$skor = "2.33";
						  		} elseif($predikat = "C") { 
						  			$skor = "2.00";
						  		} elseif($predikat = "C-") { 
						  			$skor = "1.67";
						  		} elseif($predikat = "D+") { 
						  			$skor = "1.33";
						  		} else { 
						  			$skor = "1.00";
						  		}

						  		if($nilaiangka2 >= 90) {
						  			$desk = "Sudah Sangat Terampil";
						  		} elseif($nilaiangka2 >= 75) {
						  			$desk = "Sudah Terampil";
						  		} elseif($nilaiangka2 >= 60) {
						  			$desk = "Cukup Terampil";
						  		} else {
						  			$desk = "Kurang Terampil";
						  		}

						  ?>	
							<tr>
								<td class="center"><?php echo $d['nis']; ?></td>
								<td class="center"><?php echo $d['nama_siswa']; ?></td>
								<td class="center"><?php echo $dmp['nama_pelajaran']; ?></td>
								<td class="center"><?php print number_format($nilaiproses,2); ?></td>
								<td class="center"><?php  print number_format($nilaiangka2,2);  ?></td>
								<td class="center"><?php echo $predikat; ?></td>
								<td class="center"><?php echo $skor; ?></td>
								<td class="center"><?php echo $desk; ?></td>
								<td class="center">
									<a class="btn btn-info" href="?page=nilaiketerampilanedit&id=<?php echo $d['id_nilaiketerampilan']; ?>">
										Edit 
									</a>
								</td>
							</tr>
							<?php } ?>
					  </table>        