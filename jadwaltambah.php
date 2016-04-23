<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript">
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#register-form").validate({
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);
</script>

<?php
$mintahun = (date("Y")-1)."-".date("Y");
$plustahun = (date("Y"))."-".(date("Y")+1);
?>
<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Tambah Data Jadwal</h2>
						
					</div>
					<div class="box-content">
					<form action="?page=jadwaltambahproses" method="post"   novalidate="novalidate" id="register-form">
		
					<div class="control-group">
								<label class="control-label" for="selectError">Mata Pelajaran</label>
								<div class="controls">
								  <select id="selectError" data-rel="chosen" name="idbelajar">
                                  <option value="">---Pilih Mata Pelajaran---</option>
									<?php
                                        $qd = mysql_query("SELECT p.`nama_pelajaran`, k.`nama_kelas`, g.`nama_guru`, b.`id_belajar`, p.`kode_pelajaran`, k.`kode_kelas`, g.`nip`, b.thn_ajaran FROM `kurikulum` b
LEFT JOIN `pelajaran` p ON p.`kode_pelajaran` = b.`kode_pelajaran`
LEFT JOIN `kelas` k ON k.`kode_kelas` = b.`kode_kelas`
LEFT JOIN `guru` g ON g.`nip` = b.`nip`
ORDER BY p.`nama_pelajaran` ASC");
                                        while($dd = mysql_fetch_array($qd)) {
                                  ?>
                                    <option value="<?php echo $dd['id_belajar']; ?>"><?php echo $dd['nama_pelajaran']."-".$dd['nama_kelas']."-".$dd['nama_guru']."-".$dd['thn_ajaran']; ?></option>
                                    <?php } ?>
								  </select>
								</div>
							  </div>

                              <div class="control-group">
								<label class="control-label" for="selectError">Hari</label>
								<div class="controls">
								  <select id="selectError3" data-rel="chosen" name="hari">
                                  <option value="">---Pilih Hari---</option>
                                    <option value="1">Senin</option>
                                    <option value="2">Selasa</option>
                                    <option value="3">Rabu</option>
                                    <option value="4">Kamis</option>
                                    <option value="5">Jumat</option>
                                    <option value="6">Sabtu</option>
								  </select>
								</div>
							  </div>
                              <div class="control-group">
								<label class="control-label" for="selectError">Jam</label>
								<div class="controls">
								  <select id="selectError3" data-rel="chosen" name="jam">
                                  <option value="">---Pilih Jam---</option>
                                    <option value="1">1) 06:30 - 07:15</option>
                                    <option value="2">2) 07:15 - 08:00</option>
                                    <option value="3">3) 08:00 - 08:45</option>
                                    <option value="4">4) 08:45 - 09:30</option>
                                    <option value="5">5) 10:00 - 10:45</option>
                                    <option value="6">6) 10:45 - 11:30</option>
                                    <option value="7">7) 11:30 - 12:45</option>
                                    <option value="8">8) 12:15 - 13:00</option>
								  </select>
								</div>
							  </div>
                            </div>
							  <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
							  <button type="button" class="btn" onclick="location.href='?page=nilaipengetahuandata'">Batal</button>
					
         	
					</div>
				</div><!--/span-->
			
			</div><!--/row-->