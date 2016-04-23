<?php
$q = mysql_query("SELECT * FROM `siswa` WHERE kode_kelas = '".$_GET['kelas']."' ORDER BY nama_siswa ASC");
$total = mysql_num_rows($q)
?>
<link rel="stylesheet" href="style.css" />
<h2>Tambah Data Nilai Keterampilan</h2>
					<form action="?page=nilaiketerampilantambahproses" method="post">
					<input type="hidden" value="<?php echo $_GET['pelajaran']; ?>" name="kode_pelajaran">
					<input type="hidden" value="<?php echo $_GET['kelas']; ?>" name="kode_kelas">
					<input type="hidden" value="<?php echo $_GET['nip']; ?>" name="nip">
					<input type="hidden" value="<?php echo $_GET['tahun']; ?>" name="tahun_ajaran">
                    <input type="hidden" value="<?php echo $_GET['semester']; ?>" name="semester">
					<?php if($total > 0) { ?>
					<button type="submit" class="btn btn-primary" name="submit" value="submit">Save changes</button>
					<?php } ?>
					<button type="button" class="btn" onclick="location.href='?page=nilaiketerampilan'">Cancel</button>
					<br><br>		
                    <?php 
					$mp = mysql_fetch_array(mysql_query("SELECT nama_pelajaran FROM `pelajaran` WHERE kode_pelajaran = '".$_GET['pelajaran']."'"));
					$kl = mysql_fetch_array(mysql_query("SELECT nama_kelas FROM `kelas` WHERE kode_kelas = '".$_GET['kelas']."'"));
					$gr = mysql_fetch_array(mysql_query("SELECT nama_guru FROM `guru` WHERE nip = '".$_GET['nip']."'"));
					?>
					Kelas : <strong><?php echo $kl['nama_kelas']; ?></strong><br />
                    Mata Pelajaran : <strong><?php echo $mp['nama_pelajaran']; ?></strong><br />
                    Pengajar : <strong><?php echo $gr['nama_guru']; ?></strong><br>
                    Tahun Ajaran : <strong><?php echo $_GET['tahun']; ?></strong><br />
                    Semester : <strong><?php if($_GET['semester']==1) { echo "Ganjil"; } else { echo "Genap"; } ?></strong>
                    <br />
						<div class="page" id="tablewrapper">
		<div id="tableheader">
        	<div class="search">
                <select id="columns" onChange="sorter.search('query')"></select>
                <input type="text" id="query" onKeyUp="sorter.search('query')" />
            </div>
            <span class="details">
				<div>Hasil <span id="startrecord"></span>-<span id="endrecord"></span> dari <span id="totalrecords"></span></div>
        		<div><a href="javascript:sorter.reset()">reset</a></div>
        	</span>
        </div>
        <table width="708" border="0" cellpadding="0" cellspacing="0" class="tinytable" id="table">
            <thead>
							  <tr>
								  <td width="15%"><h3>NIS</h3></td>
								  <td width="30%"><h3>Nama Siswa</h3></td>
								  <td width="10%"><h3>KD1</h3></td>
								  <td width="10%"><h3>KD2</h3></td>
								  <td width="10%"><h3>KD3</h3></td>
								  <td width="10%"><h3>KD4</h3></td>
							  </tr>
                              </thead>
            <tbody>
						  <?php
						  $no = 10;
						  $no2 = 15;
						  $no3 = 20;
						  $no4 = 25;
						  $no5 = 35;
						  $no6 = 40;
						  $no7 = 45;
						  ?>
						  <input type="hidden" name="total" value="<?php echo $total; ?>">		
						  <?php		
						  		while($d = mysql_fetch_array($q)) { 
						  $det = mysql_fetch_array(mysql_query("SELECT * FROM `nilai_keterampilan` 
						  	where kode_pelajaran = '".$_GET['pelajaran']."' AND nip = '".$_GET['nip']."' AND kode_kelas = '".$_GET['kelas']."' 
						  	AND tahun_ajaran = '".$_GET['tahun']."' and nis = '".$d['nis']."' AND semester = '".$_GET['semester']."'"));
						  ?>
							<tr>
								<input type="hidden" name="nis[]" value="<?php echo $d['nis']; ?>">
								<td class="center"><?php echo $d['nis']; ?></td>
								<td class="center"><?php echo $d['nama_siswa']; ?></td>
								<td class="center"><input type="text" name="np1[]" style="width:40px" title="NP 1" value="<?php echo $det['np1']; ?>"></td>
								<td class="center"><input type="text" name="np2[]" style="width:40px" title="NP 2" value="<?php echo $det['np2']; ?>"></td>
								<td class="center"><input type="text" name="np3[]" style="width:40px" title="NP 3" value="<?php echo $det['np3']; ?>"</td>
								<td class="center"><input type="text" name="np4[]" style="width:40px" title="NP 4" value="<?php echo $det['np4']; ?>"</td>
							</tr>
							<?php $no++; $no2++; $no3++; $no4++; $no5++; $no6++; $no7++; } ?>
					  </tbody>
      </table>
        <div id="tablefooter">
          <div id="tablenav">
            	<div>
                    <img src="images/first.gif" width="16" height="16" alt="First Page" onClick="sorter.move(-1,true)" />
                    <img src="images/previous.gif" width="16" height="16" alt="First Page" onClick="sorter.move(-1)" />
                    <img src="images/next.gif" width="16" height="16" alt="First Page" onClick="sorter.move(1)" />
                    <img src="images/last.gif" width="16" height="16" alt="Last Page" onClick="sorter.move(1,true)" />
                </div>
                <div>
                	<select id="pagedropdown"></select>
				</div>
                <div>
                	<a href="javascript:sorter.showall()">view all</a>
                </div>
          </div>
			<div id="tablelocation">
            	<div>
                    <select onChange="sorter.size(this.value)">
                    <option value="5">5</option>
                        <option value="10" selected="selected">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span>Data Per Halaman</span>
                </div>
                <div class="page">Halaman <span id="currentpage"></span> dari <span id="totalpages"></span></div>
            </div>
        </div>
</div>
	<script type="text/javascript" src="script.js"></script>
	<script type="text/javascript">
	var sorter = new TINY.table.sorter('sorter','table',{
		headclass:'head',
		ascclass:'asc',
		descclass:'desc',
		evenclass:'evenrow',
		oddclass:'oddrow',
		evenselclass:'evenselected',
		oddselclass:'oddselected',
		paginate:true,
		size:10,
		colddid:'columns',
		currentid:'currentpage',
		totalid:'totalpages',
		startingrecid:'startrecord',
		endingrecid:'endrecord',
		totalrecid:'totalrecords',
		hoverid:'selectedrow',
		pageddid:'pagedropdown',
		navid:'tablenav',
		sortcolumn:0,
		sortdir:1,
		//sum:[8],
		//avg:[6,7,8,9],
		//columns:[{index:7, format:'%', decimals:1},{index:8, format:'$', decimals:0}],
		init:true
	});
  </script>
</body>                        