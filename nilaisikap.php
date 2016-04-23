<link rel="stylesheet" href="style.css" />
<h1><div align="center">Data Nilai Sikap</div></h1><br /><hr><br />
<body>
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
								  <th width="20%"><h3>Kelas</h3></th>
                                  <th width="60%"><h3>Mata Pelajaran</h3></th>
                                  <th width="20%"><h3>Tahun Ajaran</h3></th>
								  <th width="20%"><h3>Actions</h3></th>
							  </tr>
                              </thead>
            <tbody>
						  <?php
$mintahun = (date("Y")-1)."-".date("Y");
$plustahun = (date("Y"))."-".(date("Y")+1);

						  		$q = mysql_query("SELECT p.`nama_pelajaran`, k.kode_kelas, p.kode_pelajaran, k.`nama_kelas`, b.`thn_ajaran`, b.nip FROM `kurikulum` b
LEFT JOIN `pelajaran` p ON p.`kode_pelajaran` = b.`kode_pelajaran`
LEFT JOIN `kelas` k ON k.`kode_kelas` = b.`kode_kelas`
WHERE thn_ajaran in ('$mintahun', '$plustahun') AND nip = '".$_SESSION["userid"]."'");
						  		while($d = mysql_fetch_array($q)) { 
						  ?>	
							<tr>	
								<td class="center"><?php echo $d['nama_kelas']; ?></td>
                                <td class="center"><?php echo $d['nama_pelajaran']; ?></td>
                                <td class="center"><?php echo $d['thn_ajaran']; ?></td>
								<td class="center">
									<a class="btn btn-info" href="?page=nilaisikaptambahsubmit&kelas=<?php echo $d['kode_kelas']; ?>&pelajaran=<?php echo $d['kode_pelajaran']; ?>&tahun=<?php echo $d['thn_ajaran']; ?>&nip=<?php echo $d['nip']; ?>" title="Lihat Detail Nilai Pengetahuan">
								 		Detail  
									</a>
								</td>
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
</body>