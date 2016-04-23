<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<style>

 /* example styles for validation form demo */
</style>

<script type="text/javascript">
/**
  * Basic jQuery Validation Form Demo Code
  * Copyright Sam Deering 2012
  * Licence: http://www.jquery4u.com/license/
  */
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#register-form").validate({
                rules: {
                    firstname: "required",
                    lastname: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    agree: "required"
                },
                messages: {
                    firstname: "Please enter your firstname",
                    lastname: "Please enter your lastname",
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    email: "Please enter a valid email address",
                    agree: "Please accept our policy"
                },
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
$ds = mysql_fetch_array(mysql_query("select *, DATE_FORMAT(tanggal_lahir, '%d/%m/%Y')AS tgl from siswa where nis = '".$_GET['id']."'"));
$mintahun = (date("Y")-1)."-".date("Y");
$plustahun = (date("Y"))."-".(date("Y")+1);
?>
<h2>Edit Siswa <?php echo $ds['nama_siswa']; ?> [<?php echo $ds['nis']; ?>]</h2>
                    <form id="register-form" name="formsiswa"  action="?page=siswaeditproses" method="post">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">NIS </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead required pendek" id="nis" name="nis" placeholder="NIS" style="width: 200px;" value="<?php echo $ds['nis']; ?>" readonly="readonly" >
								
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Nama Siswa </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead required" id="nama_siswa" name="nama_siswa" placeholder="Nama Siswa" value="<?php echo $ds['nama_siswa']; ?>" >
							  </div>
							</div>
                            <div class="control-group">
                              <label class="control-label" for="typeahead">Tempat Lahir </label>
                              <div class="controls">
                                <input type="text" class="span6 typeahead required" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir"value="<?php echo $ds['tempat_lahir']; ?>" >
                              </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label" for="typeahead">Tanggal Lahir </label>
                              <div class="controls">
                                <input type="text" class="span6 typeahead required datepicker tgl" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" 
                                value="<?php echo $ds['tgl']; ?>" >
                              </div>
                            </div>
                            <div class="control-group hidden-phone">
                              <label class="control-label" for="textarea2">Alamat</label>
                              <div class="controls">
                                <textarea  id="alamat" name="alamat" rows="2"  style="width: 420px;"><?php echo $ds['alamat']; ?></textarea>
                              </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="selectError">Agama</label>
                                <div class="controls">
                                  <select id="agama" name="agama" data-rel="chosen" class="required">
                                 <option value="ISLAM" <?php if($ds['agama']=="ISLAM") { ?>selected="selected"<?php } ?>>ISLAM</option>
                                    <option value="KRISTEN PROTESTAN" <?php if($ds['agama']=="KRISTEN PROTESTAN") { ?>selected="selected"<?php } ?>>KRISTEN PROTESTAN</option>
                                    <option value="KRISTEN KHATOLIK" <?php if($ds['agama']=="KRISTEN KHATOLIK") { ?>selected="selected"<?php } ?>>KRISTEN KHATOLIK</option>
                                     <option value="HINDU" <?php if($ds['agama']=="HINDU") { ?>selected="selected"<?php } ?>>HINDU</option>
                                     <option value="BUDHA" <?php if($ds['agama']=="BUDHA") { ?>selected="selected"<?php } ?>>BUDHA</option>
                                  </select>
                                </div>
                              </div>
                              <div class="control-group">
                                <label class="control-label" for="selectError">Jenis Kelamin</label>
                                <div class="controls">
                                  <select id="jenis_kelamin" name="jenis_kelamin" data-rel="chosen" class="required">
                                    <option value="">PILIH</option>
                                    <option value="L" <?php if($ds['jenis_kelamin']=="L") { ?>selected="selected"<?php } ?>>LAKI-LAKI</option>
                                    <option value="P" <?php if($ds['jenis_kelamin']=="P") { ?>selected="selected"<?php } ?>>PEREMPUAN</option>
                                  </select>
                                </div>
                              </div>
                            <div class="control-group">
                              <label class="control-label" for="typeahead">Nama Orang Tua </label>
                              <div class="controls">
                                <input type="text" class="span6 typeahead required" id="nama_orangtua" name="nama_orangtua" placeholder="Nama Orang Tua"value="<?php echo $ds['nama_orangtua']; ?>" >
                              </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label" for="typeahead">Telepon Orang Tua </label>
                              <div class="controls">
                                <input type="text" class="span6 typeahead required" id="telepon_orangtua" name="telepon_orangtua" placeholder="Telepon Orang Tua"value="<?php echo $ds['telepon_orangtua']; ?>" >
                              </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="selectError">Kelas</label>
                                <div class="controls">
                                  <select id="kode_kelas" name="kode_kelas" data-rel="chosen" class="required">
                                  <?php
                                        $qagama = mysql_query("select * from kelas order by nama_kelas ASC");
                                        while($dagm = mysql_fetch_array($qagama)) {
                                  ?>
                                    <option value="<?php echo $dagm['kode_kelas']; ?>" <?php if($ds['kode_kelas']==$dagm['kode_kelas']) { ?>selected="selected"<?php } ?>><?php echo $dagm['nama_kelas']; ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>
                              <div class="control-group">
                                <label class="control-label" for="selectError">Tahun Ajaran</label>
                                <div class="controls">
                                  <select id="tahun" name="tahun" data-rel="chosen" class="required">
                                    <option value="<?php echo $mintahun; ?>" <?php if($ds['tahun']==$mintahun) { ?>selected="selected"<?php } ?>><?php echo $mintahun; ?></option>
                                   <option value="<?php echo $plustahun; ?>" <?php if($ds['tahun']==$plustahun) { ?>selected="selected"<?php } ?>><?php echo $plustahun; ?></option>
                                  </select>
                                </div>
                              </div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
							  <button type="button" class="btn" onclick="location.href='?page=siswa'">Batal</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->