<?php
function hari($n) {
	if($n==1) {
		return "Senin";
	} elseif($n==2) {
		return "Selasa";
	} elseif($n==3) {
		return "Rabu";
	} elseif($n==4) {
		return "Kamis";
	} elseif($n==5) {
		return "Jumat";
	} elseif($n==6) {
		return "Sabtu";
	}

}

function jam($n) {
	if($n==1) {
		return "06:30 - 07:15";
	} elseif($n==2) {
		return "07:15 - 08:00";
	} elseif($n==3) {
		return "08:00 - 08:45";
	} elseif($n==4) {
		return "08:45 - 09:30";
	} elseif($n==5) {
		return "10:00 - 10:45";
	} elseif($n==6) {
		return "10:45 - 11:30";
	} elseif($n==7) {
		return "11:30 - 12:45";
	} elseif($n==8) {
		return "12:15 - 13:00";
	}

}
?>
<h3>Data Jadwal</h3>

<a href="">Tambah Data Jadwal</a>
<br /><br />
						<table class="tabel">							  <tr>
								  <td>No</td>
                                  <td>Hari</td>
								  <td>Jam</td>
								  <td>Kelas</td>
								  <td>Pelajaran</td>
								  <td>Guru</td>
								  <td>Angkatan</td>
								  <td>Actions</td>
							  </tr>
						  <?php
						  		$no = 1;
						  		$q = mysql_query("SELECT j.*, g.`nama_guru`, k.`nama_kelas`, p.`nama_pelajaran` FROM `jadwal` j
LEFT JOIN `guru` g ON g.`nip` = j.`nip`
LEFT JOIN `kelas` k ON k.`kode_kelas` = j.`kode_kelas`
LEFT JOIN `pelajaran` p ON p.`kode_pelajaran` = j.`kode_pelajaran`
ORDER BY j.`hari`, j.`jam` ASC");
						  		while($d = mysql_fetch_array($q)) {
						  ?>
							<tr>
								<td class="center"><?php echo $no; ?></td>
                                <td class="center"><?php echo hari($d['hari']); ?></td>
								<td class="center"><?php echo jam($d['jam']); ?></td>
								<td class="center"><?php echo $d['nama_kelas']; ?></td>
								<td class="center"><?php echo $d['nama_pelajaran']; ?></td>
								<td class="center"><?php echo $d['nama_guru']; ?></td>
                                <td class="center"><?php echo $d['thn_ajaran']; ?></td>
								<td class="center">
									<a class="btn btn-info" href="">
										Edit
									</a>
								</td>
							</tr>
							<?php $no++; } ?>
					  </table>        