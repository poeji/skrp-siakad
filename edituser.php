<?php
if($_SESSION['akses'] == "guru") {
	$ed = mysql_fetch_array(mysql_query("select * from guru where nip = '".$_SESSION['userid']."'"));
} elseif($_SESSION['akses']=="siswa") {
	$ed = mysql_fetch_array(mysql_query("select * from siswa where nis = '".$_SESSION['userid']."'"));

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
          <td width="62%"><input type="text" name="userid" id="userid" value="<?php echo $_SESSION['userid']; ?>" readonly></td>
        </tr>
        <tr>
          <td>Password Baru</td>
          <td>:</td>
          <td><input type="password" name="password" id="password"></td>
        </tr>
        <?php
		if($_SESSION['akses']=="admin") {
		?>
        <tr>
          <td>Akses Sebagai</td>
          <td>:</td>
          <td><select name="akses" id="akses">
            <option>---Pilih---</option>
            <option value="admin" <?php if($ed['akses']=="admin") { ?>selected<?php } ?>>Admin</option>
            <option value="guru" <?php if($ed['akses']=="guru") { ?>selected<?php } ?>>Guru</option>
            <option value="murid" <?php if($ed['akses']=="murid") { ?>selected<?php } ?>>Murid</option>
          </select>          </td>
        </tr>
        <?php } else { ?><input type="hidden" name="akses" value="<?php echo $_SESSION['akses']; ?>"><?php } ?>
        <tr>
          <td colspan="3"><input type="submit" name="submit" id="button" value="Update">
            <input type="reset" name="button2" id="button2" value="Reset"></td>
          </tr>
      </table>
        </form>
    </td>
  </tr>
</table>
