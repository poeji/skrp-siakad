<?php
	$ed = mysql_fetch_array(mysql_query("select * from guru where nip = '".$_SESSION['userid']."'"));
	$userid = $ed['nip'];
?>
<table width="100%" border="0">
  <tr>
    <td><form name="form1" method="post" action="?page=gantipasswordguruproses">
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
          <td><strong><?php echo ucfirst($_SESSION['level']); ?></strong></td>
        </tr>
        <input type="hidden" name="akses" value="<?php echo $_SESSION['level']; ?>">
        <input type="hidden" name="useredit" value="1">
        <tr>
          <td colspan="3"><input type="submit" name="submit" id="button" value="Update">
            <input type="reset" name="button2" id="button2" value="Reset"></td>
          </tr>
      </table>
        </form>
    </td>
  </tr>
</table>
