<?php
if($_GET['akses'] == "guru") {
	$ed = mysql_fetch_array(mysql_query("select * from guru where nip = '".$_GET['id']."'"));
	$userid = $ed['nip'];
} elseif($_GET['akses']=="siswa") {
	$ed = mysql_fetch_array(mysql_query("select * from siswa where nis = '".$_GET['id']."'"));
	$userid = $ed['nis'];
} else {
	$ed = mysql_fetch_array(mysql_query("select * from admin where id_admin = '".$_GET['id']."'"));
	$userid = $ed['userid'];
}
?>
<table width="100%" border="0">
  <tr>
    <td><form name="form1" method="post" action="?page=edituserproses">
      <p>&nbsp;</p>
      <table width="34%" border="0" align="center">
        <tr>
          <td colspan="3" bgcolor="#A5BDFE">&nbsp;</td>
          </tr>
        <tr>
          <td width="36%">User ID</td>
          <td width="2%">:</td>
          <td width="62%"><input type="text" name="userid" id="userid" value="<?php echo $userid; ?>" readonly></td>
        </tr>
        <tr>
          <td>Password Baru</td>
          <td>:</td>
          <td><input type="password" name="password" id="password"></td>
        </tr>
        <tr>
          <td>Akses Sebagai</td>
          <td>:</td>
          <td><strong><?php echo ucfirst($_GET['akses']); ?></strong></td>
        </tr>
        <input type="hidden" name="akses" value="<?php echo $_GET['akses']; ?>">
        <input type="hidden" name="useredit" value="1">
        <tr>
          <td colspan="3"><input type="submit" name="submit" id="button" value="Update">
            <input type="reset" name="button2" id="button2" value="Reset">
            <button type="button" class="btn" onclick="location.href='?page=user'">Kembali</button>
            </td>
          </tr>
      </table>
        </form>
    </td>
  </tr>
</table>
