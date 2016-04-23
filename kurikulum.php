<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript">
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#register-form").validate({
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
$mintahun = (date("Y")-1)."-".date("Y");
$plustahun = (date("Y"))."-".(date("Y")+1);
?>
<link rel="stylesheet" href="style.css" />
<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Data Kurikulum</h2>
						
					</div>
					<div class="box-content">
					<form action="?page=kurikulumproses" method="post"  novalidate="novalidate" id="register-form">
		
					<div class="control-group">
								<label class="control-label" for="selectError">Mata Pelajaran</label>
								<div class="controls">
								  <select id="selectError" data-rel="chosen" name="kode_pelajaran" class="required">
                                  <option value="">---Pilih Mata Pelajaran---</option>
									<?php
                                        $qjur = mysql_query("select * from pelajaran order by nama_pelajaran ASC");
                                        while($djur = mysql_fetch_array($qjur)) {
                                  ?>
                                    <option value="<?php echo $djur['kode_pelajaran']; ?>"><?php echo $djur['nama_pelajaran']; ?></option>
                                    <?php } ?>
								  </select>
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="selectError">Kelas</label>
								<div class="controls">
								  <select id="selectError2" data-rel="chosen" name="kode_kelas" class="required">
                                  <option value="">---Pilih Kelas---</option>
									<?php
                                        $qjur = mysql_query("select * from kelas order by nama_kelas ASC");
                                        while($djur = mysql_fetch_array($qjur)) {
                                  ?>
                                    <option value="<?php echo $djur['kode_kelas']; ?>"><?php echo $djur['nama_kelas']; ?></option>
                                    <?php } ?>
								  </select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="selectError">Pengajar</label>
								<div class="controls">
								  <select id="selectError3" data-rel="chosen" name="nip" class="required">
                                  <option value="">---Pilih Nama Pengajar---</option>
									<?php
                                        $qjur = mysql_query("select * from guru order by nama_guru ASC");
                                        while($djur = mysql_fetch_array($qjur)) {
                                  ?>
                                    <option value="<?php echo $djur['nip']; ?>"><?php echo $djur['nama_guru']." [".$djur['nip']."]"; ?></option>
                                    <?php } ?>
								  </select>
								</div>
							  </div>
							  <div class="control-group">
                              <label class="control-label" for="typeahead">Tahun Ajaran </label>
                              <div class="controls">
                                <select id="tahun_ajaran" name="tahun_ajaran" data-rel="chosen" class="required">
                                <option value="">---Pilih Tahun Ajaran---</option>
                                    <option value="<?php echo $mintahun; ?>"><?php echo $mintahun; ?></option>
                                   <option value="<?php echo $plustahun; ?>"><?php echo $plustahun; ?></option>
                                  </select>
                              </div>
                            </div>
							  <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
							  <button type="button" class="btn" onclick="location.href='?page=nilaipengetahuandata'">Batal</button>
		<br />			<br />
         			<hr />
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
    <th><h3>NO.</h3></th>
    <th width="40%"><h3>Nama Pelajaran</h3></th>
    <th><h3>Kelas</h3></th>
    <th width="40%"><h3>Nama Guru</h3></th>
    <th><h3>Tahun Ajaran</h3></th>
    <th><h3>Action</h3></th>
  </tr>
   </thead>
            <tbody>
  <?php
  $no = 1;
  	$dkr =mysql_query("SELECT b.`id_belajar`, p.`nama_pelajaran`, k.`nama_kelas`, g.`nip`, g.`nama_guru`, b.thn_ajaran FROM `kurikulum` b
LEFT JOIN `pelajaran` p ON p.`kode_pelajaran` = b.`kode_pelajaran`
LEFT JOIN `kelas` k ON k.`kode_kelas` = b.`kode_kelas`
LEFT JOIN `guru` g ON g.`nip` = b.`nip`");
while($d= mysql_fetch_array($dkr)) {
  ?>
  <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $d['nama_pelajaran']; ?></td>
    <td><?php echo $d['nama_kelas']; ?></td>
    <td><?php echo $d['nama_guru']. " [".$d['nip']."]"; ?></td>
    <td><?php echo $d['thn_ajaran']; ?></td>
    <td><a href="?page=kurikulumhapus&id=<?php echo $d['id_belajar']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?');">Hapus</td>
  </tr>
  <?php $no++; } ?>
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
