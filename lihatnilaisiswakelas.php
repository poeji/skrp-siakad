<link rel="stylesheet" href="style.css" />
<h1><div align="center">Lihat Nilai Siswa</div></h1><br /><hr><br />
<?php
$q = mysql_query("SELECT * FROM `kurikulum` b
LEFT JOIN `kelas`k ON k.`kode_kelas` = b.`kode_kelas`
WHERE b.`nip` = '".$_SESSION['userid']."'
GROUP BY B.`kode_kelas`
 order by k.nama_kelas ASC");
$total = mysql_num_rows($q)
?>
<h2>Data Kelas</h2>
					
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
								  <th width="20%"><h3>Kode Kelas</h3></th>
								  <th width="30%"><h3>Nama Kelas</h3></th>
								  <th width="20%"><h3>Action</h3></th>
							  </tr>	
                              </thead>
            <tbody>	
						  <?php		
						  		while($d = mysql_fetch_array($q)) { 
						  ?>
							<tr>
								<td class="center"><?php echo $d['kode_kelas']; ?></td>
								<td class="center"><?php echo $d['nama_kelas']; ?></td>
								<td class="center">
                                <a href="?page=listdatanilaisiswaview&kelas=<?php echo $d['kode_kelas']; ?>&tahun=<?php echo $d['thn_ajaran']; ?>&nip=<?php echo $d['nip']; ?>&semester=1">Semester Ganjil</a> | 
                                <a href="?page=listdatanilaisiswaview&kelas=<?php echo $d['kode_kelas']; ?>&tahun=<?php echo $d['thn_ajaran']; ?>&nip=<?php echo $d['nip']; ?>&semester=2">Semester Genap</a></td>
							</tr>
							<?php } ?>
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