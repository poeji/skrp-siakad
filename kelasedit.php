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
    $d = mysql_fetch_array(mysql_query("select * from kelas where kode_kelas = '$_GET[id]'"));
?>
   <div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h3><i class="halflings-icon edit"></i><span class="break"></span>Edit Kelas <?php echo $d['nama_kelas']; ?></h3>
					</div>
					<div class="box-content">
						<form class="form-horizontal" id="register-form" name="formkelas" novalidate="novalidate" action="?page=kelaseditproses" method="post">
						  <input type="hidden" value="<?php echo $d['kode_kelas']; ?>" name="id">
                          <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Kode Kelas </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead required" id="kode_kelas" name="kode_kelas" placeholder="Kode Kelas" value="<?php echo $d['kode_kelas']; ?>" >
								
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Nama Kelas </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead required" id="nama_kelas" name="nama_kelas" placeholder="Nama Kelas" value="<?php echo $d['nama_kelas']; ?>" >
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
							  <button type="button" class="btn" onclick="location.href='?page=kelas'">Batal</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->