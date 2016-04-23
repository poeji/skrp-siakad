<?php 
$hasil=mysql_query("select *, DATE_FORMAT(tanggal_lahir, '%d %M %Y')AS tgl from siswa where kode_kelas = '".$_GET['kelas']."' order by nama_siswa ASC");
?>
<?php
$mintahun = (date("Y")-1)."-".date("Y");
$plustahun = (date("Y"))."-".(date("Y")+1);
?>
<link rel="stylesheet" href="style.css" />
<h1><div align="center">Data Siswa</div></h1><br /><hr><br />
<body>
<form action="?page=updatekelasdetailproses" method="post"  novalidate="novalidate" id="register-form">
<select id="selectError2" data-rel="chosen" name="kode_kelas" class="required">
                                  <option value="">---Pilih Kelas---</option>
									<?php
                                        $qjur = mysql_query("select * from kelas order by nama_kelas ASC");
                                        while($djur = mysql_fetch_array($qjur)) {
                                  ?>
                                    <option value="<?php echo $djur['kode_kelas']; ?>"><?php echo $djur['nama_kelas']; ?></option>
                                    <?php } ?>
								  </select>
   <select id="tahun_ajaran" name="tahun_ajaran" data-rel="chosen" class="required">
                                <option value="">---Pilih Tahun Ajaran---</option>
                                    <option value="<?php echo $mintahun; ?>"><?php echo $mintahun; ?></option>
                                   <option value="<?php echo $plustahun; ?>"><?php echo $plustahun; ?></option>
                                  </select>
   <button type="submit" class="btn btn-primary" name="submit" value="submit">Update</button>   
   <br><br>
   <hr>
   <br>                            
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
                  <th width="86"><h3>X</h3></th>
                  <th width="86"><h3>NIS</h3></th>
                  <th width="217"><h3>Nama</h3></th>
                  <th><h3>Tempat Lahir</h3></th>
								  <th><h3>Tanggal Lahir</h3></th>
								  <th><h3>Alamat</h3></th>
								  <th><h3>Agama</h3></th>
								  <th><h3>Jenis Kelamin</h3></th>
								  <th><h3>Nama Orang Tua</h3></th>
								  <th><h3>Telepon Orang Tua</h3></th>
								  <th><h3>Kelas</h3></th>
                                  <th><h3>Tahun Ajaran</h3></th>
				  <th width="83" class=nosort><h3>Action</h3></th>
                </tr>
            </thead>
            <tbody>
			<?php
			while ($d = mysql_fetch_array($hasil)){
			$dkls = mysql_fetch_array(mysql_query("select nama_kelas from kelas where kode_kelas = '$d[kode_kelas]'"));
			?>
			<tr>
			<td><input name="nis[]" type="checkbox" value="<?php echo $d['nis']; ?>" checked></td>
            <td><?php echo $d['nis']; ?></td>
			<td><?php echo $d['nama_siswa']; ?></td>
			
            <td class="center"><?php echo $d['tempat_lahir']; ?></td>
								<td class="center"><?php echo $d['tgl']; ?></td>
								<td class="center"><?php echo $d['alamat']; ?></td>
								<td class="center"><?php echo $d['agama']; ?></td>
								<td class="center"><?php if($d['jenis_kelamin']=="L") { echo "Pria"; } else { echo "Wanita"; } ?></td>
								<td class="center"><?php echo $d['nama_orangtua']; ?></td>
								<td class="center"><?php echo $d['telepon_orangtua']; ?></td>
								<td class="center"><?php echo $dkls['nama_kelas']; ?></td>
                                <td class="center"><?php echo $d['tahun']; ?></td>
								<td class="center" class="nosort">
									<a href="?page=siswaedit&id=<?php echo $d['nis']; ?>">
										<img src=icon/update.png border=0>
									</a>
									<a href="?page=siswahapus&id=<?php echo $d['nis']; ?>" onClick="return confirm('Apakah anda yakin akan menghapus <?php echo $d['nama_siswa']; ?>?');">
										<img src=icon/hapus.png border=0>
									</a>
								</td>
            </tr>
            <?php
				}
			?>
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
</form>
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