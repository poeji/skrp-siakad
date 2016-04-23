<h3>Data Kurikulum</h3>
                        <form action="?page=kurikulumsubmitproses" method="post">
                        <input type="hidden" name="kode_pelajaran" value="<?php echo $_POST['kode_pelajaran']; ?>" />
                        <input type="hidden" name="kode_kelas" value="<?php echo $_POST['kode_kelas']; ?>" />
                        <input type="hidden" name="nip" value="<?php echo $_POST['nip']; ?>" />
                        <input type="hidden" name="tahun_ajaran" value="<?php echo $_POST['tahun_ajaran']; ?>" />
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Save changes</button>
					<button type="button" class="btn" onclick="location.href='?page=kurikulum">Cancel</button>
                        <br />
                        <table class="tabel">
                        <tr>
                        <td>Tandai</td>
                        <td>NIS</td>
                        <td>Nama</td>
                        </tr>
                                 <?php
								  /*
								  SELECT b.*, s.`nama_siswa` FROM `belajar` b 
													LEFT JOIN `siswa` s ON s.`nis` = b.`nis`
													WHERE thn_ajaran = '".$_POST['tahun_ajaran']."' AND kode_pelajaran = '".$_POST['kode_pelajaran']."' 
													AND kode_kelas = '".$_POST['kode_kelas']."' AND nip = '".$_POST['nip']."'
								  */
								  $q = mysql_query("SELECT * FROM `siswa` where kode_kelas = '".$_POST['kode_kelas']."' order by nama_siswa");
						  		while($d = mysql_fetch_array($q)) {
								
								//cek ke data kurikulum
								/*$ckr = mysql_fetch_array(mysql_query("SELECT b.nis FROM `belajar` b 
													WHERE thn_ajaran = '".$_POST['tahun_ajaran']."' AND kode_pelajaran = '".$_POST['kode_pelajaran']."' 
													AND kode_kelas = '".$_POST['kode_kelas']."' AND nip = '".$_POST['nip']."'"));*/
								
								$ckr = mysql_fetch_array(mysql_query("SELECT * FROM `belajar` WHERE kode_kelas = '".$_POST['kode_kelas']."' AND thn_ajaran = '".$_POST['tahun_ajaran']."' and nis = '".$d['nis']."'"));
								
								//if($ckr['nis'] == $d['nis']) {													
								?>
                                <tr>
                                <td><input name="nis[]" type="checkbox" value="<?php echo $d['nis']; ?>" /></td>
                                <td><?php echo $d['nis']; ?></td>
                                <td><?php echo $d['nama_siswa']; ?></td>
                                </tr>
                                  <?php  } //} ?>
                                  </table>
                          </form>