<?php 
$hasil=mysql_query("SELECT *, DATE_FORMAT(tgl_lahir, '%d %M %Y')AS tgl FROM guru ORDER BY nama_guru ASC");
?>
<link rel="stylesheet" href="style.css" />
<h1><div align="center">Data Guru</div></h1><br /><hr><br />
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
                  <th width="86"><h3>NIS</h3></th>
                  <th width="217"><h3>Nama</h3></th>
                  <th><h3>Tempat Lahir</h3></th>
								  <th><h3>Tanggal Lahir</h3></th>
								  <th><h3>Alamat</h3></th>
								  <th><h3>Agama</h3></th>
								  <th><h3>Jenis Kelamin</h3></th>
								  <th><h3>Status Menikah</h3></th>
								  <th><h3>No. HP</h3></th>
				  <th width="83" class=nosort><h3>Action</h3></th>
                </tr>
            </thead>
            <tbody>
			<?php
			while ($d = mysql_fetch_array($hasil)){
			?>
			<tr>
			<td class="center"><?php echo $d['nip']; ?></td>
								<td class="center"><?php echo $d['nama_guru']; ?></td>
                                <td class="center"><?php echo $d['tempat_lahir']; ?></td>
								<td class="center"><?php echo $d['tgl']; ?></td>
								<td class="center"><?php echo $d['alamat']; ?></td>
								<td class="center"><?php echo $d['agama']; ?></td>
								<td class="center"><?php if($d['jenis_kelamin']=="L") { echo "Pria"; } else { echo "Wanita"; } ?></td>
								<td class="center"><?php echo $d['st_menikah']; ?></td>
								<td class="center"><?php echo $d['hp']; ?></td>
								<td class="center">
									<a href="?page=guruedit&id=<?php echo $d['nip']; ?>">
										<img src=icon/update.png border=0>
									</a>
									<a href="?page=guruhapus&id=<?php echo $d['nip']; ?>" onClick="return confirm('Apakah anda yakin akan menghapus <?php echo $d['nama_guru']; ?>?');">
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