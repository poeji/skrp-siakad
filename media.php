<?php
session_start();
//error_reporting(0);
if(isset($_SESSION["userid"]) && $_SESSION["userid"] != "") {
include "config/koneksi.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Sistem Informasi Akademik Sekolah</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!--  checkbox styling script -->
<script src="js/jquery/ui.core.js" type="text/javascript"></script>
<script src="js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="js/jquery/jquery.bind.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>  

<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>
 

<![endif]>

<!--  styled select box script version 2 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script --> 
<script src="js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  $(function() {
      $("input.file_1").filestyle({ 
          image: "images/forms/choose-file.gif",
          imageheight : 21,
          imagewidth : 78,
          width : 310
      });
  });
</script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script> 


<!--  date picker script -->
<link rel="stylesheet" href="css/datePicker.css" type="text/css" />
<script src="js/jquery/date.js" type="text/javascript"></script>
<script src="js/jquery/jquery.datePicker.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
        $(function()
{

// initialise the "Select date" link
$('.tgl')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
});
</script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body> 
<!-- Start: page-top-outer -->
<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo">
	<a href=""><img src="images/shared/logo.png" width="500" height="45" alt="" /></a>
	</div>
	<!-- end logo -->
	<div id="top-search">
	<form name="Tick" > 
<embed src="images/5005-white.swf?TimeZone=Indonesia_Surabaya&"  width="120" height="40" wmode="transparent" type="application/x-shockwave-flash">
</form> 
	</div>
	<!--  start top-search -->
	<!-- <div id="top-search">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
		<td><input type="text" value="Search" onblur="if (this.value=='') { this.value='Search'; }" onfocus="if (this.value=='Search') { this.value=''; }" class="top-search-inp" /></td>
		<td>
		<select  class="styledselect">
			<option value=""> All</option>
			<option value=""> Products</option>
			<option value=""> Categories</option>
			<option value="">Clients</option>
			<option value="">News</option>
		</select> 
		</td>
		<td>
		<input type="image" src="images/shared/top_search_btn.gif"  />
		</td>
		</tr>
		</table>
	</div> -->
 	<!--  end top-search -->


