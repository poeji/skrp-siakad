<?php
$q = mysql_fetch_array(mysql_query("select * from jadwal where id_jadwal = $_GET[id]"));
?>
<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Edit Data Jadwal</h2>
						
					</div>
					<div class="box-content">
					<form action="?page=jadwaleditproses" method="post">
					<input name="id" type="hidden" value="<?php echo $_GET['id']; ?>">
					<div class="control-group">
								<label class="control-label" for="selectError">Mata Pelajaran</label>
								<div class="controls">
								  <select id="selectError" data-rel="chosen" name="kode_pelajaran">
									<?php
                                        $qjur = mysql_query("select * from pelajaran order by nama_pelajaran ASC");
                                        while($djur = mysql_fetch_array($qjur)) {
                                  ?>
                                    <option value="<?php echo $djur['kode_pelajaran']; ?>" <?php if($djur['kode_pelajaran']==$q['kode_pelajaran']) {?>selected<?php } ?>><?php echo $djur['nama_pelajaran']; ?></option>
                                    <?php } ?>
								  </select>
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="selectError">Kelas</label>
								<div class="controls">
								  <select id="selectError2" data-rel="chosen" name="kode_kelas">
									<?php
                                        $qjur = mysql_query("select * from kelas order by nama_kelas ASC");
                                        while($djur = mysql_fetch_array($qjur)) {
                                  ?>
                                    <option value="<?php echo $djur['kode_kelas']; ?>" <?php if($djur['kode_kelas']==$q['kode_kelas']) {?>selected<?php } ?>><?php echo $djur['nama_kelas']; ?></option>
                                    <?php } ?>
								  </select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="selectError">Pengajar</label>
								<div class="controls">
								  <select id="selectError3" data-rel="chosen" name="nip">
									<?php
                                        $qjur = mysql_query("select * from guru order by nama_guru ASC");
                                        while($djur = mysql_fetch_array($qjur)) {
                                  ?>
                                    <option value="<?php echo $djur['nip']; ?>" <?php if($djur['nip']==$q['nip']) {?>selected<?php } ?>><?php echo $djur['nama_guru']." [".$djur['nip']."]"; ?></option>
                                    <?php } ?>
								  </select>
								</div>
							  </div>
                              <div class="control-group">
								<label class="control-label" for="selectError">Hari</label>
								<div class="controls">
								  <select id="selectError3" data-rel="chosen" name="hari">
                                    <option value="1" <?php if(1==$q['hari']) {?>selected<?php } ?>>Senin</option>
                                    <option value="2" <?php if(2==$q['hari']) {?>selected<?php } ?>>Selasa</option>
                                    <option value="3" <?php if(3==$q['hari']) {?>selected<?php } ?>>Rabu</option>
                                    <option value="4" <?php if(4==$q['hari']) {?>selected<?php } ?>>Kamis</option>
                                    <option value="5" <?php if(5==$q['hari']) {?>selected<?php } ?>>Jumat</option>
                                    <option value="6" <?php if(6==$q['hari']) {?>selected<?php } ?>>Sabtu</option>
								  </select>
								</div>
							  </div>
                              <div class="control-group">
								<label class="control-label" for="selectError">Jam</label>
								<div class="controls">
								  <select id="selectError3" data-rel="chosen" name="jam">
                                    <option value="1" <?php if(1==$q['jam']) {?>selected<?php } ?>>1) 06:30 - 07:15</option>
                                    <option value="2" <?php if(2==$q['jam']) {?>selected<?php } ?>>2) 07:15 - 08:00</option>
                                    <option value="3" <?php if(3==$q['jam']) {?>selected<?php } ?>>3) 08:00 - 08:45</option>
                                    <option value="4" <?php if(4==$q['jam']) {?>selected<?php } ?>>4) 08:45 - 09:30</option>
                                    <option value="5" <?php if(5==$q['jam']) {?>selected<?php } ?>>5) 10:00 - 10:45</option>
                                    <option value="6" <?php if(6==$q['jam']) {?>selected<?php } ?>>6) 10:45 - 11:30</option>
                                    <option value="7" <?php if(7==$q['jam']) {?>selected<?php } ?>>7) 11:30 - 12:45</option>
                                    <option value="8" <?php if(8==$q['jam']) {?>selected<?php } ?>>8) 12:15 - 13:00</option>
								  </select>
								</div>
							  </div>
							  <div class="control-group">
                              <label class="control-label" for="typeahead">Tahun Ajaran </label>
                              <div class="controls">
                                <input type="text" class="span6 typeahead required" id="tahun_ajaran" name="tahun_ajaran" placeholder="Tahun Ajaran" value="<?php echo $q['thn_ajaran']; ?>" style="width:100px" >
                              </div>
                            </div>
							  <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
							  <button type="button" class="btn" onclick="location.href='?page=nilaipengetahuandata'">Batal</button>
					
         	
					</div>
				</div><!--/span-->
			
			</div><!--/row-->