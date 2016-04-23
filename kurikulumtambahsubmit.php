<?php
//echo "<pre>";
//print_r($_POST);
//echo "<pre>";

$q = mysql_query("SELECT b.*, s.`nama_siswa` FROM `belajar` b
LEFT JOIN `siswa` s ON s.`nis` = b.`nis`
WHERE b.nip = '".$_POST['nip']."' AND b.thn_ajaran = ".$_POST['tahun_ajaran']." AND b.kode_pelajaran = '".$_POST['kode_pelajaran']."' AND b.kode_kelas = '".$_POST['kode_kelas']."'
ORDER BY s.`nama_siswa` ASC");
$total = mysql_num_rows($q)
?>
<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Tambah Data Nilai Pengetahuan</h2>
						
					</div>
					<div class="box-content">
					<form action="?page=nilaipengetahuantambahproses" method="post">
					<input type="hidden" value="<?php echo $_POST['kode_pelajaran']; ?>" name="kode_pelajaran">
					<input type="hidden" value="<?php echo $_POST['kode_kelas']; ?>" name="kode_kelas">
					<input type="hidden" value="<?php echo $_POST['nip']; ?>" name="nip">
					<input type="hidden" value="<?php echo $_POST['tahun_ajaran']; ?>" name="tahun_ajaran">
					<button type="submit" class="btn btn-primary" name="submit" value="submit">Save changes</button>
					<button type="button" class="btn" onclick="location.href='?page=nilaipengetahuantambah'">Cancel</button>
					<br><br>		
					
						           
					</div>
				</div><!--/span-->
			
			</div><!--/row-->