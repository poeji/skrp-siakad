<h3>Data Nilai sikap</h3>

<a href="?page=nilaisikap">Kembali</a>
<br /><br />

						<table class="tabel">
							  <tr>
								  <th>NIS</th>
								  <th>Nama Siswa</th>
								  <th>Pelajaran</th>
								  <th>Angka</th>
								  <th>Predikat</th>
								  <th>Deskripsi</th>
								  <th>Actions</th>
							  </tr>
						  <?php
						  		//echo "SELECT * FROM `nilai_sikap` p LEFT JOIN siswa s ON s.`nis` = p.`nis` WHERE tahun_ajaran = '".date("Y")."'";
						  		$q = mysql_query("SELECT * FROM `nilai_sikap` p LEFT JOIN siswa s ON s.`nis` = p.`nis` WHERE tahun_ajaran = '".date("Y")."' and p.nis = '".$_GET['id']."'");
						  		while($d = mysql_fetch_array($q)) { 

						  		//mata pelajaran
						  		$dmp = mysql_fetch_array(mysql_query("select nama_pelajaran from pelajaran where kode_pelajaran = '".$d['kode_pelajaran']."'"));	
						  		
						  		//nilai proses
						  		$dnp = mysql_fetch_array(mysql_query("SELECT SUM(observasi+antarteman+dirisendiri+jurnalguru) AS total_uh FROM nilai_sikap 
						  			WHERE nis = '".$d['nis']."' AND tahun_ajaran = '".$d['tahun_ajaran']."'  AND nip = '".$d['nip']."' AND kode_pelajaran = '".$d['kode_pelajaran']."' AND kode_kelas = '".$d['kode_kelas']."'"));

						  		//nilai angka
								$nilaiangka = $dnp['total_uh'] / 4;
						  		
						  		//nilai predikat
						  		if($nilaiangka > 90) {
						  			$predikat = "SB";
						  		} elseif($nilaiangka > 70) {
						  			$predikat = "B";
						  		} elseif($nilaiangka > 60) {
						  			$predikat = "C";
						  		} else {
									$predikat = "K";
								}


						  		if($predikat=="SB") {
						  			$desk = "Sangat Baik";
						  		} elseif($predikat=="B") {
						  			$desk = "Baik";
						  		} elseif($predikat=="C") {
						  			$desk = "Cukup";
						  		} else {
						  			$desk = "Kurang";
						  		}

						  ?>	
							<tr>
								<td class="center"><?php echo $d['nis']; ?></td>
								<td class="center"><?php echo $d['nama_siswa']; ?></td>
								<td class="center"><?php echo $dmp['nama_pelajaran']; ?></td>
								<td class="center"><?php  print number_format($nilaiangka,2);  ?></td>
								<td class="center"><?php echo $predikat; ?></td>
								<td class="center"><?php echo $desk; ?></td>
								<td class="center">
									<a class="btn btn-info" href="?page=nilaisikapedit&id=<?php echo $d['id_nilaisikap']; ?>">
										Edit 
									</a>
								</td>
							</tr>
							<?php } ?>
					  </table>        