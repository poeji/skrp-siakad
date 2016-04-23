<link rel="stylesheet" href="style.css" />
<h1><div align="center">Data User</div></h1><br /><hr><br />
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
								  <th width="10%"><h3>No.</h3></th>
                                  <th width="30%"><h3>User ID</h3></th>
								  <th width="30%"><h3>Nama</h3></th>
                                  <th width="30%"><h3>Akses</h3></th>
								  <th width="20%"><h3>Actions</h3></th>
							  </tr>
                              </thead>
            <tbody>
						  <?php
						  		$no = 1;
						  		$qgr = mysql_query("select nip, nama_guru from guru order by nama_guru ASC");
						  		while($dgr = mysql_fetch_array($qgr)) {
						  ?>
							<tr>
								<td class="center"><?php echo $no; ?>.</td>
                                <td class="center"><?php echo $dgr['nip']; ?></td>
								<td class="center"><?php echo $dgr['nama_guru']; ?></td>
                                <td class="center">Guru</td>
								<td class="center">
									<a class="menu" href="?page=useredit&id=<?php echo $dgr['nip']; ?>&akses=guru">
										Edit  
									</a>
									
								</td>
							</tr>
							<?php $no++; } ?>
                            <?php
						  		$no2 = $no;
						  		$qs = mysql_query("select nis, nama_siswa from siswa order by nama_siswa ASC");
						  		while($ds = mysql_fetch_array($qs)) {
						  ?>
							<tr>
								<td class="center"><?php echo $no2; ?>.</td>
                                <td class="center"><?php echo $ds['nis']; ?></td>
								<td class="center"><?php echo $ds['nama_siswa']; ?></td>
                                <td class="center">Siswa</td>
								<td class="center">
									<a class="menu" href="?page=useredit&id=<?php echo $ds['nis']; ?>&akses=siswa">
										Edit  
									</a>
									
								</td>
							</tr>
							<?php $no2++; } ?>
                            <?php
						  		$no3 = $no2;
						  		$qadm = mysql_query("select id_admin, userid, namaadmin from admin order by namaadmin ASC");
						  		while($dadm = mysql_fetch_array($qadm)) {
						  ?>
							<tr>
								<td class="center"><?php echo $no3; ?>.</td>
                                <td class="center"><?php echo $dadm['userid']; ?></td>
								<td class="center"><?php echo $dadm['namaadmin']; ?></td>
                                <td class="center">Admin</td>
								<td class="center">
									<a class="menu" href="?page=useredit&id=<?php echo $dadm['id_admin']; ?>&akses=admin">
										Edit  
									</a>
									
								</td>
							</tr>
							<?php $no3++; } ?>
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