</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		<!-- start nav-right -->
		<div id="nav-right">
		
			<?php /*<div class="nav-divider">&nbsp;</div>
			<div class="showhide-account" style="cursor:pointer;"><img src="images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></div> */ ?>
			<div class="nav-divider">&nbsp;</div>
			<a href="logout.php" id="logout" onclick="return confirm('Anda yakin logout dari sistem?')"><img src="images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
			<div class="clear">&nbsp;</div>
		
			<?php /*<!--  start account-content -->	
			<div class="account-content">
			<div class="account-drop-inner">
				<a href="?page=ganti_password" id="acc-settings">Ganti Password</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="?page=profil" id="acc-details">Profil</a>
				<div class="clear">&nbsp;</div>
			</div>
			</div>
			<!--  end account-content -->
		*/ ?>
		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
		<div class="table">
		
		<ul class="select"><li><a href="media.php"><b>Home</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<!-- <div class="select_sub">
			<ul class="sub">
				<li><a href="#nogo">Dashboard Details 1</a></li>
				<li><a href="#nogo">Dashboard Details 2</a></li>
				<li><a href="#nogo">Dashboard Details 3</a></li>
			</ul>
		</div> -->
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		 <?php
		 if($_SESSION['level']=="admin"){
		 ?>              
		<ul class="select"><li><a href="#"><b>Input Data</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li><a href="?page=siswatambah">Input Data Siswa</a></li>
				<li><a href="?page=gurutambah">Input Data Guru</a></li>
				<li><a href="?page=pelajarantambah">Input Mata Pelajaran</a></li>
				<li><a href="?page=kelastambah">Input Ruang Kelas</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		<?php
		}
		?>
		 <?php
		 if($_SESSION['level']=="admin"){
		 ?>
		<ul class="select"><li><a href="#"><b>Lihat Data</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
           
				<li><a href="?page=lihatsiswa">Data Siswa</a></li>
				<li><a href="?page=guru">Data Guru</a></li>
				<li><a href="?page=kelas">Data Kelas</a></li>
				<li><a href="?page=pelajaran">Mata Pelajaran</a></li>
                <li><a href="?page=jadwal">Jadwal Pelajaran</a></li>
			<?php  /*elseif($_SESSION['level']=="guru"){ ?>
            	<li><a href="?page=jadwalguru">Jadwal Pelajaran</a></li>
            <?php } elseif($_SESSION['level']=="siswa"){ ?>
            	<li><a href="?page=jadwalsiswa">Jadwal Siswa</a></li>
            <?php }*/ ?>
            </ul>
            
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		<?php
		}
		?>
		
		<ul class="select">
		  <li><a href="#nogo"><b>Akademik</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
		 <?php
		 if($_SESSION['level']=="admin"){
		 ?>     <li><a href="?page=jadwaltambah">Input Jadwal Pelajaran</a></li>
         		<li><a href="?page=kurikulum">Input Kurikulum</a></li>
                <li><a href="?page=updatekelas">Update Kelas Siswa</a></li>
				<?php } elseif($_SESSION['level']=="guru") { ?>
				<li><a href="?page=jadwalguru">Jadwal Mengajar Guru</a></li> 
                <li><a href="?page=nilaipengetahuandata">Input Nilai Pengtahuan</a></li>
				<li><a href="?page=nilaiketerampilan">Input Nilai Keterampilan</a></li>
                <li><a href="?page=nilairemed">Input Nilai Remed</a></li>
                <li><a href="?page=lihatnilaisiswakelas">Nilai Siswa</a></li>   
			 	<?php
				 } elseif($_SESSION['level']=="siswa") { ?>
				<li><a href="?page=jadwalsiswa">Jadwal Pelajaran Siswa</a></li> 
                <li><a href="?page=nilaisiswasemester">Nilai Siswa</a></li>    
			 	<?php
				}
				?>	
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
        
        <?php if($_SESSION['level']=="guru" || $_SESSION['level']=="siswa") { ?>
        <div class="nav-divider">&nbsp;</div>
        
        <ul class="select">
		  <li><a href="#nogo"><b>Biodata</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
		 <?php
		 if($_SESSION['level']=="admin"){
		 ?>     <li><a href="?page=datauser">Data User</a></li>
				<?php } elseif($_SESSION['level']=="guru") { ?>
				<li><a href="?page=home_guru">Profil Guru</a></li>
                <li><a href="?page=gantipasswordguru">Ganti Password</a></li>    
			 	<?php
				 } elseif($_SESSION['level']=="siswa") { ?>
                <li><a href="?page=home_siswa">Profil Siswa</a></li>
                <li><a href="?page=gantipasswordsiswa">Ganti Password</a></li>    
			 	<?php
				}
				?>	
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
        <?php } ?>
		<div class="nav-divider">&nbsp;</div>
		<?php 
		if($_SESSION['level']=="admin"){
		?>
		<ul class="select">
		  <li><a href="#nogo"><b>User </b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><a href="?page=user">Data User</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		<?php
		}?>
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

  <div class="clear"></div>
 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1 align="center">Selamat Datang <strong><?php echo $_SESSION['nama']." [". ucfirst($_SESSION["level"])."]"; ?></strong></h1>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			<?php if(isset($_GET['page'])) {
					include $_GET['page'].".php";
				} else {
					include "home.php"; 
					}
			?>
            </div>
			<!--  end table-content  -->
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    
<!-- start footer -->         
<div id="footer">
<!-- <div id="footer-pad">&nbsp;</div> -->
	<!--  start footer-left -->
	<div align="center" id="footer-left">Sistem Informasi Akademik SMA 66 Negeri Jakarta</div>
	<!--  end footer-left -->
	<div class="clear">&nbsp;</div>
</div>
<!-- end footer -->
 
</body>
</html>
<?php } else { echo "<script>alert('Anda harus login terlebih dahulu untuk memasuki halaman ini'); location.href='index.php';</script>"; } ?>