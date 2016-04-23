<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Tambah Data Kurikulum</h2>
						
					</div>
					<div class="box-content">
					<form action="?page=kurikulumtambahsubmit" method="post">
		
					<div class="control-group">
								<label class="control-label" for="selectError">Mata Pelajaran</label>
								<div class="controls">
								  <select id="selectError" data-rel="chosen" name="kode_pelajaran">
									<?php
                                        $qjur = mysql_query("select * from pelajaran order by nama_pelajaran ASC");
                                        while($djur = mysql_fetch_array($qjur)) {
                                  ?>
                                    <option value="<?php echo $djur['kode_pelajaran']; ?>"><?php echo $djur['nama_pelajaran']; ?></option>
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
                                    <option value="<?php echo $djur['kode_kelas']; ?>"><?php echo $djur['nama_kelas']; ?></option>
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
                                    <option value="<?php echo $djur['nip']; ?>"><?php echo $djur['nama_guru']." [".$djur['nip']."]"; ?></option>
                                    <?php } ?>
								  </select>
								</div>
							  </div>
							  <div class="control-group">
                              <label class="control-label" for="typeahead">Tahun Ajaran </label>
                              <div class="controls">
                                <input type="text" class="span6 typeahead required" id="tahun_ajaran" name="tahun_ajaran" placeholder="Tahun Ajaran" value="<?php echo date("Y"); ?>" style="width:100px" >
                              </div>
                            </div>
							  <button type="submit" class="btn btn-primary" name="submit" value="submit">Proses</button>
							  <button type="button" class="btn" onclick="location.href='?page=nilaipengetahuandata'">Cancel</button>
					
         	
					</div>
				</div><!--/span-->
			
			</div><!--/row-->