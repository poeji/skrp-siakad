<?php error_reporting(0); ?>
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
    $d = mysql_fetch_array(mysql_query("select * from pelajaran where kode_pelajaran = '$_GET[id]'"));
?>
   <div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Pelajaran <?php echo $d['nama_pelajaran']; ?></h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" id="register-form" name="formpelajaran" novalidate="novalidate" action="?page=pelajaraneditproses" method="post">
                          <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Kode Pelajaran </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead required" id="kode_pelajaran" name="kode_pelajaran" placeholder="Kode pelajaran" value="<?php echo $d['kode_pelajaran']; ?>" readonly >
								
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Nama Pelajaran </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead required" id="nama_pelajaran" name="nama_pelajaran" placeholder="Nama pelajaran" value="<?php echo $d['nama_pelajaran']; ?>" >
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
							  <button type="button" class="btn" onclick="location.href='?page=pelajaran'">Batal</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->