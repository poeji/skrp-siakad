<script type="text/javascript" src="js/jquery.validate.min.js"></script>
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
                        minlength: 4
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
$dg = mysql_fetch_array(mysql_query("select * from guru where nip = '".$_SESSION['userid']."'"));
list($thn,$bln,$tgl)=explode("-",$dg['tgl_lahir']);
?>
<h3>Edit Guru <?php echo $dg['nama_guru']; ?> [<?php echo $dg['nip']; ?>]</h3>
                    <form id="register-form" name="formguru"  action="?page=dataguruproses" method="post">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">NIP </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead required pendek" id="nip" name="nip" placeholder="NIP" style="width: 200px;" value="<?php echo $dg['nip']; ?>" readonly >							
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Nama Guru </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead required" id="nama_guru" name="nama_guru" placeholder="Nama Guru" value="<?php echo $dg['nama_guru']; ?>" >
							  </div>
							</div>
                            <div class="control-group">
                              <label class="control-label" for="typeahead">Tempat Lahir </label>
                              <div class="controls">
                                <input type="text" class="span6 typeahead required" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $dg['tempat_lahir']; ?>" >
                              </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label" for="typeahead">Tanggal Lahir </label>
                              <div class="controls">
                                <input type="text" class="span6 typeahead required datepicker tgl" id="tgl_lahir" name="tgl_lahir" value="<?php echo $bln."/".$tgl."/".$thn; ?>" placeholder="Tanggal Lahir" >
                              </div>
                            </div>
                            <div class="control-group hidden-phone">
                              <label class="control-label" for="textarea2">Alamat</label>
                              <div class="controls">
                                <textarea  id="alamat" name="alamat" rows="2"  style="width: 420px;"><?php echo $dg['alamat']; ?></textarea>
                              </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="selectError">Agama</label>
                                <div class="controls">
                                  <select id="agama" name="agama" data-rel="chosen" class="required">
                                  <option value="ISLAM">ISLAM</option>
                                    <option value="KRISTEN PROTESTAN">KRISTEN PROTESTAN</option>
                                    <option value="KRISTEN KHATOLIK">KRISTEN KHATOLIK</option>
                                     <option value="HINDU">HINDU</option>
                                     <option value="BUDHA">BUDHA</option>
                                  </select>
                                </div>
                              </div>
                              <div class="control-group">
                                <label class="control-label" for="selectError">Jenis Kelamin</label>
                                <div class="controls">
                                  <select id="jenis_kelamin" name="jenis_kelamin" data-rel="chosen" class="required">
                                    <option value="">PILIH</option>
                                    <option value="L" <?php if($dg['jenis_kelamin']=="L") { ?>selected="selected"<?php } ?>>LAKI-LAKI</option>
                                    <option value="P" <?php if($dg['jenis_kelamin']=="P") { ?>selected="selected"<?php } ?>>PEREMPUAN</option>
                                  </select>
                                </div>
                              </div>
                              <div class="control-group">
                                <label class="control-label" for="selectError">Status Menikah</label>
                                <div class="controls">
                                  <select id="st_menikah" name="st_menikah" data-rel="chosen" class="required">
                                    <option value="">PILIH</option>
                                    <option value="KAWIN" <?php if($dg['st_menikah']=="KAWIN") { ?>selected="selected"<?php } ?>>KAWIN</option>
                                    <option value="BELUM KAWIN"  <?php if($dg['st_menikah']=="BELUM KAWIN") { ?>selected="selected"<?php } ?>>BELUM KAWIN</option>
                                  </select>
                                </div>
                              </div>
                            <div class="control-group">
                              <label class="control-label" for="typeahead">Telepon Rumah</label>
                              <div class="controls">
                                <input type="text" class="span6 typeahead required" id="tlp_rmh" name="tlp_rmh" value="<?php echo $dg['tlp_rmh']; ?>" placeholder="Telepon Rumah" >
                              </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label" for="typeahead">Telepon HP</label>
                              <div class="controls">
                                <input type="text" class="span6 typeahead required" id="hp" name="hp" value="<?php echo $dg['hp']; ?>" placeholder="Telepon HP" >
                              </div>
                            </div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary" name="submit" value="submit">Save changes</button>
							  <button type="button" class="btn" onClick="location.href='?page=guru'">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->