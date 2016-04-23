<script>
function raport(nis) {
    window.open("nilaisiswa.php?id="+nis, "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=800, height=600");
}
</script>
<h3>Data Nilai Siswa</h3>

						<table class="tabel">
							  <tr>
								  <th>NIS</th>
								  <th>Nama Siswa</th>
								  <th>Kelas</th>
								  <th>Actions</th>
							  </tr>
						  <?php
						  		$q = mysql_query("SELECT b.nis, s.`nama_siswa`, k.`nama_kelas`
FROM `belajar` b 
LEFT JOIN `siswa` s ON s.`nis` = b.`nis`
LEFT JOIN `kelas` k ON k.`kode_kelas` = b.`kode_kelas`
WHERE b.nip = '".$_SESSION['userid']."' 
GROUP BY b.nis ORDER BY s.`nama_siswa` ASC");
						  		while($d = mysql_fetch_array($q)) { 
						  ?>	
							<tr>
								<td class="center"><?php echo $d['nis']; ?></td>
								<td class="center"><?php echo $d['nama_siswa']; ?></td>
								<td class="center"><?php echo $d['nama_kelas']; ?></td>
								<td class="center">
									<a href="#" onclick="raport(<?php echo $d['nis']; ?>)" title="Lihat Detail Nilai Pengetahuan <?php echo $d['nama_siswa']; ?>">
								 		Detail Rapor
									</a>
								</td>
							</tr>
							<?php } ?>
					  </table>