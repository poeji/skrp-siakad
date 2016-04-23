<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Tambah Data Nilai Keterampilan</h2>
						
					</div>
					<div class="box-content">
					<form action="?page=nilaiketerampilantambahsubmit" method="post">
		<input name="nip" type="hidden" value="<?php echo $_SESSION["userid"]; ?>" />
					<div class="control-group">
								<label class="control-label" for="selectError">Mata Pelajaran</label>
								<div class="controls">
								  <select id="selectError" data-rel="chosen" name="id">
									<?php
                                        $qjur = mysql_query("SELECT b.`id_belajar`, b.kode_pelajaran, b.kode_kelas, b.nip, p.`nama_pelajaran`, k.`nama_kelas`, b.`thn_ajaran` FROM `belajar` b
LEFT JOIN `pelajaran` p ON p.`kode_pelajaran` = b.`kode_pelajaran`
LEFT JOIN `kelas` k ON k.`kode_kelas` = b.`kode_kelas`
WHERE thn_ajaran IN ('2015', '2016') AND nip = '".$_SESSION["userid"]."' GROUP BY b.kode_pelajaran, b.kode_kelas ORDER BY nama_pelajaran ASC");
                                        while($djur = mysql_fetch_array($qjur)) {
                                  ?>
                                    <option value="<?php echo $djur['nip']; ?>-<?php echo $djur['thn_ajaran']; ?>-<?php echo $djur['kode_pelajaran']; ?>-<?php echo $djur['kode_kelas']; ?>"><?php echo $djur['nama_pelajaran']; ?> - <?php echo $djur['nama_kelas']; ?> - <?php echo $djur['thn_ajaran']; ?></option>
                                    <?php } ?>
								  </select>
								</div>
							  </div>
								<br />
							  <button type="submit" class="btn btn-primary" name="submit" value="submit">Proses</button>
							  <button type="button" class="btn" onclick="location.href='?page=nilaiketerampilandata'">Cancel</button>
					
         	
					</div>
				</div><!--/span-->
			
			</div><!--/row-->