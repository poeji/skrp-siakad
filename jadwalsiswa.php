<?php 
$hasil=mysql_query("SELECT k.`nama_kelas`, j.`jam`, j.`hari`, p.`nama_pelajaran`, j.`id_jadwal`, g.`nama_guru`
FROM jadwal j LEFT JOIN `kelas` k ON k.`kode_kelas` = j.`kode_kelas` 
LEFT JOIN `pelajaran` p ON p.`kode_pelajaran` = j.`kode_pelajaran` 
LEFT JOIN siswa s ON s.kode_kelas = j.kode_kelas AND s.tahun = j.thn_ajaran 
LEFT JOIN guru g ON g.nip = j.nip
WHERE j.kode_kelas = '".$_SESSION['kode_kelas']."'
GROUP BY j.`kode_kelas`, j.`kode_pelajaran`, j.`thn_ajaran`, j.`hari`, j.`jam`
ORDER BY j.`hari`,j.`jam` ASC");
?>
<?php
function hari($n) {
	if($n==1) {
		return "Senin";
	} elseif($n==2) {
		return "Selasa";
	} elseif($n==3) {
		return "Rabu";
	} elseif($n==4) {
		return "Kamis";
	} elseif($n==5) {
		return "Jumat";
	} elseif($n==6) {
		return "Sabtu";
	}

}

function jam($n) {
	if($n==1) {
		return "06:30 - 07:15";
	} elseif($n==2) {
		return "07:15 - 08:00";
	} elseif($n==3) {
		return "08:00 - 08:45";
	} elseif($n==4) {
		return "08:45 - 09:30";
	} elseif($n==5) {
		return "10:00 - 10:45";
	} elseif($n==6) {
		return "10:45 - 11:30";
	} elseif($n==7) {
		return "11:30 - 12:45";
	} elseif($n==8) {
		return "12:15 - 13:00";
	}

}
?>
<script>
function cetakjadwal(id) {
    window.open("cetakjadwalsiswa.php?id="+id, "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=900, height=600");
}
</script>
<link rel="stylesheet" href="style.css" />
<h1><div align="center">Data Jadwal</div></h1><br /><hr><br />
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
        <a href="#" onClick="cetakjadwal(<?php echo $_SESSION['userid']; ?>)">Cetak Jadwal</a>
		<br><br>
        <table width="708" border="0" cellpadding="0" cellspacing="0" class="tinytable" id="table">
            <thead>
                <tr>
                  <th width="86"><h3>Hari</h3></th>
                  <th width="217"><h3>Jam</h3></th>
                  <th width="217"><h3>Kelas</h3></th>
                  <th width="217"><h3>Mata Pelajaran</h3></th>
                  <th width="217"><h3>Pengajar</h3></th>
                </tr>
            </thead>
            <tbody>
			<?php
			while ($d = mysql_fetch_array($hasil)){
			?>
			<tr>
			<td class="center"><?php echo hari($d['hari']); ?></td>
								<td class="center"><?php echo jam($d['jam']); ?></td>
                                <td class="center"><?php echo $d['nama_kelas']; ?></td>
                                <td class="center"><?php echo $d['nama_pelajaran']; ?></td>
                                <td class="center"><?php echo $d['nama_guru']; ?></td>
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