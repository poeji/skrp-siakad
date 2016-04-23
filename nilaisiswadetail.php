<script>
function cetakrapor(nis) {
    window.open("cetakrapor.php?semester=<?php echo $_GET['semester']; ?>&nis="+nis, "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=800, height=600");
}
</script>
<?php if($_SESSION['level']=="guru") { ?>

<table border="1" align="center" cellpadding="0" cellspacing="0">
  <col width="47">
  <col width="68">
  <col width="158">
  <col width="26">
  <col width="36">
  <col width="37">
  <col width="36" span="8">
  <col width="100">
  <col width="60">
  <col width="87">
  <col width="72">
  <col width="90">
  <tr height="22">
    <td rowspan="3" height="66" width="47"><div align="center">NO.</div></td>
    <td rowspan="3" width="68"><div align="center">KODE PELAJARAN</div></td>
    <td rowspan="3" width="158"><div align="center">NAMA PELAJARAN</div></td>
    <td colspan="4" width="145"><div align="center">KI 3</div></td>
    <td rowspan="3" width="36"><div align="center">UTS</div></td>
    <td rowspan="3" width="36"><div align="center">UAS</div></td>
    <td colspan="4" width="144"><div align="center">KI 4</div></td>
    <td width="100"><div align="center">KI 1&amp;KI 2</div></td>
   
    <td width="87"><div align="center">nilai tambah</div></td>
    <td width="72"><div align="center"></div></td>
    <td width="90"><div align="center"></div></td>
  </tr>
  <tr height="22">
    <td height="22" colspan="4"><div align="center">PENGETAHUAN</div></td>
    <td colspan="4"><div align="center">KETERAMPILAN</div></td>
    <td rowspan="2"><div align="center">SIKAP</div></td>
    <td><div align="center">remed</div></td>
    <td><div align="center">rata rata</div></td>
    <td><div align="center">nilai raport</div></td>
  </tr>
  <tr height="22">
    <td height="22"><div align="center">KD 1</div></td>
    <td><div align="center">KD 2</div></td>
    <td><div align="center">KD 3</div></td>
    <td><div align="center">KD 4</div></td>
    <td><div align="center">KD 1</div></td>
    <td><div align="center">KD 2</div></td>
    <td><div align="center">KD 3</div></td>
    <td><div align="center">KD 4</div></td>
    <td><div align="center">uas</div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
  <?php
  $no = 1;
  $ds = mysql_fetch_array(mysql_query("select * from siswa where nis = '".$_SESSION['userid']."'"));
  $nilaipeng = mysql_query("SELECT k.`id_belajar`, k.`kode_pelajaran`, p.`nama_pelajaran`, k.`thn_ajaran`
FROM `kurikulum` k 
LEFT JOIN `pelajaran` p ON p.`kode_pelajaran` = k.`kode_pelajaran`
WHERE k.kode_kelas = '".$ds['kode_kelas']."' AND k.thn_ajaran = '".$ds['tahun']."'");
while($d = mysql_fetch_array($nilaipeng)) {

//nilai pengetahuan
$dip = mysql_fetch_array(mysql_query("SELECT * FROM `nilai_pengetahuan` WHERE nis = '".$_SESSION['userid']."' AND kode_pelajaran = '".$d['kode_pelajaran']."' AND tahun_ajaran = '".$ds['tahun']."' AND semester = '".$_GET['semester']."'"));

//nilai keterampilan
$dk = mysql_fetch_array(mysql_query("SELECT * FROM `nilai_keterampilan` WHERE nis = '".$_SESSION['userid']."' AND kode_pelajaran = '".$d['kode_pelajaran']."' AND tahun_ajaran = '".$ds['tahun']."' AND semester = '".$_GET['semester']."'"));

//nilai remed
$dr = mysql_fetch_array(mysql_query("SELECT * FROM `nilai_remed` WHERE nis = '".$_SESSION['userid']."' AND kode_pelajaran = '".$d['kode_pelajaran']."' AND tahun_ajaran = '".$ds['tahun']."' AND semester = '".$_GET['semester']."'"));

//nilai rata-rata
$nilai = $dip['uh1'] + $dip['uh2'] + $dip['uh3'] + $dip['uh4'] + $dip['uts'] + $dip['uas'] + $dk['np1'] + $dk['np2'] + $dk['np3'] + $dk['np4'];
$nilairatarata = $nilai / 10;

//nilai sikap
                  if($nilairatarata < 70) {
                    $nilaisikap = "KURANG";
                  } elseif($nilairatarata > 75) {
                    $nilaisikap = "CUKUP";
                  } elseif($nilairatarata > 80) {
                    $nilaisikap = "BAIK";
                  } else {
                  $nilaisikap = "BAIK SEKALI";
                }

  $nilairapor = $dr['nilairemed'] + $nilairatarata;
  ?>
  <tr height="22">
    <td height="22"><div align="center"><?php echo $no; ?></div></td>
    <td><div align="center"><?php echo $d['kode_pelajaran']; ?></div></td>
    <td><div align="center"><?php echo $d['nama_pelajaran']; ?></div></td>
    <td align="right"><div align="center"><?php echo $dip['uh1']; ?></div></td>
    <td align="right"><div align="center"><?php echo $dip['uh2']; ?></div></td>
    <td align="right"><div align="center"><?php echo $dip['uh3']; ?></div></td>
    <td align="right"><div align="center"><?php echo $dip['uh4']; ?></div></td>
    <td align="right"><div align="center"><?php echo $dip['uts']; ?></div></td>
    <td align="right"><div align="center"><?php echo $dip['uas']; ?></div></td>
    <td align="right"><div align="center"><?php echo $dk['np1']; ?></div></td>
    <td align="right"><div align="center"><?php echo $dk['np2']; ?></div></td>
    <td align="right"><div align="center"><?php echo $dk['np3']; ?></div></td>
    <td align="right"><div align="center"><?php echo $dk['np4']; ?></div></td>
    <td><div align="center"><?php echo $nilaisikap; ?></div></td>
    
    <td><div align="center"><?php echo $dr['nilairemed']; ?></div></td>
    <td><div align="center"><?php echo $nilairatarata; ?></div></td>
    <td><div align="center"><?php echo $nilairapor; ?></div></td>
  </tr>
  <?php $no++; } ?>
</table>


<?php } else { ?>


<table border="1" align="center" cellpadding="0" cellspacing="0">
  <col width="47">
  <col width="68">
  <col width="158">
  <col width="26">
  <col width="36">
  <col width="37">
  
  <col width="100">
  <col width="60">
  <col width="87">
  <col width="72">
  <col width="90">
  <tr height="22">
    <td rowspan="3" height="66" width="47"><div align="center">NO.</div></td>
    <td rowspan="3" width="88"><div align="center">KODE PELAJARAN</div></td>
    <td rowspan="3" width="169"><div align="center">NAMA PELAJARAN</div></td>
    <td colspan="4"><div align="center">KI 3</div></td>
    <td rowspan="3" width="36"><div align="center">UTS</div></td>
    <td rowspan="3" width="36"><div align="center">UAS</div></td>
    <td colspan="4"><div align="center">KI 4</div></td>
    <td width="100"><div align="center">KI 1&amp;KI 2</div></td>
   
    
    <td width="72"><div align="center"></div></td>
    
  </tr>
  <tr height="22">
    <td height="22" colspan="4"><div align="center">PENGETAHUAN</div></td>
    <td colspan="4"><div align="center">KETERAMPILAN</div></td>
    <td rowspan="2"><div align="center">SIKAP</div></td>
    
    <td><div align="center">rata rata</div></td>
    
  </tr>
  <tr height="22">
    <td width="45" height="22"><div align="center" style="width:50px">KD 1</div></td>
    <td width="27"><div align="center" style="width:50px">KD 2</div></td>
    <td width="27"><div align="center" style="width:50px">KD 3</div></td>
    <td width="30"><div align="center" style="width:50px">KD 4</div></td>
    <td width="35"><div align="center" style="width:50px">KD 1</div></td>
    <td width="35"><div align="center" style="width:50px">KD 2</div></td>
    <td width="35"><div align="center" style="width:50px">KD 3</div></td>
    <td width="35"><div align="center" style="width:50px">KD 4</div></td>
    
    <td><div align="center"></div></td>
   
  </tr>
  <?php
  $no = 1;
  $ds = mysql_fetch_array(mysql_query("select * from siswa where nis = '".$_SESSION['userid']."'"));
  $nilaipeng = mysql_query("SELECT k.`id_belajar`, k.`kode_pelajaran`, p.`nama_pelajaran`, k.`thn_ajaran`
FROM `kurikulum` k 
LEFT JOIN `pelajaran` p ON p.`kode_pelajaran` = k.`kode_pelajaran`
WHERE k.kode_kelas = '".$ds['kode_kelas']."' AND k.thn_ajaran = '".$ds['tahun']."'");
while($d = mysql_fetch_array($nilaipeng)) {

//nilai pengetahuan
$dip = mysql_fetch_array(mysql_query("SELECT * FROM `nilai_pengetahuan` WHERE nis = '".$_SESSION['userid']."' AND kode_pelajaran = '".$d['kode_pelajaran']."' AND tahun_ajaran = '".$ds['tahun']."' AND semester = '".$_GET['semester']."'"));

//nilai keterampilan
$dk = mysql_fetch_array(mysql_query("SELECT * FROM `nilai_keterampilan` WHERE nis = '".$_SESSION['userid']."' AND kode_pelajaran = '".$d['kode_pelajaran']."' AND tahun_ajaran = '".$ds['tahun']."' AND semester = '".$_GET['semester']."'"));

//nilai remed
$dr = mysql_fetch_array(mysql_query("SELECT * FROM `nilai_remed` WHERE nis = '".$_SESSION['userid']."' AND kode_pelajaran = '".$d['kode_pelajaran']."' AND tahun_ajaran = '".$ds['tahun']."' AND semester = '".$_GET['semester']."'"));

//nilai rata-rata
$nilai = $dip['uh1'] + $dip['uh2'] + $dip['uh3'] + $dip['uh4'] + $dip['uts'] + $dip['uas'] + $dk['np1'] + $dk['np2'] + $dk['np3'] + $dk['np4'];
$nilairatarata = $nilai / 10;

//nilai sikap
                  if($nilairatarata < 70) {
                    $nilaisikap = "KURANG";
                  } elseif($nilairatarata > 75) {
                    $nilaisikap = "CUKUP";
                  } elseif($nilairatarata > 80) {
                    $nilaisikap = "BAIK";
                  } else {
                  $nilaisikap = "BAIK SEKALI";
                }

  $nilairapor = $dr['nilairemed'] + $nilairatarata;
  ?>
  <tr height="22">
    <td height="22"><div align="center"><?php echo $no; ?></div></td>
    <td><div align="center"><?php echo $d['kode_pelajaran']; ?></div></td>
    <td><div align="center"><?php echo $d['nama_pelajaran']; ?></div></td>
    <td align="right"><div align="center"><?php echo $dip['uh1']; ?></div></td>
    <td align="right"><div align="center"><?php echo $dip['uh2']; ?></div></td>
    <td align="right"><div align="center"><?php echo $dip['uh3']; ?></div></td>
    <td align="right"><div align="center"><?php echo $dip['uh4']; ?></div></td>
    <td align="right"><div align="center"><?php echo $dip['uts']; ?></div></td>
    <td align="right"><div align="center"><?php echo $dip['uas']; ?></div></td>
    <td align="right"><div align="center"><?php echo $dk['np1']; ?></div></td>
    <td align="right"><div align="center"><?php echo $dk['np2']; ?></div></td>
    <td align="right"><div align="center"><?php echo $dk['np3']; ?></div></td>
    <td align="right"><div align="center"><?php echo $dk['np4']; ?></div></td>
    <td><div align="center"><?php echo $nilaisikap; ?></div></td>
    
  
    <td><div align="center"><?php echo $nilairatarata; ?></div></td>
   
  </tr>
  <?php $no++; } ?>
</table>


<?php } ?>
<br />
<button type="button" class="btn" onclick="cetakrapor(<?php echo $_SESSION['userid']; ?>)">Cetak</button>

<button type="button" class="btn" onclick="location.href='?page=nilaisiswasemester'">Kembali</button>