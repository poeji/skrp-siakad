<h3>Data Nilai Pengetahuan</h3>

<a href="?page=nilaipengetahuantambah">Tambah Data Nilai Pengetahuan</a>
<br /><br />
						<table class="tabel">
                        	  <tr>
								  <th>NIS</th>
								  <th>Nama Siswa</th>
								  <th>Pelajaran</th>
								  <th>Nilai Proses</th>
								  <th>Angka</th>
								  <th>Predikat</th>
								  <th>Skor</th>
								  <th>Deskripsi</th>
								  <th>Actions</th>
							  </tr>
						  <?php
						  		//echo "SELECT * FROM `nilai_pengetahuan` p LEFT JOIN siswa s ON s.`nis` = p.`nis` WHERE tahun_ajaran = '".date("Y")."'";
						  		$q = mysql_query("SELECT * FROM `nilai_pengetahuan` p LEFT JOIN siswa s ON s.`nis` = p.`nis` WHERE tahun_ajaran = '".date("Y")."'");
						  		while($d = mysql_fetch_array($q)) { 

						  		//mata pelajaran
						  		$dmp = mysql_fetch_array(mysql_query("select nama_pelajaran from pelajaran where kode_pelajaran = '".$d['kode_pelajaran']."'"));	
						  		
						  		//nilai proses
						  		$dnp = mysql_fetch_array(mysql_query("SELECT SUM(uh1+uh2+uh3+uh4+uh5) AS total_uh FROM nilai_pengetahuan 
						  			WHERE nis = '".$d['nis']."' AND tahun_ajaran = '".$d['tahun_ajaran']."'  AND nip = '".$d['nip']."' AND kode_pelajaran = '".$d['kode_pelajaran']."' AND kode_kelas = '".$d['kode_kelas']."'"));
						  		$nilaiproses = $dnp['total_uh'] / 5;

						  		//nilai angka
						  		//$nilaiangka1 = ($nilaiproses + $d['uts']+($d['uas']*3))/5;
						  		$nilaiangka1 = $nilaiproses + $d['uts'];
						  		$nilaiangka2 = $d['uas']*3;
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

						  		if($nilaiangka4 >= 90) {
						  			$desk = "Sudah Sangat Menguasai Materi";
						  		} elseif($nilaiangka4 >= 75) {
						  			$desk = "Sudah Menguasai Materi";
						  		} elseif($nilaiangka4 >= 60) {
						  			$desk = "Cukup Menguasai Materi";
						  		} else {
						  			$desk = "Kurang Menguasai Materi";
						  		}

						  ?>	
							<tr>
								<td class="center"><?php echo $d['nis']; ?></td>
								<td class="center"><?php echo $d['nama_siswa']; ?></td>
								<td class="center"><?php echo $dmp['nama_pelajaran']; ?></td>
								<td class="center"><?php print number_format($nilaiproses,2); ?></td>
								<td class="center"><?php  print number_format($nilaiangka4,2);  ?></td>
								<td class="center"><?php echo $predikat; ?></td>
								<td class="center"><?php echo $skor; ?></td>
								<td class="center"><?php echo $desk; ?></td>
								<td class="center">
									<a class="btn btn-info" href="?page=nilaipengetahuanedit&id=<?php echo $d['id_nilaipengetahuan']; ?>">
										Edit 
									</a>
									<a class="btn btn-danger" href="?page=nilaipengetahuanhapus&id=<?php echo $d['id_nilaipengetahuan']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus <?php echo $d['nama_guru']; ?>?');">
										Hapus
									</a>
								</td>
							</tr>
							<?php } ?>
					  </table>        